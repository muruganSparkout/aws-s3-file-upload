<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



class ImageUploadController extends Controller
{
    public function index(){
        $files = Model::select('url')->get();
       
        foreach($files as $url)
        {
            //$url = 'https://keepers-rental.s3.us-east-2.amazonaws.com/uploads/1596979507237941.jpeg'; 
            $filename = substr(strrchr(rtrim($url, '/'), '/'), 1);
            $data = Storage::disk('s3')->put('uploads/'.$filename, file_get_contents($url));
            // $data = Storage::disk('s3')->copy($object,'fabvenues');
            // $data = Storage::disk('s3')->allFiles('');
            dd($data);
        }

        // $imageName = time().'.'.$request->image->extension();  
     
        // $path = Storage::disk('s3')->put('images', $request->image);
        // $path = Storage::disk('s3')->url($path);
    }
}
