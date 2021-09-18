<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Team;
use Carbon\Carbon;
use File;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::orderBy('id','desc')->get();
        return view('backend.team.index', compact('teams'));
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
            'department' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = ($request->name). "." .$image->getClientOriginalExtension();
            $destination = ('storage/uploads/teams');
            $image->move($destination, $name);
            $image_url = $name;
        }else{
            $image = 'Team-sample.png';
        }

        $data['photo'] = $image_url;

        Team::create($data);
        return back()->with('message','Team Member Added Successfully');
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
        $team = Team::find($id);
        return view('backend.team.edit', compact('team'));
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
            'department' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);

        $team = Team::find($id);

        if($request->photo != ''){
            $path = ('/storage/uploads/teams/');

            if ($team->photo != '' && $team->photo != null) {
                $file_old = $path . $team->photo;
                unlink($file_old);
            }
            //upload new file
            $file = $request->photo;
            $filename = ($request->name). "." .$file->getClientOriginalExtension();
            $file->move($path, $filename);
            //for update in table
            $team->update(['photo' => $filename]);
        }

        $team->update([
            'department' => $request->department,
            'name' => $request->name,
            'designation' => $request->designation,
        ]);

        return redirect()->route('team_member.list.index')->with('message','Team Member Profile Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Team::findOrFail($id);
        $image_path = ("storage/uploads/teams/{$image->photo}");

        if (File::exists($image_path)) {
            unlink($image_path);
        }

        $team = Team::find($id);
        $team->delete();
        return back()->with('message','Team Member Delete Successfully');
    }
}
