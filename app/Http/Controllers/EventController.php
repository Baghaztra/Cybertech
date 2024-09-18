<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
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

    public function create()
    {
        return view('admin.event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'event_date' => 'required|date',
            'registration_url' => 'nullable|url',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3072'
        ]);

        $event = Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'event_date' => $validated['event_date'],
            'registration_url' => $validated['registration_url']
        ]);

        // jalankan coment
        // php artisan storage:link
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $path = $file->store('public/media'); // Menyimpan file di 'storage/app/public/media'
                $asset = new Asset();
                $asset->path = Storage::url($path); // Menggunakan URL yang benar dari penyimpanan
                $asset->type = 'event';
                $asset->entity_id = $event->id;
                $asset->save();
            }
        }
        
        return redirect('admin/event')->with('success', 'Berhasil menambahkan event baru.');
    }

    public function show(Event $event)
    {
        return response()->json([
            'status' => 200,
            'data' => $event
        ]);
    }

    public function edit(Event $event)
    {
        return view('admin.event.edit', ['event'=>$event]);
    }

    public function update(Request $request, Event $event)
    {
        // Validasi Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'event_date' => 'required|date',
            'registration_url' => 'nullable|url',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:3072'
        ]);

        // Update event
        $event->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'event_date' => $validated['event_date'],
            'registration_url' => $validated['registration_url'] ?? null,
        ]);

        if ($request->hasFile('images')) {
            // Hapus file media lama jika ada media baru
            $existingAssets = Asset::where('entity_id', $event->id)->where('tipe', 'event')->get();
            foreach ($existingAssets as $existingAsset) {
                if (Storage::exists($existingAsset->path)) {
                    Storage::delete($existingAsset->path);
                }                
                $existingAsset->delete();
            }
        
            // Upload file baru
            foreach ($request->file('images') as $file) {
                $path = $file->store('public/media'); // Simpan di 'storage/app/public/media'
                $asset = new Asset();
                $asset->path = Storage::url($path); // Menggunakan URL yang benar
                $asset->tipe = 'event';
                $asset->entity_id = $event->id;
                $asset->save();
            }
        }        

        return redirect('admin/event')->with('success', 'Berhasil mengubah event');
    }


    public function destroy(Event $event)
    {
        Asset::where('entity_id', $event->id)->where('tipe', 'event')->chunk(100, function ($assets) {
            foreach ($assets as $asset) {
                if (Storage::exists($asset->path)) {
                    Storage::delete($asset->path);
                }
                $asset->delete();
            }
        });

        $event->delete();

        return response()->json([
            'status' => 200,
            'message' => "Successfully deleted event $event->title."
        ]);
    }

    public function destroyMedia($id)
    {
        $asset = Asset::findOrFail($id);

        if (Storage::exists($asset->path)) {
            Storage::delete($asset->path);
        } else {
            return response()->json(['success' => false, 'message' => 'File not found'], 404);
        }

        $asset->delete();
        return response()->json(['success' => true, 'message' => 'File successfully deleted']);
    }

    public function uploadMedia(Request $request)
    {
        if ($request->hasFile('images')) {
            $path = $request->file('images')->store('public/media');
            return response()->json([
                'path' => Storage::url($path)
            ]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }

}
