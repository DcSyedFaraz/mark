<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bussiness;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bussiness()
    {
        $businesses= Bussiness::orderby("created_at","desc")->get();
        return view('admin.structure.bussiness',compact('businesses'));
    }

    public function index()
    {
        $users= User::withRole('member')->get();
        return view('admin.structure.directory',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $request;
    }
    public function bussinessStore(Request $request)
    {
        // return $request;
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'recommendation_note' => 'nullable'
        ];

        // Validate the request
        $request->validate($rules);

        $business = new Bussiness;
        $business->fill($request->all());

        $business->user_id = Auth::id();

        $business->save();

        return redirect()->back()->with('success', 'Business added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function bussinessDelete($id)
    {
    //    return $id;
       $bussiness = Bussiness::find($id);
       $bussiness->delete();
       return redirect()->back()->with('success','Bussiness Deleted Successfully');
    }
}
