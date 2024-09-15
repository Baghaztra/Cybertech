<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.event.index");
    }

    public function getAll()
    {
        return response()->json([
            'statusCode' => 200,
            'data' => Event::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'event_date' => 'required|date',
            'registration_url' => 'nullable|url'
        ]);

        $event = Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'event_date' => $validated['event_date'],
            'registration_url' => $validated['registration_url']
        ]);

        if ($request->hasFile('images')) {
            $i = 0;
            foreach($request->file('images') as $file) {
                $fileName = time() . $i++ . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('media'), $fileName);
                $asset = new Asset();
                $asset->path = 'media/'.$fileName;
                $asset->type = 'event';
                $asset->entity_id = $event->id;
                $asset->save();
            }
        }

        return redirect('admin/event')->with('success', 'Berhasil menambahkan event baru.');
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
        return view('admin.event.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'event_date' => 'required|date',
            'registration_url' => 'nullable|url'
        ]);

        $event->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'event_date' => $validated['event_date'],
            'registration_url' => $validated['registration_url']
        ]);

        if ($request->hasFile('images')) {
            $i = 0;
            foreach($request->file('images') as $file) {
                $fileName = time() . $i++ . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('media'), $fileName);
                $asset = new Asset();
                $asset->path = 'media/'.$fileName;
                $asset->tipe = 'event';
                $asset->entity_id = $event->id;
                $asset->save();
            }
        }

        return redirect('admin/event')->with('success', 'Berhasil mengubah event');
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
