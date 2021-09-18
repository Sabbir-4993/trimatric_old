@extends('backend.layouts.master')
@section('title')
    Circular - Update | Trimatric
@endsection
@section('circular_list')
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
                        <h3 class="page-title">Circular</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Circular Update</li>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Update Circular</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('backend-circular.update',[$circular->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="col-xl-12">
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Job Status:<span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select" name="status" required="">
                                                    <option disabled>-- Select Job Status --</option>
                                                    <option value="Active" {{(($circular->status == 'Active')? 'selected' : '')}}>Active</option>
                                                    <option value="DeActive" {{(($circular->status == 'DeActive')? 'selected' : '')}}>Deactivate</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Job Title<span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="title" class="form-control" placeholder="Enter Job Title" required="" value="{{$circular->title}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Vacancy<span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="vacancy" class="form-control" placeholder="Enter Vacancy Number" required="" value="{{$circular->vacancy}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Workplace<span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="workplace" class="form-control" placeholder="Job Location" required="" value="{{$circular->workplace}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Deadline<span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="date" name="date" class="form-control" required="" value="{{$circular->date}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Salary<span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <input type="text" name="salary" class="form-control" placeholder="Enter Salary" required="" value="{{$circular->salary}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Job Type:<span class="text-danger">*</span></label>
                                            <div class="col-md-9">
                                                <select class="form-control select" name="type" required="">
                                                    <option disabled selected>-- Select Job Type --</option>
                                                    <option value="Full Time" {{(($circular->type == 'Full Time')? 'selected' : '')}}>Full Time</option>
                                                    <option value="Part Time" {{(($circular->type == 'Part Time')? 'selected' : '')}}>Part Time</option>
                                                    <option value="Contractual" {{(($circular->type == 'Contractual')? 'selected' : '')}}>Contractual</option>
                                                    <option value="Intern" {{(($circular->type == 'Intern')? 'selected' : '')}}>Intern</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label">Job Details<span class="text-danger">*</span></label>
                                            <div class="col-lg-9">
                                                <textarea class="form-control" name="details" id="details" cols="5" rows="3" placeholder="Job Context Details">{{$circular->details}}</textarea>
                                            </div>
                                        </div>
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- /Page Wrapper -->
@endsection


@section('js')
    <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>

    <script>
        // Replace the <textarea id="editor1"> with a CKEditor 4
        // instance, using default configuration.
        CKEDITOR.replace( 'details' );
    </script>
@endsection

@section('')

@endsection
