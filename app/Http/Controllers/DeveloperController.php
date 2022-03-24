<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Developer::all();
        return view('developers.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('developers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $developer=new Developer();
        $developer->name=$request->input('name');
        $developer->phone=$request->input('phone');
        $developer->messenger=$request->input('messenger');
        $developer->email=$request->input('email');
        $developer->social_media=$request->input('social_media');
        $developer->location=$request->input('location');
        $developer->price=$request->input('price');
        $developer->working_type=$request->input('working_type');
        $developer->price_per_hour=$request->input('price_per_hour');
        $developer->english_level=$request->input('english_level');
        $developer->age=$request->input('age');
        $developer->experience=$request->input('experience');

        if($request->hasFile('developer_image'))
        {
            $file=$request->file('developer_image');
            $extension=$file->getClientOriginalExtension();
            $file_name=time().'-'.rand(31,999).'.'.$extension;
            $file->move('images/',$file_name);
            $developer->developer_image=$file_name;
        }else
        {
            $developer->developer_image="";
        }

        $developer->save();
        return redirect()->route('developers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data=Developer::find($id);
        //dd($data);
        return view('developers.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Developer::find($id);
        //dd($data);
        return view('developers.edit',['data'=>$data]);
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
        $developer=Developer::find($id);
        $developer->name=$request->input('name');
        $developer->phone=$request->input('phone');
        $developer->messenger=$request->input('messenger');
        $developer->email=$request->input('email');
        $developer->social_media=$request->input('social_media');
        $developer->location=$request->input('location');
        $developer->price=$request->input('price');
        $developer->working_type=$request->input('working_type');
        $developer->price_per_hour=$request->input('price_per_hour');
        $developer->english_level=$request->input('english_level');
        $developer->age=$request->input('age');
        $developer->experience=$request->input('experience');

        if($request->hasFile('developer_image'))
        {
            $destination='images/'.$developer->developer_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }

            $file=$request->file('developer_image');
            $extension=$file->getClientOriginalExtension();
            $file_name=time().'-'.rand(31,999).'.'.$extension;
            $file->move('images/',$file_name);
            $developer->developer_image=$file_name;
        }
        $developer->save();
        return redirect()->route('developers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $developer=Developer::find($id);
        $destination='images/'.$developer->developer_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }

        $selected_skills=$developer->skills;
        $developer->skills()->detach($selected_skills);//delete old skills

        $developer->delete();
        return redirect()->route('developers.index');
    }

    //add skills to developer
    public function add_skills($id)
    {
        $developer_data=Developer::find($id);
        $skills=Skill::all();//all skills
        $selected_skills=$developer_data->skills;
        $selected_skills_ids=array();
        foreach ($selected_skills as $item)
        {
            $selected_skills_ids[$item->id]=$item->id;
        }
        return view('developers.add-skills',['developer_data'=>$developer_data,'skills'=>$skills,'selected_skills_ids'=>$selected_skills_ids]);
    }
//store this skills on db
    public function store_skills(Request $request)
    {
        $developer_data=Developer::find($request->developer_id);

        $selected_skills=$developer_data->skills;
        $developer_data->skills()->detach($selected_skills);//delete old skills

        $req_arr=$request->all();
        foreach ($req_arr['skills'] as $item)
        {
            //inserting
            $skill=Skill::find($item);
            $developer_data->skills()->attach($skill);
        }
        return redirect()->route('developers.index');
    }
}
