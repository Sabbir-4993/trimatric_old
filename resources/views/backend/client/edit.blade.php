@extends('backend.layouts.master')
@section('title')
    Client - Update | Trimatric
@endsection
@section('client')
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
                        <h3 class="page-title">Client</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Client Update</li>
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
                                <h5 class="card-title">Update Client Information</h5>
                            </div>
                            <div class="card-body">
                                <form action="{{route('backend-client.update',[$client->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="">Client Name<span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="title" value="{{$client->title}}"></input>

                                    </div>
                                    <div class="form-group">
                                        <label for="">Client Link / URL<span class="text-secondary">(optional)</span></label>
                                        <input class="form-control" type="text" name="link" rows="8" value="{{$client->link}}"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Client Logo Size(Recommended: 300*300 px)<span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="photo"></input>
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
                                <h5 class="card-title">Current Client Logo</h5>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <img src="{{asset('storage/uploads/clients')}}/{{$client->photo}}" alt="" style="height: 300px; width: 300px">
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
