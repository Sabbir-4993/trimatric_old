@extends('backend.layouts.master')
@section('title')
    Slider - Update | Trimatric
@endsection
@section('slider')
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
                        <h3 class="page-title">Slider</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Slider <Update></Update></li>
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
                                <h5 class="card-title">Update Slider</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('slider.update',[$slider->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{$slider->id}}">
                                    <div class="form-group">
                                        <label>Title 1 <span class="text-danger">*</span></label>
                                        <input type="text" name="title_1" class="form-control" value="{{$slider->title_1}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Title 2 <span class="text-danger">*</span></label>
                                        <input type="text" name="title_2" class="form-control" value="{{$slider->title_2}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Title 3 <span class="text-danger">*</span></label>
                                        <input type="text" name="title_3" class="form-control" value="{{$slider->title_3}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Description <span class="text-danger">*</span></label>
                                        <textarea type="text" name="description" class="form-control">{{$slider->description}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Status<span class="text-danger">*</span></label>
                                        <select name="status" id="" class="form-control">
                                            <option value="" selected disabled> Select Slider Status</option>
                                            <option value="Active" {{(($slider->status=='Active')? 'selected' : '')}}>Active</option>
                                            <option value="Deactivate" {{(($slider->status=='Deactivate')? 'selected' : '')}}>Deactivate</option>
                                        </select>
                                        @error ('status')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">Update Slider Image(Recommended: 1920px*1080px) <span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="image">
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
                                <h5 class="card-title">Current Slider image</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <img src="{{asset('storage/uploads/slider')}}/{{$slider->photo}}" alt="{{$slider->title_1}}">
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
