<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DropzoneController extends Controller
{
    // To render html form upload
    public function Faculty_RequirementBin()
    {
        return view('Faculty_RequirementBin');
    }

    // To upload file from user to server
    public function store(Request $req)
    {
        $reqBin = $req->file('file');
        $reqBinName = time().rand(1,100).'.'.$reqBin->extension();
        $reqBin->move(public_path('/uploaded_files'),$reqBinName);
        return response()->json(['success' => $reqBinName]);
    }

    // To remove
    public function deleteFile($reqBin) {
        // to follow = stuck part tuts (https://www.youtube.com/watch?v=z3rhk8jF1sY)
    }

}
