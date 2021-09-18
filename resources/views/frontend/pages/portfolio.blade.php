@extends('frontend.master')

@section('title')
    PORTFOLIO
@endsection

@section('class')
    class="single-page-wrap"
@endsection

@section('content')
    <!-- Content-->
    <div class="content">
        <div class="single-page-decor"></div>
        <div class="single-page-fixed-row">
            <div class="scroll-down-wrap">
                <div class="mousey">
                    <div class="scroller"></div>
                </div>
                <span>Scroll Down</span>
            </div>
        </div>
        <!-- section-->
        <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
            <div class="bg par-elem"  data-bg="images/bg/1.jpg" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="pattern-bg"></div>
            <div class="container">
                <div class="section-title">
                    <h2>Our <span>realized</span>  <br> and future projects</h2>
                    <p> If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. </p>
                    <div class="horizonral-subtitle"><span>PROJECTS</span></div>
                </div>
                <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i class="fal fa-long-arrow-down"></i></a>
            </div>
        </section>
        <!-- section end-->
        <!-- section-->
        <section data-scrollax-parent="true" id="sec1">
            <div class="section-subtitle"  data-scrollax="properties: { translateY: '150px' }" >Portfolio<span>//</span></div>
            <div class="content">
                <!-- filter -->
                <div class="filter-holder inline-filter fl-wrap  mar-bottom">
                    <div class="filter-button"><i class="fal fa-filter"></i> <span>Filter : </span></div>
                    <div class="gallery-filters">
                        <a href="#" class="gallery-filter  gallery-filter-active" data-filter="*">All</a>
                        <a href="#" class="gallery-filter " data-filter=".Corporate">Corporate</a>
                        <a href="#" class="gallery-filter " data-filter=".Industrial">Industrial</a>
                        <a href="#" class="gallery-filter " data-filter=".Architectural">Architectural</a>
                        <a href="#" class="gallery-filter " data-filter=".GovernmentProject">Government Project</a>
                        <a href="#" class="gallery-filter " data-filter=".Hospitality">Hospitality</a>
                        <a href="#" class="gallery-filter " data-filter=".Residential">Residential</a>
                        <a href="#" class="gallery-filter " data-filter=".Educational">Educational</a>
                        <a href="#" class="gallery-filter " data-filter=".Religious">Religious</a>
                        <a href="#" class="gallery-filter " data-filter=".FB">F & B</a>
                    </div>
                    <div class="folio-counter">
                        <div class="num-album"></div>
                        <div class="all-album"></div>
                    </div>
                </div>
                <!-- filter end-->
                <!-- portfolio start -->
                <div class="gallery-items spad  hde three-column">
                @foreach( $portfolios as $key=>$row)
                    @php
                        $projects = \App\Project::where('id',$row->project_id)->first();
                    @endphp
                    <!-- gallery-item-->
                    <div class="gallery-item {{$row->cat_name}}">
                        <div class="grid-item-holder">
                            <a href="{{asset('storage/uploads/portfolio')}}/{{$projects->cat_name}}/{{$projects->title}}/{{$row->photo}}" data-fancybox="gallery">
                            <img  src="{{asset('storage/uploads/portfolio')}}/{{$projects->cat_name}}/{{$projects->title}}/{{$row->photo}}" alt="{{$row->cat_name}}">
                            </a>
                        </div>
                    </div>
                    <!-- gallery-item end-->
                    @endforeach
                </div>
                <!-- portfolio end -->
            </div>
            <div class="sec-lines"></div>
        </section>
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
