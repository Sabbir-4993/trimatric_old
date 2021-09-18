<!-- header-->
<header class="main-header">
    <a class="logo-holder" href="{{route('index')}}">
        <img src="{{asset('frontend/images/logo/logo.png')}}" alt="">
    </a>
    <!-- nav-button-wrap-->
    <div class="nav-button but-hol">
        <span  class="nos"></span>
        <span class="ncs"></span>
        <span class="nbs"></span>
        <div class="menu-button-text">Menu</div>
    </div>
    <!-- nav-button-wrap end-->
    <div class="header-social">
        <ul >
            <li><a href="https://www.facebook.com/trimatric.architects/" target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
        </ul>
    </div>
    <!--  showshare -->
    <div class="show-share showshare">
        <i class="fal fa-retweet"></i>
        <span>Social</span>
    </div>
    <!--  showshare end -->
</header>
<!--  header end -->

<!--  navigation bar -->
<div class="nav-overlay">
    <div class="tooltip color-bg">Close Menu</div>
</div>
<div class="nav-holder">
    <a class="header-logo" href="{{route('index')}}"><img src="{{asset('frontend/images/logo/logo.png')}}" alt="" class="img-responsive"></a>
    <div class="nav-title"><span>Menu</span></div>
    <div class="nav-inner-wrap">
        <nav class="nav-inner sound-nav scroll-init" id="menu">
            <ul>
                <li><a href="{{route('index')}}" class="external" target="">Home</a></li>
                <li><a href="{{route('index')}}#sec2" class="scroll-link" target="">About</a></li>
                <li><a href="{{route('index')}}#sec3" class="scroll-link" target="">Services</a></li>
                <li><a href="{{route('project')}}" class="external" target="">Project</a></li>
                <li><a href="{{route('portfolio')}}" class="external" target="">portfolio</a></li>
                <li><a href="{{route('team')}}" class="external" target="">Team</a></li>
                <li><a href="{{route('career')}}" class="external" target="">Career</a></li>
                <li><a href="{{route('client')}}" class="external" target="">Clients</a></li>
                <li><a href="{{route('contact')}}" class="external" target="">Contact Us</a></li>
            </ul>
        </nav>
    </div>
</div>
<!--  navigation bar end -->
