<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\TemporaryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class AssetController extends Controller
{

    public function uploadMedia(Request $request, $type)
    {
        if ($request->hasFile('media')) {
            $image = $request->file('media');
            $fileName = $image->getClientOriginalName();
            $folder = $type;

            $existingImage = TemporaryImage::where('folder', $folder)->where('file', $fileName)->first();
            if (!$existingImage) {
                $image->storeAs('media/tmp/'.$folder.'/'.$fileName);

                TemporaryImage::create([
                    'folder' => $folder,
                    'file' => $fileName,
                ]);
            }

            return $folder;
        }
        
        return response()->json([ 'statusCode' => 200,]);
    }

    public function destroyMedia()
    {
        $temporatyImage = TemporaryImage::where('folder', request()->getContent())->first();
        if($temporatyImage){
            Storage::deleteDirectory('media/tmp/'. $temporatyImage->folder);
            $temporatyImage->delete();
        }

        return response()->noContent();
    }
    
    public function emptyTemporary()
    {
        $temporatyImages = TemporaryImage::all();
        foreach ($temporatyImages as $temporatyImage) {
            if($temporatyImage){
                Storage::deleteDirectory('media/tmp/'. $temporatyImage->folder);
                $temporatyImage->delete();
            }
        }

        return response()->noContent();
    }
}
