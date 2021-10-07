<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
     public function getImage()
    {
        return view('upload_image');
    }

    public function postImage(Request $request)
    {
        $this->validate($request, [
            'image_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image_file->getClientOriginalExtension();
        $request->image_file->move(public_path('images'), $imageName);
        return back()
            ->with('success','You have successfully upload images.')
            ->with('image',$imageName);
    }
}
