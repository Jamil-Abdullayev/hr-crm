<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Company;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr_companies=array();
        $data=Contact::all();
        $companies=Company::all();
        foreach ($companies as $item)
        {
            $arr_companies[$item->id]=$item->name;
        }

        return view('contacts.index',['data'=>$data,'companies'=>$arr_companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=Company::all();
        return view('contacts.create',['companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $developer=new Contact();
        $developer->name=$request->input('name');
        $developer->phone=$request->input('phone');
        $developer->messenger=$request->input('messenger');
        $developer->email=$request->input('email');
        $developer->company_id=$request->input('company_id');
        $developer->save();
        return redirect()->route('contacts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data=Contact::find($id);
        $company=Company::find($data->company_id);
        //dd($data);
        return view('contacts.show',['data'=>$data,'company'=>$company]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $arr_companies=array();

        $data=Contact::find($id);
        $companies=Company::all();
        foreach ($companies as $item)
        {
            $arr_companies[$item->id]=$item->name;
        }

        //dd($data);
        return view('contacts.edit',['data'=>$data,'companies'=>$arr_companies]);
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
        $developer=Contact::find($id);
        $developer->name=$request->input('name');
        $developer->phone=$request->input('phone');
        $developer->messenger=$request->input('messenger');
        $developer->email=$request->input('email');
        $developer->company_id=$request->input('company_id');
        $developer->save();
        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Contact::find($id);
        $data->delete();
        return redirect()->route('contacts.index');
    }
}
