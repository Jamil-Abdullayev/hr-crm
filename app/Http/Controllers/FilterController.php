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
        $developers=Developer::with('skills')->get();
        $skills=Skill::all();
        return view('filter.index',['data'=>$developers,'skills'=>$skills]);
    }

    public function search(Request $request)
    {
        $request_skills=$request->skills;
        $price=$request['price'];
        $working_type=$request['working_type'];
        $skills=Skill::all();

        $developers=Developer::whereHas('skills',function($query) use ($request_skills){
            $query->whereIn('skill_id',$request_skills);
        })->where('price',"<=",$price)->where('working_type',$working_type)->get();
        return view('filter.index',['data'=>$developers,'skills'=>$skills]);
    }
}
