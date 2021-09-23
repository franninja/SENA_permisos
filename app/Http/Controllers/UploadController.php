<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Upload;

class UploadController extends Controller
{
    public function getFile($disk, $filename){

        $file = Storage::disk($disk)->path('/' . $filename);
        return response()->file($file);
    }

    public function deleteFile($disk, $filename){
        Storage::disk($disk)->delete($filename);

        $uploads = Upload::where('path', '=', $filename)->get();
        foreach($uploads as $upload){
            $upload->delete();
        }

        return back();
    }
}
