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
    
    public function show(Highlight $highlight)
    {
        return response()->json([
            'status' => 200,
            'data' => $highlight
        ]);
    }

    public function edit(Highlight $highlight)
    {
        $temporaryImages = TemporaryImage::all();
        $files = $temporaryImages->map(function ($img) {
            return [
                'file' => $img->file,
                'folder' => $img->folder,
            ];
        });
        return view('admin.highlight.edit', ['highlight'=>$highlight,'files'=>$files]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'url' => 'nullable',
        ]);

        $highlight = Highlight::create([
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'description' => $request->description,
            'url' => $request->url,
        ]);

        $temporaryImage = TemporaryImage::first();
        $sourcePath = 'media/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file;
        $destinationPath = 'media/' . $temporaryImage->folder . '/' . $temporaryImage->file;
        Storage::copy($sourcePath, $destinationPath);

        $image = Asset::create([
            'path'=>$temporaryImage->folder.'/'.$temporaryImage->file,
            'type'=>'highlight',
            'entity_id' => $highlight->id,
        ]);
        Storage::deleteDirectory('images/tmp/'. $temporaryImage->folder);
        $temporaryImage->delete();
       
        $highlight->update(['image_id'=>$image->id]);
        
        return redirect('admin/highlight')->with('status', 'Successfully added "' . $highlight->title . '".');

    }

    public function update(Request $request, Highlight $highlight)
    {
        $validated = $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'description' => 'required',
            'image_id' => 'nullable',
            'url' => 'required',
        ]);

        $highlight->update($validated);

        
        return redirect('admin/highlight')->with('status', 'Successfully update "' . $highlight->title . '".');
    }

    public function destroy(Highlight $highlight)
    {
        if (!$highlight) {
            return response()->json([
                'status' => 404,
                'message' => 'Data not found.'
            ]);
        }

        $image = Asset::where('type', 'highlight')->where('entity_id', $highlight->id)->first();
        if($image){
            Storage::deleteDirectory('media/'. $image->path);
            $image->delete();
        }

        $title = $highlight->title;
        $highlight->delete();
        return response()->json([
            'status' => 200,
            'message' => `Successfully delete event $title.`
        ]);
    }
}
