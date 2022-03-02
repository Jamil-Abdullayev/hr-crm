<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use Illuminate\Http\Request;

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
        $data=Developer::find($id);
        $data->delete();
        return redirect()->route('developers.index');
    }
}
