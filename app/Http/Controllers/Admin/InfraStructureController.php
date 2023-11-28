<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Storage;

class InfraStructureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $files = Files::orderBy("created_at","desc")->where('type','water_system')->get();
        return view("admin.structure.index",compact('files'));
    }

    public function plantInfo()
    {   $files = Files::orderBy("created_at","desc")->where('type','plantInfo')->get();
        return view("admin.structure.plant",compact('files'));
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
        // dd($request->file('files'));


        // Validate the uploaded files
        $request->validate([
            'files.*' => 'required|file|max:5120',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('water_system', $fileName, 'public');

                Files::create([
                    'name' => $file->getClientOriginalName(),
                    'type' => 'water_system',
                    'path' => $path,
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Files uploaded successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'File upload failed. Please try again.'.$e->getMessage());
        }
    }
    public function plantStore(Request $request)
    {
        // return $request;


        // Validate the uploaded files
        $request->validate([
            'files.*' => 'required|file|max:5120',
        ]);

        // Start a database transaction
        DB::beginTransaction();

        try {
            foreach ($request->file('files') as $file) {
                $fileName = $file->getClientOriginalName() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('plantInfo', $fileName, 'public');

                Files::create([
                    'name' => $file->getClientOriginalName(),
                    'type' => 'plantInfo',
                    'path' => $path,
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Files uploaded successfully.');
        } catch (\Exception $e) {
            DB::rollback();

            return redirect()->back()->with('error', 'File upload failed. Please try again.'.$e->getMessage());
        }
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
       return $id;
    }
    public function delete($id)
    {
    //    return $id;
       DB::beginTransaction();

       try {
           $file = Files::find($id);

           if (!$file) {
               return redirect()->back()->with('error', 'File not found.');
           }

           if (Storage::disk('public')->exists($file->path)) {
            // dd('done');
               Storage::disk('public')->delete($file->path);
           }

           $file->delete();

           DB::commit();

           return redirect()->back()->with('success', 'File deleted successfully.');
       } catch (\Exception $e) {
           DB::rollback();

           return redirect()->back()->with('error', 'File deletion failed. Please try again.');
       }
    }

}
