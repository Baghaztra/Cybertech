<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Event;
use App\Models\TemporaryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AssetController extends Controller
{

    public function uploadMedia(Request $request, $type)
    {
        try {
            if ($request->hasFile('media')) {
                $image = $request->file('media');
                $fileName = $image->getClientOriginalName();
                // $randomString = Str::random(10);
                // $fileName = now()->timestamp . $randomString .'.'. $image->getClientOriginalExtension();
                $folder = $type;
    
                $existingImage = TemporaryImage::where('folder', $folder)->where('file', $fileName)->first();
                if (!$existingImage) {
                    $image->move('media/tmp/'.$folder.'/', $fileName);
    
                    TemporaryImage::create([
                        'folder' => $folder,
                        'file' => $fileName,
                    ]);
                }
    
                // return $folder;
            }
            
            return response()->json([ 'statusCode' => 200]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json([ 'statusCode' => 500, 'msg'=>$th]);
        }
    }

    public function destroyMedia()
    {
        $temporatyImage = TemporaryImage::where('folder', request()->getContent())->first();
        if($temporatyImage){
            $filePath = public_path('media/tmp/'. $temporatyImage->folder.'/'.$temporatyImage->file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $temporatyImage->delete();
        }

        return response()->noContent();
    }
    
    public function emptyTemporary()
    {
        $temporatyImages = TemporaryImage::all();
        foreach ($temporatyImages as $temporatyImage) {
            if($temporatyImage){
                $this->deleteFolder(public_path('media/tmp/'. $temporatyImage->folder));
                $temporatyImage->delete();
            }
        }

        return response()->noContent();
    }

    public function deleteFolder($folderPath)
    {
        // Cek apakah folder ada
        if (is_dir($folderPath)) {
            // Ambil semua file dan folder di dalamnya
            $files = scandir($folderPath);

            foreach ($files as $file) {
                if ($file != "." && $file != "..") {
                    $filePath = public_path($folderPath . '/' . $file);
                    if (is_dir($filePath)) {
                        // Jika ini folder, panggil fungsi ini lagi (rekursif)
                        $this->deleteFolder($filePath);
                    } else if(file_exists($filePath)) {
                        // Jika ini file, hapus file
                        unlink($filePath);
                    }
                }
            }
            // Setelah semua file dan folder dihapus, hapus folder utamanya
            rmdir($folderPath);
        }
    }

    public function setAsJumbotron($id)
    {
        $image = Asset::find($id);
        if (!$image) {
            return response()->json(['error' => 'Image not found'], 404);
        }
        
        // Hapus jumbotron lama
        $img = Event::find($image->entity_id)->jumbotron;
        if ($img) {
            $img->status = 'default';
            $img->save();
        }

        $image->status = 'jumbotron';
        $image->save();
        return response()->json($image);
    }
    public function setAsPoster($id)
    {
        $image = Asset::find($id);
        if (!$image) {
            return response()->json(['error' => 'Image not found'], 404);
        }

        // Hapus poster lama
        $img = Event::find($image->entity_id)->poster;
        if ($img) {
            $img->status = 'default';
            $img->save();
        }

        $image->status = 'poster';
        $image->save();
        return response()->json($image);
    }
}
