@extends('backend.layouts.master')
@section('title')
    Change Password
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
                        <h3 class="page-title">Site Settings</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
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
                                <a href="{{route('social')}}" class="nav-link ">
                                    <i class="fas fa-link"></i> <span>Social Media</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('add-user.index')}}" class="nav-link">
                                    <i class="fas fa-user-plus"></i> <span>Add User</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('password')}}" class="nav-link active">
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
                            <h5 class="card-title">Update Password</h5>
                        </div>
                        <div class="card-body">
                            <!-- Form -->
                            <form action="" >
                                <div class="row form-group">
                                    <label for="name" class="col-sm-3 col-form-label input-label">Current Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Current Password">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="email" class="col-sm-3 col-form-label input-label">Update Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="password" class="form-control" id="password" placeholder="New Password">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="phone" class="col-sm-3 col-form-label input-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="password" id="password" placeholder="Confirm Password">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                            <!-- /Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')

@endsection


