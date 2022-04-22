<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use App\Models\Developer;
use Illuminate\Support\Facades\DB;

class BotRequestController extends Controller
{
    public function add(Request $request)
    {
        $DeveloperData=json_decode($request->content(),true);

        $developer=new Developer();
        $developer->name=$DeveloperData['name'];
        $developer->phone=$DeveloperData['phone'];
        //$developer->messenger=$request->input('messenger');
        $developer->email=$DeveloperData['email'];
        //$developer->social_media=$request->input('social_media');
        //$developer->location=$request->input('location');

        if($DeveloperData['type_of_employment']=="Полный рабочий день")
        {
            $developer->working_type=1;
            $developer->price=$DeveloperData['Budget'];
        }
        else
        {
            $developer->working_type=2;
            $developer->price_per_hour=$DeveloperData['Budget'];
        }
        //$developer->english_level=$request->input('english_level');
        //$developer->age=$request->input('age');
        $developer->experience=$DeveloperData['years_exp'];

        /*if($request->hasFile('developer_image'))
        {
            $file=$request->file('developer_image');
            $extension=$file->getClientOriginalExtension();
            $file_name=time().'-'.rand(31,999).'.'.$extension;
            $file->move('images/',$file_name);
            $developer->developer_image=$file_name;
        }else
        {
            $developer->developer_image="";
        }*/

        $developer->save();

        $developer_data=Developer::find($developer->id);

        $selected_skills=$developer_data->skills;
        $developer_data->skills()->detach($selected_skills);//delete old skills

        $skill_lang=DB::table('skills')->select('id')->where('name',$DeveloperData['planguage'])->get();
        $skill_tech=DB::table('skills')->select('id')->where('name',$DeveloperData['technology'])->get();
        $developer_data->skills()->attach($skill_lang);
        $developer_data->skills()->attach($skill_tech);
        // return redirect()->route('developers.index');
    }
}
