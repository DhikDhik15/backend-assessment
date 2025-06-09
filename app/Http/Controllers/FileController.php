<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate(['file' => 'required|file|max:10240|mimes:jpg,pdf,txt']);
        $path = $request->file('file')->store('uploads', 'public');
        return response()->json(['url' => asset("storage/$path")]);
    }

    public function get($filename)
    {
        $path = storage_path("app/public/uploads/$filename");
        if (!file_exists($path)) {
            return response()->json(['error' => 'File not found'], 404);
        }
        return response()->file($path);
    }
}
