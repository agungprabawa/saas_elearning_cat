<?php

namespace App\Http\Controllers\SrvAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FileController extends Controller
{

    public function cover_img_get(Request $request)
    {
        # code...
    }

    public function file_get(Request $request)
    {
        # code...
    }

    public function cover_img_store($files, $request)
    {

        $my = auth()->user();

        $ext = $files->getClientOriginalExtension();
        $fileName = Str::slug($request->ctitle . ' ' . strtotime('now')) . '.' . $ext;
        $files->move(
            public_path('storage/' . $my->company->uuid . '/cover/'),
            $fileName
        );
        $fileUrl = asset('storage/' . $my->company->uuid . '/cover/' . $fileName);

        return $fileUrl;
    }

    public function file_store($file, $path_to_store)
    {
    }
}
