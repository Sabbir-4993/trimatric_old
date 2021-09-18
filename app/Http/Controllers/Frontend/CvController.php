<?php

namespace App\Http\Controllers\Frontend;

use App\Cv;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $cvs = Cv::orderBy('id','desc')->get();
//        return view('backend.cv.index', compact('cvs'));
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
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'position' => 'required',
            'description' => '',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
        ]);

        $data = Cv::insertGetId([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'position' => $request->position,
            'description' => $request->description,
            'file' => $request->file,
        ]);

//        dd($data);
        if ($request->hasFile('file')) {
            //upload CV file
            $file = $request->file('file');
            $name = ($request->email) . "_" . ($request->name) . "_" . (date('Y-m-d')) . "." . $file->getClientOriginalExtension();
            $destination = ('storage/uploads/cv/').''.($request->position).'/'.(date('Y-m-d'));
            $file->move($destination, $name);
            Cv::findOrFail($data)->update([
                'file' => $name,
            ]);
        }

        return redirect()->back()->with('message','Your CV Submitted Successfully');
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
        //
    }
}
