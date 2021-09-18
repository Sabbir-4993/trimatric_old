@extends('backend.layouts.master')
@section('title')
    Site Settings
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
                                <a href="{{route('settings')}}" class="nav-link active">
                                    <i class="fas fa-sliders-h"></i> <span>Website Settings</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('social')}}" class="nav-link">
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
                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="col-xl-9 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Website Settings</h5>
                        </div>
                        <div class="card-body">
                            <!-- Form -->
                            @php
                                $site = \App\Settings::all();
                            @endphp
                            <form action="{{route('settings_update')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row form-group">
                                    <label for="name" class="col-sm-3 col-form-label input-label">Company Logo</label>
                                    <div class="col-sm-9">
                                        <div class="d-flex align-items-center">
                                            <label class="img-thumbnail m-0" style="height: 100%; width: 100%" for="edit_img">
                                                <img id="" class="img" src="{{asset('storage/uploads/logo/logo2.png')}}" alt="Company Image">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="name" class="col-sm-3 col-form-label input-label">Company Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" placeholder="Company Name" value="Trimatric Architects & Engineers">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="email" class="col-sm-3 col-form-label input-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" placeholder="Email" value="info@trimatric.com">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="phone" class="col-sm-3 col-form-label input-label">Mobile / Telephone</label>
                                    <div class="col-sm-9">
                                        <div class="mb-3">
                                            <input type="text" name="phone1" class="form-control" id="phone" placeholder="" value="+8802-48321385">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" name="phone2" class="form-control" id="phone" placeholder="(optional)" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <label for="addressline1" class="col-sm-3 col-form-label input-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Company address" value="125 Mezonet Building, Ramna Century Avenue, Boro Moghbazar, 125 Ramna Century Ave, Dhaka 1217">
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


