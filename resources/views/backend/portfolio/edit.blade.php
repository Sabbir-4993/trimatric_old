@extends('backend.layouts.master')
@section('title')
    Portfolio - Update | Trimatric
@endsection
@section('portfolio')
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
                        <h3 class="page-title">Portfolio</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Portfolio Update</li>
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
                                <h5 class="card-title">Update Portfolio</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('backend-portfolio.update',[$portfolio->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        @php
                                            $projects = \App\Project::all();
                                        @endphp
                                        <label for="">Project Name<span class="text-danger">*</span></label>
                                        <select name="project_id" id="" class="form-control" required>
                                            <option value="" selected disabled> Select Project Category</option>
                                            @foreach($projects as $key=>$row)
                                                <option value="{{$row->id}}" {{(($row->id==$portfolio->project_id)? 'selected' : '')}}> {{$row->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Portfolio Photo Update(Recommended: 1920*1080px)</label>
                                        <input class="form-control" type="file" name="photo">
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
                                <h5 class="card-title">Current Portfolio image</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    @php
                                        $project = \App\Project::where('id',$portfolio->project_id)->first();
                                    @endphp
                                    <img src="{{asset('storage/uploads/portfolio')}}/{{$project->cat_name}}/{{$project->title}}/{{$portfolio->photo}}" alt="">
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
