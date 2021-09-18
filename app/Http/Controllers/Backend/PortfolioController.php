<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Portfolio;
use App\Project;
use Carbon\Carbon;
Use File;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Portfolio::orderBy('id','desc')->get();
        return view('backend.portfolio.index',compact('portfolios'));
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
        request()->validate([
            'profileImage.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $project = Project::findOrFail($request->project_id);

        if ($files = $request->file('profileImage')){
            $destinationPath = ('storage/uploads/portfolio/'.$project->cat_name.'/'.$project->title); // upload path
            $project_id = $request->project_id;
            foreach ($files as $image){
                $profileImage =$project_id."_".$image->getClientOriginalName();
                $image->move($destinationPath, $profileImage);
                $portfolio= new Portfolio();
                $portfolio->photo=$profileImage;
                $portfolio->project_id=$project_id;
                $portfolio->save();
            }
        }

        return back()->with('message','Portfolio Added Successfully');

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
        $portfolio = Portfolio::find($id);
        return view('backend.portfolio.edit', compact('portfolio'));
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
            'project_id' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,bmp,gif,svg|max:2048',
        ]);

        $portfolio = Portfolio::find($id);
        $project = Project::where('id',$request->project_id)->first();
        if($request->photo != ''){
            $path = ('storage/uploads/portfolio/'.$project->cat_name.'/'.$project->title.'/'); // upload path

            if ($portfolio->photo != '' && $portfolio->photo != null) {
                $file_old = $path . $portfolio->photo;
                unlink($file_old);
            }
            //upload new file
            $file = $request->photo;
            $filename = $request->project_id."_".$file->getClientOriginalName();
            $file->move($path, $filename);
            //for update in table
            $portfolio->update(['photo' => $filename]);
        }

        $portfolio->update([
            'project_id' => $request->project_id,
        ]);

        return redirect()->route('backend-portfolio.index')->with('message','Portfolio Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $portfolioImage = Portfolio::findOrFail($request->id);
        $project = Project::where('id',$portfolioImage->project_id)->first();

        $image_path = ('storage/uploads/portfolio/'.$project->cat_name.'/'.$project->title.'/'.$portfolioImage->photo);

        if (File::exists($image_path)) {
            unlink($image_path);
        }

        $portfolio = Portfolio::find($request->id);
        $portfolio->delete();
        return back()->with('message','Portfolio Delete Successfully');
    }
}
