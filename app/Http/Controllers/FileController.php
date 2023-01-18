<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Image;
use Illuminate\Http\Request;

class FileController extends Controller
{
 public $uploadPath = 'storage/image/';

  public function index()
    {
        return view('file.index');
    }

    public function store(Request $request)
    {
      $image = $request->file('file');
      $fileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
      $name_gen = str_slug($fileName) . '-' . uniqid(). '.' . $image->getClientOriginalExtension();
      $image->move($this->uploadPath,$name_gen);
      $finalImagePathName = $this->uploadPath.$name_gen;

      $imageUpload = new Image();
      $imageUpload->title = $finalImagePathName;
      $imageUpload->save();
      return response()->json(['success'=>$finalImagePathName]);

    }

}
