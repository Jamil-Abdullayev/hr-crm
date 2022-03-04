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
        //        $skills=Skill::all();
        //        $price=$request->price;
        //        $working_type=$request->working_type;
        //        $skills_string='';
        //        foreach ($request['skills'] as $skill_id)
        //        {
        //            $skills_string.=$skill_id.',';
        //        }
        //        $skills_string=substr($skills_string,0,-1);//string with current developer skills
        //
        //        $developers=DB::select("SELECT d.*,s.name AS skill_name,s.id AS skill_id FROM developers AS d
        //                                                JOIN skills AS s
        //                                                JOIN developer_skill as ds
        //                                                ON
        //                                                d.id=ds.developer_id AND
        //                                                s.id=ds.skill_id AND
        //                                                d.price<='{$price}' AND
        //                                                d.working_type='{$working_type}' AND
        //                                                ds.skill_id IN({$skills_string})");
        //        dd($developers);
        //return view('filter.index',['after_search'=>$developers,'skills'=>$skills]);

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
