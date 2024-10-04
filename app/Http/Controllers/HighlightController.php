<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Highlight;
use App\Models\TemporaryImage;
use Illuminate\Console\View\Components\Ask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HighlightController extends Controller
{
    public function index()
    {
        return view("admin.highlight.index");
    }

    public function getAll()
    {
        return response()->json([
            'statusCode' => 200,
            'data' => Highlight::latest()->get()
        ]);
    }
    
    public function show(Highlight $highlight)
    {
        $imageUrl = Storage::url('media/' . $highlight->image->path);
        return response()->json([
            'status' => 200,
            'data' => $highlight,
            'imageUrl' => $imageUrl
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
        return view("admin.highlight.create", ['files'=>$files]);
    }    

    public function edit(Highlight $highlight)
    {
        $image = $highlight->image;
        $file = [
            'file' => substr($image->path, strrpos($image->path, '/') + 1),
            'folder' => $image->type,
        ];
        $temporaryImage = TemporaryImage::create([
            'file' => substr($image->path, strrpos($image->path, '/') + 1),
            'folder' => $image->type,
        ]);
        $sourcePath = 'media/' . $temporaryImage->folder . '/' . $temporaryImage->file;
        $destinationPath = 'media/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file;
        Storage::copy($sourcePath, $destinationPath);

        return view('admin.highlight.edit', ['highlight'=>$highlight,'file'=>$file]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'media' => 'required',
            'url' => 'nullable',
        ]);

        $highlight = Highlight::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'url' => $request->url,
        ]);

        // Pindahkan gambar temporary
        $temporaryImage = TemporaryImage::first();
        $sourcePath = 'media/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file;
        $destinationPath = 'media/' . $temporaryImage->folder . '/' . $temporaryImage->file;
        Storage::copy($sourcePath, $destinationPath);

        // buat gambar sebagai data asset
        $image = Asset::create([
            'path'=>$temporaryImage->folder.'/'.$temporaryImage->file,
            'type'=>'highlight',
            'entity_id' => $highlight->id,
        ]);

        // hapus temporary image
        Storage::deleteDirectory('media/tmp/'. $temporaryImage->folder);
        $temporaryImage->delete();
       
        // simpan id gambar ke anu
        $highlight->update(['image_id'=>$image->id]);
        
        return redirect('admin/highlight')->with('status', 'Successfully added "' . $highlight->title . '".');

    }

    public function update(Request $request, Highlight $highlight)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'media' => 'required',
            'url' => 'nullable',
        ]);

        $highlight->update([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'url' => $request->url,
        ]);
        
        // Hapus gambar lama
        $oldImage = Asset::where('type', 'highlight')->where('entity_id', $highlight->id)->first();
        // dd($oldImage);
        if($oldImage){
            Storage::deleteDirectory('media/'. $oldImage->path);
            $oldImage->delete();
        }

        // Pindahkan gambar temporary ke asset
        $temporaryImage = TemporaryImage::first();
        $sourcePath = 'media/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file;
        $destinationPath = 'media/' . $temporaryImage->folder . '/' . $temporaryImage->file;
        Storage::move($sourcePath, $destinationPath);

        // Tambah gambar baru ke asset
        $image = Asset::create([
            'path'=>$temporaryImage->folder.'/'.$temporaryImage->file,
            'type'=>'highlight',
            'entity_id' => $highlight->id,
        ]);

        // Hapus temporary
        Storage::deleteDirectory('images/tmp/'. $temporaryImage->folder);
        $temporaryImage->delete();
       
        // Berikan id gambar ke highlight
        $highlight->update(['image_id'=>$image->id]);
        
        return redirect('admin/highlight')->with('status', 'Successfully update "' . $highlight->title . '".');
    }

    public function destroy(Highlight $highlight)
    {
        // jika data tidak ada
        if (!$highlight) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found.'
            ]);
        }

        // Hapus gambar
        $image = Asset::where('type', 'highlight')->where('entity_id', $highlight->id)->first();
        if($image){
            Storage::deleteDirectory('media/'. $image->path);
            $image->delete();
        }

        // Hapus data
        $title = $highlight->title;
        $highlight->delete();
        
        return response()->json([
            'status' => 200,
            'message' => `Successfully delete highlight $title.`
        ]);
    }
}
