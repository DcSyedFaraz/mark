<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bussiness;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use UniSharp\LaravelFilemanager\Lfm;
use UniSharp\LaravelFilemanager\LfmPath;

class DirectoryController extends Controller
{

    public function bussiness()
    {
        $businesses = Bussiness::orderby("created_at", "desc")->paginate(10);
        if (Auth::check() && Auth::user()->hasRole('member')) {

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
            if (Auth::check() && Auth::user()->hasRole('member')) {

                return view('voting.structure.bussiness', compact('businesses'));
            } else {

                return view('admin.structure.bussiness', compact('businesses'));
            }
        }
    }


    public function store(Request $request)
    {
        return $request;
    }
    public function bussinessStore(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string',
            'otherCategory' => 'nullable|string|max:255',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'website' => 'nullable|url',
            'recommendation_note' => 'nullable|string',
        ]);

        // 2. Prepare payload for creation
        $businessPayload = [
            'name' => $data['name'],
            'category' => $data['category'],
            // only include other_category if category is “Other”
            'otherCategory' => $data['category'] === 'Other'
                ? $data['otherCategory']
                : null,
            'phone' => $data['phone'] ?? null,
            'email' => $data['email'] ?? null,
            'website' => $data['website'] ?? null,
            'recommendation_note' => $data['recommendation_note'] ?? null,
        ];

        // 3. Create and return the new business
        $business = Bussiness::create($businessPayload);


        return redirect()->back()->with('success', 'Business added successfully.');
    }

    public function bussinessUpdate(Request $request, $id)
    {
        // 1. Validate inline
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:50'],
            'category' => ['nullable', 'string', 'max:100'],
            'otherCategory' => ['nullable', 'string', 'max:100'],
            'email' => ['nullable', 'email', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'recommendation_note' => ['nullable', 'string'],
        ]);
        $business = Bussiness::findOrFail($id);
        // 2. Conditionally clear otherCategory
        if ($data['category'] !== 'Other') {
            $data['otherCategory'] = null;
        }

        // 3. Mass-assign & save
        $business->update($data);

        // 4. Redirect back with flash
        return back()->with('success', 'Business updated successfully.');
    }


    public function bussinessDelete($id)
    {
        //    return $id;
        $bussiness = Bussiness::find($id);
        $bussiness->delete();
        return redirect()->back()->with('success', 'Bussiness Deleted Successfully');
    }
}
