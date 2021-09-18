@extends('backend.layouts.master')
@section('title')
    Social Settings
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
                            <li class="breadcrumb-item active">Site Settings</li>
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
                                <a href="{{route('social')}}" class="nav-link active">
                                    <i class="fas fa-link"></i> <span>Social Media</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('add-user.index')}}" class="nav-link">
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
                            <h5 class="card-title">Social Media information</h5>
                        </div>
                        <div class="card-body">
                            <!-- Form -->
                            <form action="" >
                                <div class="row form-group">
                                    <label for="name" class="col-sm-3 col-form-label input-label">Facebook</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook URL">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="email" class="col-sm-3 col-form-label input-label">Instagram</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="instagram" class="form-control" id="instagram" placeholder="Instagram URL">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="phone" class="col-sm-3 col-form-label input-label">YouTube</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="youtube" id="YouTube" placeholder="YouTube URL">
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
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


