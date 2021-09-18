@extends('frontend.master')

@section('title')
    PROJECT
@endsection

@section('class')
    class="single-page-wrap"
@endsection

@section('content')
    <!-- Content-->
    <div class="content">
        <div class="single-page-decor"></div>
        <div class="fsp-filter">
            <div class="filter-title"><i class="fal fa-filter"></i><span>Project Filter</span></div>
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
        <section class="no-padding dark-bg">
            <!-- portfolio start -->
            <div class="gallery-items min-pad four-column vis-box-det">
                <!-- gallery-item-->
                @foreach($projects as $key=>$row)
                <div class="gallery-item {{$row->cat_name}}">
                    <div class="grid-item-holder">
                    <a href="{{route('frontend.singleProject',[$row->title])}}">
                        <a href="{{route('frontend.singleProject',[$row->title])}}"/>
                        <img  src="{{asset('storage/uploads/projects')}}/{{$row->cat_name}}/{{$row->photo}}" alt="{{$row->title}}">
                        <div class="box-item hd-box">
                            <div class=" fl-wrap full-height">
                                <div class="hd-box-wrap">
                                    <h2><a href="{{route('frontend.singleProject',[$row->title])}}">{{$row->title}}</a></h2>
                                    <p><a href="#">{{$row->cat_name}}</a></p>
                                </div>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                @endforeach
                <!-- gallery-item end-->
            </div>
            <!-- portfolio end -->
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
