<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    function uploadForm(){
        echo phpinfo();
        // return view("upload");
    }

    function uploadAction(Request $request){
        $file = $request->file("thumbnail");
        $destination = "public/upload";
        $file->store($destination);



        // $fileName = $file->getClientOriginalName();
        // $file->move($destination,$fileName);
    }

    function uploadMultipleFile(Request $request){
        $files = $request ->file("thumbnail");
        $destination = "upload";
        foreach($files as $file){
            $fileName = $file->getClientOriginalName();
            $file->move($destination,$fileName);
        }
    }
}
