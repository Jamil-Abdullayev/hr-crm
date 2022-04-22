<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Select2AutoSearch;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
})->name('landing');

Route::get('/dashboard', [\App\Http\Controllers\FilterController::class,'index'])->name('dashboard');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('users', \App\Http\Controllers\UsersController::class);
});

Route::resource('skills', \App\Http\Controllers\SkillController::class);

Route::resource('developers', \App\Http\Controllers\DeveloperController::class);
Route::get('developers/add-skills/{id}', [\App\Http\Controllers\DeveloperController::class, 'add_skills'])->name('developers/add-skills');
Route::post('developers/add-skills', [\App\Http\Controllers\DeveloperController::class, 'store_skills'])->name('developers/store-skills');

Route::resource('companies', \App\Http\Controllers\CompanyController::class);

Route::resource('contacts', \App\Http\Controllers\ContactController::class);

Route::resource('requests', \App\Http\Controllers\RequestController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('filter',[\App\Http\Controllers\FilterController::class,'index'])->name('filter');
Route::post('filter',[\App\Http\Controllers\FilterController::class,'search'])->name('search');

Route::post('from-bot',[\App\Http\Controllers\BotRequestController::class,'add'])->name('from-bot');
//request from bot for add new dev
