<?php

namespace App\Http\Controllers\Other;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileCheckerController extends Controller
{
    public function check(Request $request)
    {
        $cleanUrl = str_replace('http://elcat.localhost/', '', $request->url_path);
        $localingPath = str_replace('/', '\\', $cleanUrl);
        $final = public_path($localingPath);
        $extension = pathinfo($final)['extension'];

        $mimeType = mime_content_type($final);
        $fileType = explode('/',$mimeType)[0];
        $fileList = array('video','audio','image');

        if(in_array($fileType,$fileList) || $mimeType == 'application/pdf'){
            return response()->json(['status' => 1]);
        }else{
            return response()->json(['status'=>0]);
        }
    }
}
