@extends('backend.layouts.master')
@section('title')
    Project - Update | Trimatric
@endsection
@section('project')
    active
@endsection

@section('content')
    <!-- Page Wrapper -->
    <div class="page-wrapper">

        <div class="content container-fluid">

            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col">
                        <h3 class="page-title">Project</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Project Update</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Update Project</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('backend-project.update',[$project->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="">Project Category<span class="text-danger">*</span></label>
                                        <select name="cat_name" id="" class="form-control">
                                            <option value="" disabled>Select Project Category</option>
                                            <option value="Corporate" {{(($project->cat_name=='Corporate')? 'selected' : '')}}>Corporate</option>
                                            <option value="Industrial" {{(($project->cat_name=='Industrial')? 'selected' : '')}}>Industrial</option>
                                            <option value="Architectural" {{(($project->cat_name=='Architectural')? 'selected' : '')}}>Architectural</option>
                                            <option value="GovernmentProject" {{(($project->cat_name=='GovernmentProject')? 'selected' : '')}}>GovernmentProject</option>
                                            <option value="Hospitality" {{(($project->cat_name=='Hospitality')? 'selected' : '')}}>Hospitality</option>
                                            <option value="Residential" {{(($project->cat_name=='Residential')? 'selected' : '')}}>Residential</option>
                                            <option value="Educational" {{(($project->cat_name=='Educational')? 'selected' : '')}}>Educational</option>
                                            <option value="Religious" {{(($project->cat_name=='Religious')? 'selected' : '')}}>Religious</option>
                                            <option value="FB" {{(($project->cat_name=='FB')? 'selected' : '')}}>F & B</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Project Name<span class="text-danger">*</span></label>
                                        <input class="form-control " type="text" name="title" rows="4" value="{{$project->title}}"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Project Start<span class="text-danger">*</span></label>
                                        <input class="form-control " type="date" name="project_start" rows="4" value="{{$project->project_start}}"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Project Location<span class="text-danger">*</span></label>
                                        <input class="form-control " type="text" name="project_address" rows="4" value="{{$project->project_address}}"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Project Status<span class="text-danger">*</span></label>
                                        <select name="status" id="" class="form-control">
                                            <option value="" disabled> Select Project Category</option>
                                            <option value="Running" {{(($project->status=='Running')? 'selected' : '')}}>Running</option>
                                            <option value="Complete" {{(($project->status=='Complete')? 'selected' : '')}}>Complete</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Description<span class="text-danger">*</span></label>
                                        <textarea class="form-control " type="text" name="description" rows="6">{{$project->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Update Project Image(Recommended: 1920px*715px)<span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="photo">
                                        @error ('photo')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Current Project image</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <img src="{{ asset('storage/uploads/projects') }}/{{$project->cat_name}}/{{$project->photo}}" alt="{{$project->title}}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection
