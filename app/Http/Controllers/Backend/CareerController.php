<?php

namespace App\Http\Controllers\Backend;

use App\Circular;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $circular = Circular::orderBy('id','desc')->get();
        return view('backend.circular.index', compact('circular'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.circular.create');
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
            'title' => 'required',
            'vacancy' => 'required',
            'workplace' => 'required',
            'date' => 'required',
            'salary' => 'required',
            'type' => 'required',
            'status' => '',
            'details' => 'required',
        ]);

        $data = $request->all();

        Circular::create($data);
        return redirect()->route('backend-circular.index')->with('message','Circular Published Successfully');
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
        $circular = Circular::find($id);
        return view('backend.circular.edit', compact('circular'));
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
            'title' => 'required',
            'vacancy' => 'required',
            'workplace' => 'required',
            'date' => 'required',
            'salary' => 'required',
            'type' => 'required',
            'status' => 'required',
            'details' => 'required',
        ]);

        $data = Circular::find($id);
//        Circular::update($data);

        $data->update([
            'title' => $request->title,
            'vacancy' => $request->vacancy,
            'workplace' => $request->workplace,
            'date' => $request->date,
            'salary' => $request->salary,
            'type' => $request->type,
            'status' => $request->status,
            'details' => $request->details,

        ]);
//        dd($data);
        return redirect()->route('backend-circular.index')->with('message','Circular Information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $circular = Circular::findOrFail($request->id);
        $circular->delete();
        return back()->with('message','Circular Delete Successfully');
    }
}
