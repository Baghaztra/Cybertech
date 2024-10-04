<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Event;
use App\Models\TemporaryImage;
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
    
    public function show(Event $event)
    {
        $imageUrls = [];
        foreach ($event->images as $image) {
            $imageUrls[] = Storage::url('media/' . $image->path);
        }
        return response()->json([
            'status' => 200,
            'data' => $event,
            'imageUrls' => $imageUrls
        ]);
    }

    public function create()
    {
        $temporaryImages = TemporaryImage::all();
        $files = $temporaryImages->map(function ($img) {
            return [
                'file' => $img->file,
                'folder' => $img->folder,
            ];
        });
        return view("admin.event.create", ['files'=>$files]);
    }

    public function edit(Event $event)
    {
        // menyimpan gambar untuk ditampilkan
        $images = $event->images;
        $files = $images->map(function ($image) {
            return [
                'file' => substr($image->path, strrpos($image->path, '/') + 1),
                'folder' => $image->type,
            ];
        });
        
        // memasukkan gambar default event ke temporary untuk diedit
        foreach ($images as $image) {
            $temporaryImage = TemporaryImage::create([
                'file' => substr($image->path, strrpos($image->path, '/') + 1),
                'folder' => $image->type,
            ]);

            // copy file gamabr ke temporary, untuk preview
            $sourcePath = 'media/' . $temporaryImage->folder . '/' . $temporaryImage->file;
            $destinationPath = 'media/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file;
            Storage::copy($sourcePath, $destinationPath);
        }

        return view('admin.event.edit', ['event'=>$event,'files'=>$files]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'event_date' => 'required|date',
            'media' => 'required',
            'registration_url' => 'nullable|url',
        ]);

        $event = Event::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'event_date' => $validated['event_date'],
            'registration_url' => $validated['registration_url']
        ]);

        // Pindahkan gambar temporary
        $temporaryImages = TemporaryImage::all();
        foreach ($temporaryImages as $temporaryImage) {
            $sourcePath = 'media/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file;
            $destinationPath = 'media/' . $temporaryImage->folder . '/' . $temporaryImage->file;
            Storage::copy($sourcePath, $destinationPath);
            
            // simpan gambar sebagai data asset
            Asset::create([
                'path'=>$temporaryImage->folder.'/'.$temporaryImage->file,
                'type'=>'event',
                'entity_id' => $event->id,
            ]);

            // hapus temporary image
            $temporaryImage->delete();
            Storage::deleteDirectory('media/tmp/'. $temporaryImage->folder);
        }
        
        return redirect('admin/event')->with('success', 'Berhasil menambahkan event baru.');
    }

    public function update(Request $request, Event $event)
    {
        // Validasi Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'event_date' => 'required|date',
            'media' => 'required',
            'registration_url' => 'nullable|url',
        ]);

        // Update event
        $event->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'event_date' => $validated['event_date'],
            'registration_url' => $validated['registration_url'] ?? null,
        ]);

        $oldImages = Asset::where('type', 'event')->where('entity_id', $event->id)->get();
        foreach ($oldImages as $oldImage) {
            // Hapus gambar lama
            if($oldImage){
                Storage::deleteDirectory('media/'. $oldImage->path);
                $oldImage->delete();
            }
        }

        // Pindahkan gambar temporary ke asset
        $temporaryImages = TemporaryImage::all(); // Ambil semua gambar sementara
        foreach ($temporaryImages as $temporaryImage) {
            $sourcePath = 'media/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file;
            $destinationPath = 'media/' . $temporaryImage->folder . '/' . $temporaryImage->file;
            Storage::copy($sourcePath, $destinationPath);
            
            // Tambah gambar baru ke asset
            Asset::create([
                'path' => $temporaryImage->folder . '/' . $temporaryImage->file,
                'type' => 'event',
                'entity_id' => $event->id,
            ]);

            // Hapus temporary
            Storage::deleteDirectory('media/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file);
            $temporaryImage->delete();
        }

        return redirect('admin/event')->with('success', 'Berhasil mengubah event');
    }


    public function destroy(Event $event)
    {
        // jika data tidak ada
        if (!$event) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found.'
            ]);
        }

        // Hapus gambar
        $images = Asset::where('type', 'event')->where('entity_id', $event->id);
        foreach ($images as $image) {
            if($image){
                Storage::deleteDirectory('media/'. $image->path);
                $image->delete();
            }
        }

        // Hapus data
        $title = $event->title;
        $event->delete();
        
        return response()->json([
            'status' => 200,
            'message' => `Successfully delete event $title.`
        ]);
    }
}
