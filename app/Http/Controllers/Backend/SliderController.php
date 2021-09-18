<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Slider;
use Illuminate\Http\Request;
use Carbon\Carbon;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id','desc')->get();
        return view('backend.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title_1' => 'required',
            'title_2' => 'required',
            'title_3' => 'required',
            'description' => 'required',
            'status'  => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);

        $current_id = Slider::insertGetId([
            'title_1' => $request->title_1,
            'title_2' => $request->title_2,
            'title_3' => $request->title_3,
            'description' => $request->description,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('photo')) {
            //upload profile photo start
            $image = $request->file('photo');
            $name = ($current_id). "." . $image->getClientOriginalExtension();
            $destination = ('storage/uploads/slider');
            $image->move($destination,$name);
            Slider::findOrFail($current_id)->update([
                'photo' => $name,
            ]);

        }

        return back()->with('slider_added','Slider Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title_1' => 'required',
            'title_2' => 'required',
            'title_3' => 'required',
            'description' => 'required',
            'status' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);


        $slider = Slider::find($id);

        if($request->image != '') {
            $path = ('/storage/uploads/slider/');
            //code for remove old file
            if ($slider->image != '' && $slider->image != null) {
                $file_old = $path . $slider->image;
                unlink($file_old);
            }
            //upload new file
            $file = $request->image;
            $filename = ($request->id). "." . $file->getClientOriginalExtension();
            $file->move($path, $filename);
            //for update in table
            $slider->update(['image' => $filename]);
        }
        $slider->update([
            'title_1' => $request->title_1,
            'title_2' => $request->title_2,
            'title_3' => $request->title_3,
            'description' => $request->description,
            'status' => $request->status,
            'updated_at' => Carbon::now(),
        ]);

        return redirect()->route('slider.index')->with('message','Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Slider::findOrFail($id);
        $image_path = ("/storage/uploads/slider/{$image->photo}");

        if (File::exists($image_path)) {
            unlink($image_path);
        }

        $slider = Slider::find($id);

        $slider->delete();
        return redirect()->back()->with('message','Slider Delete Successfully');
    }
}
