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
        $request_table->developer_id=$request->input('developer');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
