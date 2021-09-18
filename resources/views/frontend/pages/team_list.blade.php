@extends('frontend.master')

@section('title')
    OUR TEAM
@endsection

@section('class')
    class="single-page-wrap"
@endsection

@section('content')
    <!-- Content-->
    <div class="content">
    @include('frontend.layouts.breadcrumb')
    <!-- section-->
    <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
        <div class="bg par-elem"  data-bg="./images/contactus1920x1080.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
        <div class="overlay"></div>
        <div class="pattern-bg"></div>
        <div class="container">
            <div class="section-title">
                <h2>Our <span>Awesome</span>  <br> Team</h2>
                <p> Our awesome team is growing. We truly believe in a diverse range of creative wordsmiths to bring creative skills, ideas, and thoughts to the table.</p>
                <div class="horizonral-subtitle"><span>Our team</span></div>
            </div>
            <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i class="fal fa-long-arrow-down"></i></a>
        </div>
    </section>
    <!-- section end-->
    <!-- section end-->
    <section data-scrollax-parent="true" id="sec1">
        <div class="section-subtitle right-pos"  data-scrollax="properties: { translateY: '-250px' }"><span>//Awesome</span> Team</div>
        <div class="container">
            @php
                $teams = \App\Team::all();
            @endphp
            @foreach($teams as $key=>$row)
            <!-- team-box   -->
            <div class="team-box">
                <div class="team-photo">
                    <div class="overlay"></div>
                    <img src="{{asset('storage/uploads/teams')}}/{{$row->photo}}" alt="" class="respimg">
                </div>
                <div class="team-info">
                    <h3>{{$row->name}}</h3>
                    <h4>{{$row->designation}}</h4>
                    <h4>{{$row->department}}</h4>
                </div>
            </div>
            <!-- team-box end -->
            @endforeach


        </div>
        <div class="bg-parallax-module" data-position-top="50"  data-position-left="20" data-scrollax="properties: { translateY: '-250px' }"></div>
        <div class="bg-parallax-module" data-position-top="40"  data-position-left="70" data-scrollax="properties: { translateY: '150px' }"></div>
        <div class="bg-parallax-module" data-position-top="80"  data-position-left="80" data-scrollax="properties: { translateY: '350px' }"></div>
        <div class="bg-parallax-module" data-position-top="95"  data-position-left="40" data-scrollax="properties: { translateY: '-550px' }"></div>
        <div class="sec-lines"></div>
    </section>
    <!-- section end-->
        <!-- section -->
        <section data-scrollax-parent="true" id="sec1">
            <div class="container">
                <!-- blog-container  -->
                <div class="fl-wrap post-container">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- post -->
                            <div class="post fl-wrap fw-post">
                                <h2><a href="{{route('team')}}"><span>OUR STAFF</span></a></h2>
                                <!-- blog media -->
                                <div class="blog-media fl-wrap nomar-bottom">
                                    <img class="img responsive" src="{{asset('frontend/images/team/team 1.png')}}" alt="">
                                </div>
                                <!-- blog media end -->
                            </div>
                            <!-- post end-->

                        </div>
                        <div class="limit-box fl-wrap"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- post -->
                            <div class="post fl-wrap fw-post">
                                <h2><a href="{{route('team')}}"><span>OUR WORKFORCE</span></a></h2>
                                <!-- blog media -->
                                <div class="blog-media fl-wrap nomar-bottom">
                                    <img class="img responsive" src="{{asset('frontend/images/team/team 2.png')}}" alt="">
                                </div>
                                <!-- blog media end -->
                            </div>
                            <!-- post end-->

                        </div>
                        <div class="limit-box fl-wrap"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <!-- post -->
                            <div class="post fl-wrap fw-post">
                                <h2><a href="{{route('team')}}"><span>NO. OF EMPLOYEES</span></a></h2>
                                <!-- blog media -->
                                <div class="blog-media fl-wrap nomar-bottom">
                                    <img class="img responsive" src="{{asset('frontend/images/graph.png')}}" alt="">
                                </div>
                                <!-- blog media end -->
                            </div>
                            <!-- post end-->

                        </div>
                        <div class="limit-box fl-wrap"></div>
                    </div>

{{--                    <div class="row">--}}
{{--                        <div class="col-md-12">--}}
{{--                            <a href="" class="btn flat-btn color-btn">View Organizational Chart</a>--}}
{{--                        </div>--}}
{{--                        <div class="limit-box fl-wrap"></div>--}}
{{--                    </div>--}}
                </div>
                <!-- blog-container end    -->
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

@section('js')
    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>
@endsection

@section('css')

@endsection
