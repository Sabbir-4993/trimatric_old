<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Portfolio;
use App\Project;
use Carbon\Carbon;
Use File;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id','desc')->get();
        return view('backend.project.index',compact('projects'));
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
            'description' => 'required',
            'cat_name' => 'required',
            'project_start' => 'required',
            'project_address' => 'required',
            'status' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);

        $current_id = Project::insertGetId([
            'title' => $request->title,
            'description' => $request->description,
            'cat_name' => $request->cat_name,
            'project_start' => $request->project_start,
            'project_address' => $request->project_address,
            'status' => $request->status,
            'created_at' => Carbon::now(),
        ]);

        if ($request->hasFile('photo')) {
            //upload profile photo start
            $image = $request->file('photo');
            $name = $request->title."_".$current_id.".".$image->getClientOriginalExtension();
            $destination = ('storage/uploads/projects/'.$request->cat_name);
            $image->move($destination,$name);
            Project::findOrFail($current_id)->update([
                'photo' => $name,
            ]);

        }

        return back()->with('message','Project Added Successfully');
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
        $project = Project::find($id);
        return view('backend.project.edit', compact('project'));
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
            'cat_name' => 'required',
            'title' => 'required',
            'project_start' => 'required',
            'project_address' => 'required',
            'status' => 'required',
            'description' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);

        $project = Project::find($id);

        if($request->photo != ''){
            $path = ('storage/uploads/projects/'.$project->cat_name.'/');

            if ($project->photo != '' && $project->photo != null) {
                $file_old = $path . $project->photo;
                unlink($file_old);
            }
            //upload new file
            $file = $request->photo;
            $filename = $request->title."_".($project->id).".".$file->getClientOriginalExtension();
            $file->move($path, $filename);
            //for update in table
            $project->update(['photo' => $filename]);
        }

        $project->update([
            'cat_name' => $request->cat_name,
            'title' => $request->title,
            'project_start' => $request->project_start,
            'project_address' => $request->project_address,
            'status' => $request->status,
            'description' => $request->description,
        ]);
        return redirect()->route('backend-project.index')->with('message','Project Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $projectDetails = Project::where('id',$request->id)->first();
        $image_path = ('storage/uploads/projects/'.$projectDetails->cat_name.'/'.$projectDetails->photo);


        if (File::exists($image_path)) {
            unlink($image_path);
        }

        $portfolioDetails = Portfolio::where('project_id', $projectDetails->id)->get();
        foreach ($portfolioDetails as $row) {
            Portfolio::where('id', $row->id)->delete();

            $portfolio_image_path = ('storage/uploads/portfolio/'.$projectDetails->cat_name.'/'.$projectDetails->title.'/'.$row->photo);

            if (File::exists($portfolio_image_path)) {
                unlink($portfolio_image_path);
            }
        }

        Project::where('id', $projectDetails->id)->delete();

        return back()->with('message','Project Delete Successfully');
    }
}
