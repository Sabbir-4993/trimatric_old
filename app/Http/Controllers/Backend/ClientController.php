<?php

namespace App\Http\Controllers\Backend;

use App\Client;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id','desc')->get();
        return view('backend.client.index',compact('clients'));
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
            'title' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);

        $current_id = Client::insertGetId([
            'title' => $request->title,
            'link' => $request->link,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('photo')) {
            //upload profile photo start
            $image = $request->file('photo');
            $name = ($request->title).".".$image->getClientOriginalExtension();
            $destination = ('storage/uploads/clients');
            $image->move($destination,$name);
            Client::findOrFail($current_id)->update([
                'photo' => $name,
            ]);

        }

        return back()->with('message','Client Added Successfully');
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
        $client = Client::find($id);
        return view('backend.client.edit', compact('client'));
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
            'photo' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);

        $client = Client::find($id);

        if($request->photo != ''){
            $path = ('/storage/uploads/clients/');

            if ($client->photo != '' && $client->photo != null) {
                $file_old = $path . $client->photo;
                unlink($file_old);
            }
            //upload new file
            $file = $request->photo;
            $filename = ($request->title).".".$file->getClientOriginalExtension();
            $file->move($path, $filename);
            //for update in table
            $client->update(['photo' => $filename]);
        }

        $client->update([
            'title' => $request->title,
            'link' => $request->link,
        ]);
        return redirect()->route('backend-client.index')->with('message','Client Information Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $image = Client::findOrFail($request->id);
        $image_path = ("storage/uploads/clients/{$image->photo}");

        if (File::exists($image_path)) {
            unlink($image_path);
        }

        $client = Client::find($request->id);
        $client->delete();
        return redirect()->back()->with('message','Client Delete Successfully');
    }
}
