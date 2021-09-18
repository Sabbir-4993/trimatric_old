@extends('backend.layouts.master')
@section('title')
    Dashboard
@endsection
@section('dashboard')
    active
@endsection

@section('content')

    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Dashboard</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                        </ul>

                    </div>
                </div>
            </div>
             <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('backend-project.index')}}" class="small-box-footer">

                            <div class="dash-widget-header">
										<span class="dash-widget-icon bg-1">
											<i class="fas fa-dollar-sign"></i>
										</span>
                                @php
                                    $project = count(\App\Project::all());
                                @endphp
                                <div class="dash-count">
                                    <div class="dash-title">Total Project</div>
                                    <div class="dash-counts">
                                        <p>{{$project}}</p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('backend-contact.index')}}" class="small-box-footer">

                            <div class="dash-widget-header">
                                <span class="dash-widget-icon bg-2">
                                    <i class="fas fa-users"></i>
                                </span>
                                @php
                                    $contact = count(\App\Contact::all());
                                @endphp
                                <div class="dash-count">
                                    <div class="dash-title">Message</div>
                                    <div class="dash-counts">
                                        <p>{{$contact}}</p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('slider.index')}}" class="small-box-footer">
                                @php
                                    $slider = count(\App\Slider::all());
                                @endphp
                            <div class="dash-widget-header">
										<span class="dash-widget-icon bg-3">
											<i class="fas fa-file-alt"></i>
										</span>
                                <div class="dash-count">
                                    <div class="dash-title">Sliders</div>
                                    <div class="dash-counts">
                                        <p>{{$slider}}</p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('backend-portfolio.index')}}" class="small-box-footer">
                            <div class="dash-widget-header">
										<span class="dash-widget-icon bg-4">
											<i class="far fa-file"></i>
										</span>
                                <div class="dash-count">
                                    @php
                                        $portfolio = count(\App\Portfolio::all());
                                    @endphp
                                    <div class="dash-title">Portfolio</div>
                                    <div class="dash-counts">
                                        <p>{{$portfolio}}</p>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
             <!-- /.row -->
            </div>
    </div>

@endsection
@section('scripts')

@endsection
