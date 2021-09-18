@extends('frontend.master')

@section('title')
    {{$projects->title}}
@endsection

@section('class')
    class="single-page-wrap"
@endsection

@section('content')
    <!-- Content-->
    <div class="content">
        <div class="single-page-decor"></div>
        @include('frontend.layouts.breadcrumb')
        <!-- section  -->
        <section class="no-padding dark-bg sinsec-dec">
            <div class="single-project-title fl-wrap">
                <h2><span class="caption">{{$projects->title}}</span></h2>
            </div>
            <!-- show-case-slider-wrap-->
            <div class="show-case-slider-wrap slider-carousel-wrap">
                <div class="sp-cont sarr-contr sp-cont-prev"><i class="fal fa-arrow-left"></i></div>
                <div class="sp-cont sarr-contr sp-cont-next"><i class="fal fa-arrow-right"></i></div>
                <div class="show-case-slider cur_carousel-slider-container lightgallery fl-wrap full-height" data-slick='{"centerMode": false}'>
                    <!-- show-case-item -->
                    <div class="show-case-item" data-curtext="{{$projects->title}}">
                        <div class="show-case-wrapper fl-wrap full-height">
                            <a href="{{asset('storage/uploads/projects')}}/{{$projects->cat_name}}/{{$projects->photo}}" data-fancybox="gallery">
                            <img src="{{asset('storage/uploads/projects')}}/{{$projects->photo}}" alt="">
                            </a>
                            <div class="show-info">
                                <span>Info</span>
                                <div class="tooltip-info">
                                    <h5>{{$projects->title}}</h5>
                                    <p>{{$projects->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @php
                    $portfolio = \App\Portfolio::where('project_id', $projects->id)->get();
                @endphp
                @foreach($portfolio as $pro)
                    <!-- show-case-item -->
                    <div class="show-case-item" data-curtext="{{$projects->title}}">
                        <div class="show-case-wrapper fl-wrap full-height">
                            <a href="{{asset('storage/uploads/portfolio')}}/{{$projects->cat_name}}/{{$projects->title}}/{{$pro->photo}}" data-fancybox="gallery">
                                <img  src="{{asset('storage/uploads/portfolio')}}/{{$projects->cat_name}}/{{$projects->title}}/{{$pro->photo}}" alt="{{$pro->cat_name}}">
                            </a>
                        </div>
                    </div>
                @endforeach
                <!-- show-case-item end-->
                </div>
                <div class="fet_pr-carousel-counter show-case-slider-counter"></div>
            </div>
            <!-- show-case-slider-wrap end-->
            <div class="half-bg-dec single-half-bg-dec" data-ran="12"></div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end-->
        <!-- section-->
        <section data-scrollax-parent="true">
            <div class="section-subtitle right-pos"  data-scrollax="properties: { translateY: '-250px' }"><span>//</span>{{$projects->title}}</div>
            <div class="container">
                <!-- det box-->
                <div class="fl-wrap">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="fixed-column l-wrap">
                                <div class="pr-title fl-wrap">
                                    <h3>Project Details</h3>
                                        <span>{{$projects->description}}</span>
                                </div>
                                <div class="ci-num"><span>01.</span></div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="details-wrap fl-wrap">
                                <h3>Project Name: <span>{{$projects->title}}</span></h3>
                                <div class="parallax-header"><span>Category : </span><a href="#">{{$projects->cat_name}}</a></div>
{{--                                <div class="clearfix"></div>--}}
{{--                                <h4>{{$projects->title}}</h4>--}}
{{--                                <p>--}}
{{--                                    {{$projects->description}}--}}
{{--                                </p>--}}
                            </div>
                            <div class="pr-list fl-wrap">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul>
                                            <li><span>DATE :</span> {{$projects->project_start}} </li>
                                            <li><span>SECTOR :</span> {{$projects->cat_name}} </li>
                                            <li><span>CLIENT :</span> {{$projects->title}} </li>
                                            <li><span>STATUS :</span> {{$projects->status}} </li>
                                            <li><span>LOCATION : </span>  <a href="#" target="_blank"> {{$projects->project_address}}  </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="limit-box fl-wrap"></div>
                </div>
                <!-- det box end-->
                <div class="content-nav mar-top">
                    <ul>
                        @php
                            use App\Project;
                            $prev_id = $projects->id-1;
                            $pro_pre = Project::where('id', $prev_id)->first();

                            $next_id = $projects->id+1;
                            $pro_next = Project::where('id', $next_id)->first();
                        @endphp
                        @if($pro_pre != null)
                        <li>
                            <a href="{{route('frontend.singleProject',[$pro_pre->title])}}" class="ln">
                                <i class="fal fa-arrow-left"></i>
                                <span class="tooltip">Prev - {{$pro_pre->title}}</span>
                            </a>
                        </li>
                        @else

                        @endif

                        <li>
                            <a href="{{route('project')}}" class="cur-page">
                                <span>All Projects</span>
                            </a>
                        </li>

                        @if($pro_next != null)
                        <li>
                            <a href="{{route('frontend.singleProject',[$pro_next->title])}}" class="rn">
                                <i class="fal fa-arrow-right"></i>
                                <span class="tooltip">Next - {{$pro_next->title}}</span>
                            </a>
                        </li>
                        @else
                            <li>
                                <a href="{{route('frontend.singleProject',[$projects->title])}}" class="rn">
                                    <i class="fal fa-arrow-up"></i>
                                    <span class="tooltip">Current - {{$projects->title}}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="bg-parallax-module" data-position-top="50"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
            <div class="bg-parallax-module" data-position-top="40"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
            <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
            <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end-->
        <!-- section-->
        <section class="dark-bg2 small-padding order-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Ready To order Your Project ?</h3>
                    </div>
                    <div class="col-md-4"><a href="{{route('contact')}}" class="btn flat-btn color-btn">Get In Touch</a> </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
    <!-- Content end -->
@endsection

@section('css')
    <link rel="stylesheet" href="{{asset('frontend/css/jquery.fancybox.min.css')}}" />
@endsection

@section('js')
    <script src="{{asset('frontend/js/jquery.fancybox.min.js')}}"></script>
@endsection
