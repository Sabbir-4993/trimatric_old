<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Testimonial;
use File;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonial = Testimonial::orderBy('id','desc')->get();
        return view('backend.testimonial.index', compact('testimonial'));
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
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = ($request->name). "." . date('Y-m-d') . "." . time() . "." . 'testimonial' . "." . $image->getClientOriginalExtension();
            $destination = ('storage/uploads/testimonial');
            $image->move($destination, $name);
            $image_url = $name;
        }else{
            $image = 'Testimonial-sample.png';
        }

        $data['photo'] = $image_url;

        Testimonial::create($data);
        return back()->with('message','Testimonial Added Successfully');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Testimonial::findOrFail($id);
        $image_path = ("storage/uploads/testimonial/{$image->photo}");

        if (File::exists($image_path)) {
            unlink($image_path);
        }

        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return back()->with('message','Testimonial Delete Successfully');
    }
}
