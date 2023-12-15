<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bussiness;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use UniSharp\LaravelFilemanager\Lfm;
use UniSharp\LaravelFilemanager\LfmPath;

class DirectoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bussiness()
    {
        $businesses = Bussiness::orderby("created_at", "desc")->paginate(10);
        if (Auth::user()->hasRole('member')) {

            return view('voting.structure.bussiness', compact('businesses'));
        } else {

            return view('admin.structure.bussiness', compact('businesses'));
        }

    }

    public function index()
    {
        $users = User::withRole('member')->whereaccess('approved')->get();
        return view('admin.structure.directory', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        // dd($request->has('typeahead'));
        $category = $request->input('query');


        if ($request->has('typeahead')) {
            $businesses = Bussiness::searchByCategory($category)->get();


            $response = $businesses->map(function ($business) {
                return ['name' => $business->category];
            });
            // dd($response);

            return response()->json($response);

        } else {
            $businesses = Bussiness::searchByCategory($category)->paginate(10);
            if (Auth::user()->hasRole('member')) {

                return view('voting.structure.bussiness', compact('businesses'));
            } else {

                return view('admin.structure.bussiness', compact('businesses'));
            }

        }
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
            'category' => 'required',
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
    public function bussinessUpdate(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'phone' => 'required',
            'category' => 'required',
            'email' => 'required|email',
            'website' => 'nullable|url',
            'recommendation_note' => 'nullable'
        ];

        // Validate the request data
        $validatedData = $request->validate($rules);

        try {
            // Find the business by ID
            $business = Bussiness::find($id);

            if (!$business) {
                return redirect()->back()->with('error', 'Business not found.');
            }

            // Update the business fields from the request
            $business->fill($validatedData);


            // Save the updated business
            $business->save();

            return redirect()->back()->with('success', 'Business updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the business.');
        }
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
        return redirect()->back()->with('success', 'Bussiness Deleted Successfully');
    }
}
