<?php

namespace App\Http\Controllers;

use App\Models\Highlight;
use Illuminate\Http\Request;

class HighlightController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.users.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'registration_url' => 'nullable',
            'event_date' => 'nullable',
        ]);

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'registration_url' => $request->registration_url,
            'event_date' => $request->event_date,
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Successfully Add Event.'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        return response()->json([
            'status' => 200,
            'data' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'registration_url' => 'nullable',
            'event_date' => 'nullable',
        ]);

        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'registration_url' => $request->registration_url,
            'event_date' => $request->event_date,
        ]);

        return response()->json([
            'status' => 200,
            'message' => `Successfully update event" $event->title."`
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        if (!$event) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found.'
            ]);
        }
        $title = $event->title;
        $event->delete();
        return response()->json([
            'status' => 200,
            'message' => `Successfully delete event $title.`
        ]);
    }
}
