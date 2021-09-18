@extends('backend.layouts.master')
@section('title')
    Team - Update | Trimatric
@endsection
@section('team')
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
                        <h3 class="page-title">Team</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Team Update</li>
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
                                <h5 class="card-title">Update Team</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('team_member.list.update',[$team->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="">Department<span class="text-danger">*</span></label>
                                        <select name="department" id="" class="form-control">
                                            <option value="" selected disabled> Select Department</option>
                                            <option value="Key Management Personal" {{(($team->department=='Key Management Personal')? 'selected' : '')}}>Key Management Personal</option>
                                            <option value="Architectural Team" {{(($team->department=='Architectural Team')? 'selected' : '')}}>Architectural Team</option>
                                            <option value="Structural Engineering" {{(($team->department=='Structural Engineering')? 'selected' : '')}}>Structural Engineering</option>
                                            <option value="Estimation Budgeting" {{(($team->department=='Estimation Budgeting')? 'selected' : '')}}>Estimation Budgeting</option>
                                            <option value="Procurement" {{(($team->department=='Procurement')? 'selected' : '')}}>Procurement Department</option>
                                            <option value="Accounts" {{(($team->department=='Accounts')? 'selected' : '')}}>Accounts Department</option>
                                            <option value="Hr" {{(($team->department=='Hr')? 'selected' : '')}}>Hr Department</option>
                                            <option value="IT & Branding" {{(($team->department=='IT & Branding')? 'selected' : '')}}>IT & Branding</option>
                                            <option value="Engr. Department" {{(($team->department=='Engr. Department')? 'selected' : '')}}>Engr. Department</option>
                                            <option value="Project Management" {{(($team->department=='Project Management')? 'selected' : '')}}>Project Management Department</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Name<span class="text-danger">*</span></label>
                                        <input class="form-control " type="text" name="name" rows="4" value="{{$team->name}}" />
                                    </div>

                                    <div class="form-group">
                                        <label for="">Designation<span class="text-danger">*</span></label>
                                        <input class="form-control " type="text" name="designation" rows="4" value="{{$team->designation}}" />
                                    </div>

                                    <div class="form-group">
                                        <label for="">Photo(Recommended: 800px*530px)<span class="text-danger">*</span></label>
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
                                <h5 class="card-title">{{$team->name}} image</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <img src="{{asset('storage/uploads/teams')}}/{{$team->photo}}" alt="{{$team->name}}" style="height: 250px; width: 250px">
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
