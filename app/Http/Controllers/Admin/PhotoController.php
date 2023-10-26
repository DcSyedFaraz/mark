<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $photos = Photo::orderBy("created_at","desc")->get();

        return view("admin.structure.gallery",compact('photos'));
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
        // return $request;
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,jfif|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName() . Str::random(5) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('gallery', $fileName, 'public');

                Photo::create([
                    'file_name' => $file->getClientOriginalName(),
                    'user_id' => Auth::user()->id,
                    'caption' => $request->caption,
                    'path' => $path,
                ]);

            // $image = new Photo();
            // $image->path = $path;
            // $image->save();

            DB::commit();

            return redirect()->back()->with('success', 'Picture uploaded successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

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
        // return $id;
        DB::beginTransaction();

        try {
            $file = Photo::find($id);

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
