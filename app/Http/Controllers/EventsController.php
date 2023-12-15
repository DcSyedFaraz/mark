<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Events::orderBy("updated_at", "desc")->paginate(7);

        if (Auth::user()->hasRole('member')) {

            return view("voting.event.event", compact("events"));

        } else {

            return view("admin.event.event", compact("events"));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calendar()
    {
        $data['jobs'] = Events::all();
        return view('admin.event.calendar',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'required',
            'category' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        DB::beginTransaction();

        try {
            $event = new Events;
            $event->title = $validatedData['title'];
            $event->category = $validatedData['category'];
            $event->users_id = auth()->user()->id;
            $event->location = $validatedData['location'];
            $event->start_date = $validatedData['start_date'];
            $event->end_date = $validatedData['end_date'];
            $event->description = $validatedData['description'];

            if ($request->hasFile('picture')) {
                $picturePath = $request->file('picture')->store('event_pictures', 'public');
                $event->picture = $picturePath;
            }

            $event->save();

            DB::commit();

            return redirect()->back()->with('success', 'Event created successfully');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withInput()->withErrors(['error' => 'Event creation failed. Please try again.']);
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
        // return $request;
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'description' => 'required',
            'category' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust the image validation rules as needed
        ]);

        try {
            $event = Events::find($id);

            if (!$event) {
                return redirect()->back()->with('error', 'Event not found.');
            }
            // return $validatedData;
            // Update the event fields from the request
            $event->title = $validatedData['title'];
            $event->category = $validatedData['category'];
            $event->location = $validatedData['location'];
            $event->start_date = $validatedData['start_date'];
            $event->end_date = $validatedData['end_date'];
            $event->description = $validatedData['description'];

            // Check if a new picture was uploaded
            if ($request->hasFile('picture')) {
                // Delete the old picture, if it exists
                if ($event->picture) {
                    Storage::delete('public/' . $event->picture);
                }

                // Store the new picture
                $picturePath = $request->file('picture')->store('event_pictures', 'public');
                $event->picture = $picturePath;
            }

            $event->save();

            return redirect()->back()->with('success', 'Event updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the event.' . $e->getMessage());
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
        // return $id;

        try {
            $event = Events::find($id);

            if (!$event) {
                return redirect()->back()->with('error', 'Event not found.');
            }

            // Check if the event has a picture
            if ($event->picture) {
                // Delete the event's picture from storage
                Storage::delete('public/' . $event->picture);
            }

            $event->delete();

            return redirect()->back()->with('success', 'Event Removed Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while deleting the event.');
        }

    }
}
