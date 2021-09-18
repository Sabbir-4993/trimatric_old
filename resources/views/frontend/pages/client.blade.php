@extends('frontend.master')

@section('title')
    CLIENT
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
                <a href="{{route('index')}}">
                    <img src="{{asset('frontend/mages/logo/logo.png')}}')}}" alt="" class="img-responsive logo">
                </a>
            </div>
            <a href="{{route('index')}}" class="single-page-fixed-row-link"><i class="fal fa-arrow-left"></i> <span>Back to home</span></a>
        </div>
        <!-- section-->
        <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
            <div class="bg par-elem" data-bg="{{asset('frontend/images/cover/client-bg.png')}}" data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="pattern-bg"></div>
            <div class="container">
                <div class="section-title">
                    <h2>Our <span>most</span> valuable  <br> clients</h2>
                    <p>One of the deep secrets of life is that all that is really worth doing is what we do for others. </p>
                    <div class="horizonral-subtitle"><span>Clients</span></div>
                </div>
                <a href="#sec1" class="custom-scroll-link hero-start-link"><span>Let's Start</span> <i class="fal fa-long-arrow-down"></i></a>
            </div>
        </section>
        <!-- section end-->
        <!-- section -->
        <section data-scrollax-parent="true" id="sec1">
            <div class="section-subtitle"  data-scrollax="properties: { translateY: '150px' }" >Clients<span>//</span></div>
            <div class="container">
                <!-- portfolio start -->
                <div class="gallery-items spad four-column">
                    @foreach($clients as $key=>$row)
                        <!-- gallery-item-->
                        <div class="gallery-item ">
                            <div class="grid-item-holder">
                                <img  src="{{asset('storage/uploads/clients')}}/{{$row->photo}}" style="height: 200px; width: 200px;" alt="{{$row->title}}" data-toggle="popover" title="Popover title" data-content="Default popover">
                            </div>
                        </div>
                        <!-- gallery-item end-->
                    @endforeach
                </div>`
                <!-- portfolio end -->
                <!-- preview-sound-->
                <audio id="preview-sound" src="/"></audio>
                <!-- preview-sound end-->
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

@endsection

@section('js')

@endsection

