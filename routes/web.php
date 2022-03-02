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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('users', \App\Http\Controllers\UsersController::class);
});

Route::resource('skills',\App\Http\Controllers\SkillController::class);
Route::resource('developers',\App\Http\Controllers\DeveloperController::class);
Route::resource('companies',\App\Http\Controllers\CompanyController::class);
Route::resource('contacts',\App\Http\Controllers\ContactController::class);
Route::resource('requests',\App\Http\Controllers\RequestController::class);

