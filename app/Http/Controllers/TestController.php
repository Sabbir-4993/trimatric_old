<?php

namespace App\Http\Controllers;

use App\Portfolio;
use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function upload(Request $request){

        request()->validate([
            'profileImage.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($files = $request->file('profileImage')) {
            // Define upload path
            $destinationPath = ('storage/uploads/portfolio'); // upload path
            $project_id = $request->project_id;
            foreach($files as $img) {
                // Upload Orginal Image
                $profileImage =$project_id."_".$img->getClientOriginalName();
                $img->move($destinationPath, $profileImage);
                // Save In Database
                $imagemodel= new Portfolio();
                $imagemodel->photo=$profileImage;
                $imagemodel->project_id=$project_id;
                $imagemodel->save();
            }

        }
        return redirect()->back();
}
}
