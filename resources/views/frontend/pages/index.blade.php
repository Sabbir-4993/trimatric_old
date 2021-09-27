@extends('frontend.master')
@section('title')
    Home
@endsection
@section('navbar')
    <nav class="scroll-nav scroll-init">
        <ul>
            <li><a class="scroll-link act-link" href="#sec1">Home</a></li>
            <li><a class="scroll-link" href="#sec2">About</a></li>
            <li><a class="scroll-link" href="#sec3">Services</a></li>
            <li><a class="scroll-link" href="#sec4">Projects</a></li>
            <li><a class="scroll-link" href="#sec5">Clients</a></li>
            <li><a href="{{route('portfolio')}}" class="external" target="">Portfolio</a></li>
            <li><a href="{{route('team')}}" class="external" target="">Team</a></li>
        </ul>
    </nav>
@endsection

@section('content')
    <!-- hero-wrap-->
    <div class="hero-wrap" id="sec1" data-scrollax-parent="true">
        <!-- hero-inner-->
        <!-- fullscreen-slider-wrap-->
        <div class="slider-carousel-wrap full-height fullscreen-slider-wrap">
            <div class="fullscreen-slider full-height cur_carousel-slider-container fl-wrap"
                 data-slick='{"autoplay": true, "autoplaySpeed": 5000 , "pauseOnHover": false}'>
            @foreach($sliders as $key=>$row)
                @if($row->status=='Active')
                    <!-- fullscreen-slider-item-->
                        <div class="fullscreen-slider-item full-height fl-wrap">
                            <div class="bg par-elem"
                                 data-bg="{{asset('storage/uploads/slider')}}/{{$row->photo}}"></div>
                            <div class="overlay"></div>
                            <div class="half-hero-wrap">
                                <h1>{{$row->title_1}} <br>{{$row->title_2}}<br><span> {{$row->title_3}} </span></h1>
                                <h4>{{$row->description}}</h4>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <!-- fullscreen-slider-item end-->
                    @elseif($row->status=='Deactivate')

                    @endif
                @endforeach
            </div>
            <div class="sp-cont   sp-cont-prev"><i class="fal fa-arrow-left"></i></div>
            <div class="sp-cont   sp-cont-next"><i class="fal fa-arrow-right"></i></div>
            <div class="fullscreenslider-counter"></div>
        </div>
        <!-- fullscreen-slider-wrap end-->
        <!--hero dec-->
        <div class="hero-decor-numb"><span>23.7470099  </span><span>90.4060213 </span> <a
                href="https://www.google.com/maps/place/Trimatric+Architects+%26+Engineers/@23.7470099,90.4060213,17z/data=!3m1!4b1!4m5!3m4!1s0x3755b88931a8211d:0x494f9016bdd180c9!8m2!3d23.747005!4d90.40821"
                target="_blank" class="hero-decor-numb-tooltip">Based In Bangladesh</a></div>
    </div>
    <!-- hero-wrap end-->
    <!-- Content-->
    <div class="content">
        <!-- section-->
        <section data-scrollax-parent="true" id="sec2">
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }"><span>//</span>About Us
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="details-wrap fl-wrbg par-elemap pb-50">
                            <h3>About <span>Us</span></h3>
                            <div class="clearfix"></div>
                            <p style="font-size: 14px" class="text-justify wow fadeInUp" data-wow-duration="1s"
                               data-wow-delay=".3s">
                                <b class="text-blue">TRIMATRIC Architect and Engineers</b>, established in the year
                                2007, is one of the pioneer concerns in the field of
                                creative solution providers in residential and commercial design, capable of excellent
                                imaginative ability and
                                professionalism. We bring out the hidden persona of our clients analyzing their demands
                                and choices that eventually
                                satisfy their inexpressible needs. We look forward not only to seeking business
                                opportunities but also to providing
                                innovative, unique and outstanding perspectives for the ful¬fillment of the requirements
                                of our clients.
                            </p>
                        </div>

                        <div class="row">

                            <div class="col-md-5">
                                <div class="collage-image about-slider fl-wrap">
                                    <!-- <div class="collage-image-title" data-scrollax="properties: { translateY: '150px' }" style="transform: translateZ(0px) translateY(1.36163px);">Solonick.</div> -->
                                    <div><img src="{{asset('frontend/images/mission.jpg')}}" class="respimg" alt="">
                                    </div>
                                    <div><img src="{{asset('frontend/images/vission.jpg')}}" class="respimg" alt="">
                                    </div>
                                    <div><img src="{{asset('frontend/images/philosophy.jpg')}}" class="respimg" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="fl-wrap pr-list-det wow fadeInLeft " data-wow-duration="1s"
                                     data-wow-delay=".6s">
                                    <h3 class="text-blue text-bold f16">Our Mission</h3>
                                    <p>" Our mission is to satisfy our valuable customers ensuring quality of products
                                        and service excellences at a reasonable
                                        price, respect the social norms & customs, contribute to the employment
                                        generation of the country, endeavor for
                                        constant enhancement of technical and professional skills of our people and
                                        contribute in our national economy. "</p>
                                </div>

                                <div class="fl-wrap pr-list-det wow fadeInRight" data-wow-duration="1s"
                                     data-wow-delay=".8s">
                                    <h3 class="text-blue text-bold f16">Our Vision</h3>
                                    <p>" Our vision is to nourish livable mind through heart touching unconventional
                                        design, create employment for our country
                                        people and leave a colorful & glorious ambiance for our next generation. "</p>
                                    <br>
                                </div>
                                <div class="fl-wrap pr-list-det wow fadeInUpBig" data-wow-duration="1s"
                                     data-wow-delay="1s">
                                    <h3 class="text-blue text-bold f16">Our Philosophy</h3>
                                    <p>" Innovation we create, Excellence we believe”, Inspired by this moto, TRIMATRIC
                                        is always keenly devoted to bring out the ultimate satisfaction of our
                                        customers. With vision of sophisticated designs coupled with durable technical
                                        detailing, TRIMATRIC enjoys producing Spaces ranging from small scale retail
                                        extensions to Palatial Residences and exclusively 5-star Hospitality projects.
                                        We compose sensual spaces that inspires, engages, intuitively evokes a sense of
                                        place & timeless elegance. The purpose & Nature of the architecture may vary,
                                        but these visions remain constant to our philosophy. "</p><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-parallax-module" data-position-top="90" data-position-left="25"
                 data-scrollax="properties: { translateY: '-250px' }"></div>
            <div class="bg-parallax-module" data-position-top="70" data-position-left="70"
                 data-scrollax="properties: { translateY: '150px' }"></div>
            <div class="sec-lines"></div>
        </section>
        <!-- section end-->
        <!-- section-->
        <section class="parallax-section dark-bg sec-half parallax-sec-half-right" data-scrollax-parent="true">
            <div class="bg par-elem" data-bg="{{asset('frontend/images/slider/04.jpg')}}"
                 data-scrollax="properties: { translateY: '30%' }"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="section-title wow fadeInUp">
                    <h2>Some Interisting <span>Facts </span> <br> About Us</h2>
                    <div class="horizonral-subtitle"><span>Numbers</span></div>
                </div>
                <div class="fl-wrap facts-holder">
                    <!-- inline-facts -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num text-center"><span class="count">15</span></div>
                                </div>
                            </div>
                            <h6>Years of Experience</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num text-center"><span class="count">200</span></div>
                                </div>
                            </div>
                            <h6>Team Members</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num text-center"><span class="count">450</span><span> +</span></div>
                                </div>
                            </div>
                            <h6>Satisfied Clients</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                    <!-- inline-facts  -->
                    <div class="inline-facts-wrap">
                        <div class="inline-facts">
                            <div class="milestone-counter">
                                <div class="stats animaper">
                                    <div class="num text-center"><span class="count">1000</span><span> +</span></div>
                                </div>
                            </div>
                            <h6>Projects</h6>
                        </div>
                    </div>
                    <!-- inline-facts end -->
                </div>
            </div>
        </section>
        <!-- section end-->
        <!-- section-->
        <section data-scrollax-parent="true" id="sec3">
            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }"
                 style="transform: translateZ(0px) translateY(-123.439px); font-size: 209.765px;"><span>//</span>Our
                Services
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-about fl-wrap">
                            <!-- section-title -->
                            <div class="section-title fl-wrap wow fadeIn">
                                <!-- <h3></h3> -->
                                <h2>Our <span> Services</span></h2>
                            </div>
                            <!-- features-box-container -->
                            <div class="features-box-container fl-wrap">
                                <div class="row">

                                    <!--features-box -->
                                    <div class="features-box col-md-4 wow fadeInUp" data-wow-duration="1s"
                                         data-wow-delay=".2s">
                                        <div class="time-line-icon">
                                            <i class="fal fa-paint-roller"></i>
                                        </div>
                                        <h3>Interior Design</h3>
                                        <p>We Design and Decorate spaces, through understanding - People's taste &
                                            requirements from Renovation to the Innovation, we love to transform spaces
                                            most Fashionably & Functional in every way. We are extensive solution
                                            provider for Corporate Events, Promotional Campaigns, Exhibitions, Stalls &
                                            Brand Identity Promotional services.</p>
                                    </div>
                                    <!-- features-box end  -->
                                    <!--features-box -->
                                    <div class="features-box col-md-4 wow fadeInUp" data-wow-duration="1s"
                                         data-wow-delay=".4s">
                                        <div class="time-line-icon">
                                            <i class="fal fa-brush"></i>
                                        </div>
                                        <h3>Exterior Design & Renovation</h3>
                                        <p>We Design Building's Impression as well as Renovating a Built-Structure with
                                            a Fashionable outlook while keeping the existing use fully operational &
                                            un-interrupted.</p>
                                    </div>
                                    <!-- features-box end  -->
                                    <!--features-box -->
                                    <div class="features-box col-md-4 wow fadeInUp" data-wow-duration="1s"
                                         data-wow-delay=".6s">
                                        <div class="time-line-icon">
                                            <i class="fal fa-palette"></i>
                                        </div>
                                        <h3>Design Consultancy</h3>
                                        <p>Design Consultancy is a core part of our services which we offer with our
                                            "Design Service" for our valued clients who cares about the design most.</p>
                                    </div>
                                    <!-- features-box end  -->
                                </div>
                                <div class="row">
                                    <!--features-box -->
                                    <div class="features-box col-md-4 wow fadeInUp" data-wow-duration="1s"
                                         data-wow-delay=".8s">
                                        <div class="time-line-icon">
                                            <i class="fal fa-couch"></i>
                                        </div>
                                        <h3>Custom Furniture</h3>
                                        <p>Whether you have distinct taste or a unique space that needs “a custom
                                            designed piece" our Custom Made furniture would always fit both at the -
                                            "Space" as well as in your "Heart”.</p>
                                    </div>
                                    <!-- features-box end  -->
                                    <!--features-box -->
                                    <div class="features-box col-md-4 wow fadeInUp" data-wow-duration="1s"
                                         data-wow-delay="1s">
                                        <div class="time-line-icon">
                                            <i class="fal fa-cogs"></i>
                                        </div>
                                        <h3>Turnkey Based Execution</h3>
                                        <p>Turnkey Project is a special mode of carrying out a project contract under a
                                            firm, which agrees to fully design, supervised & construct & hand over to
                                            the client when it is ready.</p>
                                    </div>
                                    <!-- features-box end  -->
                                    <!--features-box -->
                                    <div class="features-box col-md-4 wow fadeInUp" data-wow-duration="1s"
                                         data-wow-delay="1.2s">
                                        <div class="time-line-icon">
                                            <i class="fal fa-rectangle-landscape"></i>
                                        </div>
                                        <h3>Landscaping</h3>
                                        <p>Transforming space from the Chaos to Natural Wonders is the greatest scope of
                                            all works a designer could offer. We combine natural and cultural
                                            inspirations to let the space be enliven.</p>
                                    </div>
                                    <!-- features-box end  -->
                                </div>
                            </div>
                            <!-- features-box-container end  -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-parallax-module" data-position-top="90" data-position-left="25"
                 data-scrollax="properties: { translateY: '-250px' }"
                 style="transform: translateZ(0px) translateY(-123.439px); top: 90%; left: 25%;"></div>
            <div class="bg-parallax-module" data-position-top="70" data-position-left="70"
                 data-scrollax="properties: { translateY: '150px' }"
                 style="transform: translateZ(0px) translateY(74.0636px); top: 70%; left: 70%;"></div>
            <div class="sec-lines">
                <div class="container full-height">
                    <div class="line-item"></div>
                    <div class="line-item"></div>
                    <div class="line-item"></div>
                    <div class="line-item"></div>
                    <div class="line-item"></div>
                </div>
            </div>
        </section>
        <!-- section end-->

        <!--section -->
        <section class="dark-bg" id="sec4">

            <div class="fet_pr-carousel-title">
                <div class="fet_pr-carousel-title-item">
                    <h3>Featured Projects</h3>
                    <p> Some of our featured projects. Click View All to see all selected projects</p>
                    <a href="{{route('project')}}" target="_blank" class="btn float-btn flat-btn color-btn mar-top">View
                        All</a>
                </div>
            </div>
            <!--slider-carousel-wrap -->
            <div class="slider-carousel-wrap fl-wrap">
                <!--fet_pr-carousel -->
                <div class="fet_pr-carousel cur_carousel-slider-container fl-wrap">
                    <!--slick-item -->
                    @php
                        $project = \App\Project::all();
                    @endphp

                    @foreach($project as $key=>$row)
                        <div class="slick-item">
                            <div class="fet_pr-carousel-box">
                                <div class="fet_pr-carousel-box-media fl-wrap">
                                    <a href="{{route('frontend.singleProject',[$row->title])}}">
                                        <img src="{{ asset('storage/uploads/projects') }}/{{$row->cat_name}}/{{ $row->photo }}"
                                            class="respimg" alt="">
                                    </a>
                                </div>
                                <div class="fet_pr-carousel-box-text fl-wrap">
                                    <h3>
                                        <a href="{{route('frontend.singleProject',[$row->title])}}">{{$row->title}}</a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!--fet_pr-carousel end -->
                <div class="sp-cont sp-arr sp-cont-prev"><i class="fal fa-long-arrow-left"></i></div>
                <div class="sp-cont sp-arr sp-cont-next"><i class="fal fa-long-arrow-right"></i></div>
            </div>
            <!--slider-carousel-wrap end-->
            <div class="fet_pr-carousel-counter"></div>

        </section>
        <!-- section end -->

        <!--section -->
        <section data-scrollax-parent="true" id="sec5">

            <div class="section-subtitle" data-scrollax="properties: { translateY: '-250px' }">Our
                Clients<span>//</span></div>
            <div class="container">
                <div class="section-title fl-wrap">
                    <h2>Our <span>Clients</span></h2>
                    <a href="{{route('client')}}" class="btn float-btn flat-btn color-btn">Client List</a>
                </div>
            </div>
            <div class="clearfix"></div>

            <!-- client-list -->
            <div class="fl-wrap">
                <div class="container">
                    <ul class="client-list ">
                        @php
                            use App\Client;
                            $clients= Client::all();
                        @endphp

                        @foreach($clients as $key=>$row)
                            <li class=""><a href="javascript: void(0);"><img
                                        src="{{asset('storage/uploads/clients')}}/{{$row->photo}}" alt=""></a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- client-list end-->
            </div>

            <div class="sec-lines"></div>
        </section>
        <!-- section end -->
        <!-- section-->
        <section class="dark-bg2 small-padding order-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Ready To order Your Project ?</h3>
                    </div>
                    <div class="col-md-4"><a href="{{route('contact')}}" class="btn flat-btn color-btn">Get In Touch</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- section end-->
    </div>
    <!-- Content end -->
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/mhayes-twentytwenty/1.0.0/css/twentytwenty.min.css"/>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mhayes-twentytwenty/1.0.0/js/jquery.event.move.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/mhayes-twentytwenty/1.0.0/js/jquery.twentytwenty.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

    <script>

        $(document).ready(function () {
            $("#imageSlide").twentytwenty({default_offset_pct: 0.6});
            new WOW().init();
            $('.client-list').slick({
                slidesToShow: 4,
                // variableWidth: true,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2500,
                arrows: false,
                nav: false,
                responsive: [{
                    breakpoint: 1224,
                    settings: {
                        slidesToShow: 2,
                        centerMode: false,
                    }
                },

                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            centerMode: false,
                        }
                    }
                ]

            });

            $('.collage-image').slick({
                slidesToShow: 1,
                infinite: true,
                autoplay: true,
                autoplaySpeed: 2500,
                speed: 2000,
                arrows: false,
                nav: false,
                pauseOnHover: false,
                pauseOnFocus: false
            });


        });
    </script>
@endsection
