<!DOCTYPE HTML>
<html lang="en">
<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    <meta name="description"
          content="Trimatric Architects & Engineers is one of the pioneer concerns in the field of Interior Design & Turnkey based execution service provider for Residential, Commercial, Hospitality, Retail & Corporate Clients. With proven capability of excellent imaginative ability and committed professionalism we bring out the hidden persona of our clients’ and reflect it through Designs tailored accordingly. Apart from business opportunities, we are always keenly devoted to provide innovative, unique and outstanding perspectives for the fulfillment of the requirements which satisfies our clients.">

    <meta name="keywords"
          content="Trimatric, trimatric, Trimatric Architects & Engineers, Trimatric Architects and Engineers, trimatric website, trimatric websites, Trimatric Architects, Architects, Architecture firm, firm, Architects engineering, Engineering firm, Architect engineering">

    <!-- Facebook -->
    <meta property="og:title" content="Trimatric Architects & Engineers"/>
    <meta property="og:image" content="http://trimatric.com/images/logo/logo.png')}}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://www.trimatric.com"/>
    <meta property="og:description"
          content="Trimatric Architects & Engineers is one of the pioneer concerns in the field of Interior Design & Turnkey based execution service provider for Residential, Commercial, Hospitality, Retail & Corporate Clients. With proven capability of excellent imaginative ability and committed professionalism we bring out the hidden persona of our clients’ and reflect it through Designs tailored accordingly. Apart from business opportunities, we are always keenly devoted to provide innovative, unique and outstanding perspectives for the fulfillment of the requirements which satisfies our clients."/>

    <!-- Twitter -->
    <meta name="twitter:title" content="Trimatric Architects & Engineers"/>
    <meta name="twitter:description"
          content="Trimatric Architects & Engineers is one of the pioneer concerns in the field of Interior Design & Turnkey based execution service provider for Residential, Commercial, Hospitality, Retail & Corporate Clients. With proven capability of excellent imaginative ability and committed professionalism we bring out the hidden persona of our clients’ and reflect it through Designs tailored accordingly. Apart from business opportunities, we are always keenly devoted to provide innovative, unique and outstanding perspectives for the fulfillment of the requirements which satisfies our clients."/>
    <!-- ============== title =============== -->
    <title>@yield('title') | TRIMATRIC Architects & Engineers</title>

    <!-- =============== css  =============== -->
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/plugins.css')}}">

    @yield('css')
    <!-- Latest compiled and minified CSS -->
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('frontend/css/color.css')}}">
    <!-- =============== favicons =============== -->
    <link rel="shortcut icon" href="{{asset('frontend/images/favicon.ico')}}">

</head>
<body>
<!--loader-->
<div class="loader-wrap">
    <div class="pin"></div>
</div>
<!--loader end-->
<!-- Main  -->
<div id="main">

    @include('frontend.layouts.header')

    <!-- wrapper-->
    <div id="wrapper" @yield('class')>
        <!-- scroll-nav-wrap-->
        <div class="scroll-nav-wrap fl-wrap">
            <div class="scroll-down-wrap">
                <a href="{{route('index')}}"><img src="{{asset('frontend/images/logo/logo.png')}}" alt="" class="img-responsive logo"></a>
            </div>
            @yield('navbar')
        </div>
        <!-- scroll-nav-wrap end-->
        @yield('content')
        @include('frontend.layouts.footer')
        <!-- contact-btn -->
        <a class="contact-btn color-bg" href="{{route('contact')}}"><i class="fal fa-envelope"></i><span>Get in Touch</span></a>
        <!-- contact-btn end -->
    </div>
    <!--   content end -->

    <!-- share-wrapper -->
    <div class="share-wrapper isShare">
        <div class="share-title"><span>Share</span></div>
        <div class="close-share soa"><span>Close</span><i class="fal fa-times"></i></div>
        <div class="share-inner soa">
            <div class="share-container"></div>
        </div>
    </div>
    <!-- share-wrapper end -->
</div>
<!-- Main end -->
<!--=============== scripts  ===============-->
<script type="text/javascript" src="{{asset('frontend/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/plugins.js')}}"></script>
<script type="text/javascript" src="{{asset('frontend/js/scripts.js')}}"></script>

@yield('js')
</body>
</html>
