@extends('backend.layouts.master')
@section('title')
    Add User
@endsection
@section('site')
    active
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Add User</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Add User</li>
                        </ul>

                    </div>
                </div>
            </div>
            <div id="message">
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-xl-3 col-md-4">
                    <!-- Settings Menu -->
                    <div class="widget settings-menu">
                        <ul>
                            <li class="nav-item">
                                <a href="{{route('settings')}}" class="nav-link">
                                    <i class="fas fa-sliders-h"></i> <span>Website Settings</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('social')}}" class="nav-link">
                                    <i class="fas fa-link"></i> <span>Social Media</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('add-user.index')}}" class="nav-link active">
                                    <i class="fas fa-user-plus"></i> <span>Add User</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('password')}}" class="nav-link">
                                    <i class="fas fa-unlock-alt"></i> <span>Change Password</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- /Settings Menu -->
                </div>

                <div class="col-xl-9 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Add User</h5>
                        </div>
                        <div class="card-body">
                            <!-- Form -->
                            <form action="" >
                                <div class="row form-group">
                                    <label for="name" class="col-sm-3 col-form-label input-label">User Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" id="name" class="form-control-file form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="name" class="col-sm-3 col-form-label input-label">User Email</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="email" id="email" class="form-control-file form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="email" class="col-sm-3 col-form-label input-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="password" class="form-control" id="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="phone" class="col-sm-3 col-form-label input-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="password" id="password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Add User</button>
                                </div>
                            </form>
                            <!-- /Form -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Usr List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Created at</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user as $key=>$row)
                                        <tr>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->created_at->diffForHumans()}}</td>
                                            <td class="float-right">
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-basic">
                                                    <span data-feather="eye"></span>
                                                </button>

                                                <a href="#" type="button" class="btn btn-secondary">
                                                    <span data-feather="edit"></span>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection


