<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Developer;
use App\Models\Skill;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request_table=\App\Models\Request::with('skills')->get();
        $developers_table_data=Developer::all();
        $companies_table_data=Company::all();
        $developers_array=array();
        $companies_array=array();

        foreach ($developers_table_data as $item)
        {
            $developers_array[$item->id]=$item->name;
        }

        foreach ($companies_table_data as $item)
        {
            $companies_array[$item->id]=$item->name;
        }

        return view('requests.index',['data'=>$request_table,'companies'=>$companies_array,'developers'=>$developers_array]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::all();
        $developers=Developer::all();
        $skills=Skill::all();
        return view('requests.create',['companies'=>$companies,'developers'=>$developers,'skills'=>$skills]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request_table=new \App\Models\Request();
        $request_table->company_id=$request->input('company');
        $request_table->working_type=$request->input('working_type');

        if($request->input('price_min')&&$request->input('price_max')) {
            $request_table->price_min = $request->input('price_min');
            $request_table->price_max = $request->input('price_max');
        }
        if($request->input('price_per_hour_min')&&$request->input('price_per_hour_max')){
            $request_table->price_per_hour_min = $request->input('price_per_hour_min');
            $request_table->price_per_hour_max = $request->input('price_per_hour_max');
        }

        $request_table->age_max=$request->input('age_max');
        $request_table->age_min=$request->input('age_min');
        $request_table->exp_min=$request->input('exp_min');
        $request_table->exp_max=$request->input('exp_max');
        $request_table->english_level=$request->input('english_level');
        $request_table->save();
        //in top insert process to request table

       //insert to request_skill start
        $req_arr=$request->all();
        foreach ($req_arr['skill'] as $item)
        {
            //inserting
            $skill=Skill::find($item);
            $request_table->skills()->attach($skill);
        }
        //insert to request_skill end

        return redirect()->route('requests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $request_table=\App\Models\Request::find($id);
        $skills=$request_table->skills;

        return view('requests.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $request_data=\App\Models\Request::find($id);
        $skills=Skill::all();//all skills
        $companies=Company::all();
        $selected_skills=$request_data->skills;
        $selected_skills_ids=array();
        foreach ($selected_skills as $item)
        {
            $selected_skills_ids[$item->id]=$item->id;
        }
        return view('requests.edit',['request_data'=>$request_data,'companies'=>$companies,'skills'=>$skills,'selected_skills_ids'=>$selected_skills_ids]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request_table=\App\Models\Request::find($id);$request_table->company_id=$request->input('company');
        $request_table->working_type=$request->input('working_type');

        if($request->input('price_min')&&$request->input('price_max')) {
            $request_table->price_min = $request->input('price_min');
            $request_table->price_max = $request->input('price_max');
        }
        if($request->input('price_per_hour_min')&&$request->input('price_per_hour_max')){
            $request_table->price_per_hour_min = $request->input('price_per_hour_min');
            $request_table->price_per_hour_max = $request->input('price_per_hour_max');
        }

        $request_table->age_max=$request->input('age_max');
        $request_table->age_min=$request->input('age_min');
        $request_table->exp_min=$request->input('exp_min');
        $request_table->exp_max=$request->input('exp_max');
        $request_table->english_level=$request->input('english_level');
        $request_table->save();
        //in top insert process to request table

        //deleting skills
        $selected_skills=$request_table->skills;
        $request_table->skills()->detach($selected_skills);//delete old skills

        //insert to request_skill start
        $req_arr=$request->all();
        foreach ($req_arr['skills'] as $item)
        {
            //inserting
            $skill=Skill::find($item);
            $request_table->skills()->attach($skill);
        }
        //insert to request_skill end

        return redirect()->route('requests.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=\App\Models\Request::find($id);
        $selected_skills=$data->skills;
        $data->skills()->detach($selected_skills);//delete old skills

        $data->delete();
        return redirect()->route('requests.index');
    }
}
