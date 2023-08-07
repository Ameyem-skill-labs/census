<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function showImage($field,$filename)
    {
        // return [$field=>$filename];
        $path = public_path('images/'.$field .'/'. $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
    public function showImage2($filename)
    {
        // return [$field=>$filename];
        $path = public_path('images/'. $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
