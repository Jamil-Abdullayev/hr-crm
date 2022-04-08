<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Developer;
use App\Models\Skill;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function index()
    {
        $developers = Developer::with('skills')->get();
        $skills = Skill::all();
        return view('filter.index', ['data' => $developers, 'skills' => $skills]);
    }

    public function search(Request $request)
    {
        $request_skills = $request['skills'];
        $price_max = $request['price_max'];
        $price_min = $request['price_min'];
        $pricePerHourMin=$request['price_per_hour_min'];
        $pricePerHourMax=$request['price_per_hour_max'];
        $age_max = $request['age_max'];
        $english_level = $request['english_level'];
        $age_min = $request['age_min'];
        $working_type = $request['working_type'];
        $skills = Skill::all();
        //$developer  = (new Developer())->newQuery();
        $developer=new Developer();
        if($request_skills) {
            $developer=$developer->whereHas('skills', function($q) {
                $q->where('skill_id', request('skills'));
            });
        }
        if ($english_level) {
            $developer=$developer->where('english_level',$english_level);
        }
        if($price_max&&$price_min){
            $developer=$developer->whereBetween('price',[$price_min, $price_max]);
        }
        if($age_max&&$age_min) {
         $developer=$developer->whereBetween('age', [$age_min, $age_max]);
        }
        if($working_type) {
            $developer=$developer->where('working_type', $working_type);
        }
        if($pricePerHourMax&&$pricePerHourMin) {
            $developer=$developer->whereBetween('price_per_hour',[$pricePerHourMin,$pricePerHourMax]);
        }

        $developer=$developer->get();

        return view('filter.index', ['data' => $developer, 'skills' => $skills,'selectedData'=>$request]);
    }
}
