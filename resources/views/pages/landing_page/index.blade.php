<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Binmp - Responsive HTML 5 template</title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('landing_page/resources_1') }}/img/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('landing_page/resources_1') }}/img/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('landing_page/resources_1') }}/img/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('landing_page/resources_1') }}/img/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('landing_page/resources_1') }}/img/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('landing_page/resources_1') }}/img/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('landing_page/resources_1') }}/img/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('landing_page/resources_1') }}/img/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('landing_page/resources_1') }}/img/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('landing_page/resources_1') }}/img/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('landing_page/resources_1') }}/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('landing_page/resources_1') }}/img/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('landing_page/resources_1') }}/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="{{ asset('landing_page/resources_1') }}/img/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- revolution slider css -->
    <link href="{{ asset('landing_page/resources_1') }}/plugins/revolution/css/settings.css" rel="stylesheet">
    <link href="{{ asset('landing_page/resources_1') }}/plugins/revolution/css/layers.css" rel="stylesheet">
    <link href="{{ asset('landing_page/resources_1') }}/plugins/revolution/css/navigation.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('landing_page/resources_1') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('landing_page/resources_1') }}/css/responsive.css">
</head>
<body>

<div class="preloader"><div class="spinner"></div></div> <!-- /.preloader -->



<header class="header header-home-one">
    <nav class="navbar navbar-default header-navigation stricky">
        <div class="thm-container clearfix">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navigation" aria-expanded="false"> 
                    <i class="fas fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html">
                    <img src="{{ asset('landing_page/resources_1') }}/img/logo-1-1.png" alt="Awesome Image"/>
                </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse main-navigation mainmenu " id="main-nav-bar">
                
                <ul class="nav navbar-nav navigation-box">
                    <li class="current"> 
                        <a href="index.html">Home</a> 
                        <ul class="sub-menu">
                            <li><a href="index.html">Home One</a></li>
                            <li><a href="index2.html">Home Two</a></li>
                            <li><a href="index3.html">Home Three</a></li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li> <a href="about.html">About Us</a> </li>
                   
                    <li> 
                        <a href="blog.html">Blog</a> 
                        <ul class="sub-menu right-align">
                            <li><a href="blog.html">Blog Classic</a></li>
                            <li><a href="blog-details.html">Blog Details</a></li>
                        </ul><!-- /.sub-menu -->
                    </li>
                    <li> <a href="contact.html">Contact</a> </li>
                    @if(Auth::check())
                    <li><a href="{{ route('login') }}">Dashboard</a> </li>
                    @else
                    <li><a href="{{ route('public.auth.service.register.index') }}">Register</a> </li>
                    <li><a href="{{ route('login') }}">Login</a> </li>
                    @endif
                </ul>                
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>   
</header><!-- /.header -->


<!--Main Slider-->
<section class="main-slider">
    <div class="rev_slider_wrapper fullwidthbanner-container"  id="rev_slider_one_wrapper" data-source="gallery">
        <div class="rev_slider fullwidthabanner" id="rev_slider_one" data-version="5.4.1">
            <ul>
                <!-- thrid slider                 -->
                <li data-description="Slide Description" data-easein="default" data-easeout="default" data-fsmasterspeed="1500" data-fsslotamount="7" data-fstransition="fade" data-hideafterloop="0" data-hideslideonmobile="off" data-index="rs-1685" data-masterspeed="default" data-param1="" data-param10="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-rotate="0" data-saveperformance="off" data-slotamount="default" data-transition="fade">
                    
                    <img alt="" class="rev-slidebg" data-bgfit="cover" data-bgparallax="10" data-bgposition="bottom center" data-bgrepeat="no-repeat" data-no-retina="" src="{{ asset('landing_page/resources_1') }}/img/slider/slider-three/slider-3-bg.jpg"> 

                    <div class="tp-caption  hidden-xs" 
                    id="slide-46-layer-1" 
                    data-x="['right','right','right','right']" data-hoffset="['375','375','150','375']" 
                    data-y="['top','top','top','top']" data-voffset="['84','84','115','84']" 
                    data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing_page/resources_1') }}/img/slider/slider-three/top-man-face.png"  data-ww="['139px','139px','90px','139px']" data-hh="['162px','160px','100px','160px']" width="1180" height="727" alt="awesome image"> </div>

                    <div class="tp-caption  hidden-xs" 
                    id="slide-46-layer-2" 
                    data-x="['right','right','right','right']" data-hoffset="['365','365','141','365']" 
                    data-y="['top','top','top','top']" data-voffset="['179','179','174','179']" 
                    data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1000,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 34;"><img src="{{ asset('landing_page/resources_1') }}/img/slider/slider-three/top-man-hand.png" alt="a"  data-ww="['140px','140px','90px','140px']" data-hh="['171px','171px','100px','171px']" width="1180" height="727" data-no-retina> </div>

                    <div class="tp-caption  " 
                    id="slide-46-layer-3" 
                    data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']" 
                    data-y="['bottom','bottom','bottom','bottom']" data-voffset="['90','60','60','60']" 
                    data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":900,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing_page/resources_1') }}/img/slider/slider-three/moc-1.jpg" alt="a"  data-ww="['842px','750px','500px','300px']" data-hh="['600px','500px','350px','250px']" width="1180" height="727"> </div>

                    <div class="tp-caption  " 
                     id="slide-46-layer-4" 
                     data-x="['right','right','right','right']" data-hoffset="['0','0','0','0']" 
                     data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1100,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing_page/resources_1') }}/img/slider/slider-three/man-1.png" alt="a" data-ww="['344px','320px','220px','190px']" data-hh="['504px','480px','300px','280px']" width="151" height="266" data-no-retina> </div>

                    <div class="tp-caption  " 
                    id="slide-46-layer-5" 
                    data-x="['center','center','center','center']" data-hoffset="['130','30','30','30']" 
                    data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" 
                    data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1200,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 33;"><img src="{{ asset('landing_page/resources_1') }}/img/slider/slider-three/woman.png" alt="a" data-ww="['247px','230px','190px','150px']" data-hh="['477px','430px','380px','250px']" width="151" height="266" data-no-retina> </div>

                    <div class="tp-caption  " 
                     id="slide-46-layer-6" 
                     data-x="['center','center','center','center']" data-hoffset="['-50','-100','-100','-100']" 
                     data-y="['bottom','bottom','bottom','bottom']" data-voffset="['90','65','50','50']" 
                                data-width="none"
                    data-height="none"
                    data-whitespace="nowrap"
         
                    data-type="image" 
                    data-basealign="slide" 
                    data-responsive_offset="off" 
                    data-responsive="off"
                    data-frames='[{"delay":1300,"speed":1000,"frame":"0","from":"x:-50px;opacity:0;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;","ease":"Power3.easeInOut"}]'
                    data-textAlign="['inherit','inherit','inherit','inherit']"
                    data-paddingtop="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"

                    style="z-index: 30;"><img src="{{ asset('landing_page/resources_1') }}/img/slider/slider-three/tree.png" alt="a" data-ww="['670px','600px','500px','180px']" data-hh="['285px','240px','220px','100px']" width="151" height="266" data-no-retina> </div>


                    <div class="tp-caption"
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['650','750','700','420']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['-120','-100','-115','-115']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                    style="z-index: 35; white-space: nowrap;">
                        <h2>Great app that makes <br /> your business easier</h2>
                    </div>
                    
                    <div class="tp-caption" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['550','500','450','420']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['40','50','25','15']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                    style="z-index: 35; white-space: nowrap;">
                        <div class="text">Excepteur sint occaecat cupidatat non proident sunt in culpa qui officia deserunt mollit lorem ipsum anim id est laborum perspiciatis unde.</div>
                    </div>
                    
                    <div class="tp-caption tp-resizeme" 
                    data-paddingbottom="[0,0,0,0]"
                    data-paddingleft="[0,0,0,0]"
                    data-paddingright="[0,0,0,0]"
                    data-paddingtop="[0,0,0,0]"
                    data-responsive_offset="on"
                    data-type="text"
                    data-height="none"
                    data-width="['550','600','650','420']"
                    data-whitespace="normal"
                    data-hoffset="['0','0','0','0']"
                    data-voffset="['155','160','120','120']"
                    data-x="['left','left','left','left']"
                    data-y="['middle','middle','middle','middle']"
                    data-textalign="['top','top','top','top']"
                    data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","speed":1500,"to":"o:1;","delay":1000,"ease":"Power3.easeInOut"},{"delay":"wait","speed":1000,"to":"auto:auto;","mask":"x:0;y:0;s:inherit;e:inherit;","ease":"Power3.easeInOut"}]'
                    style="z-index: 35; white-space: nowrap;">
                        <a href="#" class="banner-btn">Learn More</a>
                    </div>
                
                </li>
                
            </ul>
        </div>
    </div>
</section>
<!--End Main Slider-->

<section class="feature-style-three">
    <div class="thm-container">
        <div class="title">
            <h3>Binmp is the only app <br /> you’ll need</h3>
        </div><!-- /.title -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-feature-style-three js-tilt">
                    <i class="binmp-icon-human-resources"></i>
                    <h3>Safe & Secure</h3>
                    <p>Lorem ipsum is dolor sit amet con sectetur.</p>
                </div><!-- /.single-feature-style-three -->
            </div><!-- /.col-md-3 col-sm-6 col-xs-12 -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-feature-style-three js-tilt">
                    <i class="binmp-icon-setting"></i>
                    <h3>Quick Settings</h3>
                    <p>Lorem ipsum is dolor sit amet con sectetur.</p>
                </div><!-- /.single-feature-style-three -->
            </div><!-- /.col-md-3 col-sm-6 col-xs-12 -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-feature-style-three js-tilt">
                    <i class="binmp-icon-options"></i>
                    <h3>Minimal Design</h3>
                    <p>Lorem ipsum is dolor sit amet con sectetur.</p>
                </div><!-- /.single-feature-style-three -->
            </div><!-- /.col-md-3 col-sm-6 col-xs-12 -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="single-feature-style-three js-tilt">
                    <i class="binmp-icon-setting-1"></i>
                    <h3>User Friendly</h3>
                    <p>Lorem ipsum is dolor sit amet con sectetur.</p>
                </div><!-- /.single-feature-style-three -->
            </div><!-- /.col-md-3 col-sm-6 col-xs-12 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.feature-style-three -->

<section class="img-box-style-one bg-style-two">
    <div class="thm-container">
        <div class="row">
            <div class="col-md-6">
                <div class="text-box">
                    <h3>Binmp app is an Inspiring leadership innovation.</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form injected humour lorem ipsum is simply free text in the.</p>
                    <a href="#" class="img-box-btn">Explore Now</a>
                </div><!-- /.text-box -->
                <div class="img-box">
                    <img src="{{ asset('landing_page/resources_1') }}/img/img-box-1-1.png" alt="Awesome Image"/>
                </div><!-- /.img-box -->
            </div><!-- /.col-md-6 -->
            <div class="col-md-6">
                <div class="img-box">
                    <img src="{{ asset('landing_page/resources_1') }}/img/img-box-1-2.png" alt="Awesome Image"/>
                </div><!-- /.img-box -->
                <div class="text-box">
                    <h3>Binmp app is an Inspiring leadership innovation.</h3>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form injected humour lorem ipsum is simply free text in the.</p>
                    <a href="#" class="img-box-btn">Explore Now</a>
                </div><!-- /.text-box -->
            </div><!-- /.col-md-6 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.img-box-style-one -->

<section class="testimonials-style-two">
    <div class="thm-container">
        <div class="title">
            <h3>What users are saying <br /> about binmp</h3>
        </div><!-- /.title -->
        <div class="testimonials-carousel-style-two owl-theme owl-carousel">
            <div class="item">
                <div class="single-testimonials-style-two">
                    <img class="testi-icon" src="{{ asset('landing_page/resources_1') }}/img/testi-icon-2-1.png" alt="Awesome Image"/>
                    <p>There are many variations of passages of available but the majority have suffer alteration in some form by inject humour or random words which don't look even slightly they will believe you.</p>
                    <div class="name-box">
                        <div class="img-box">
                            <img src="{{ asset('landing_page/resources_1') }}/img/testi-2-1.png" alt="Awesome Image"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <h3>Vada Craig</h3>
                        </div><!-- /.text-box -->
                    </div><!-- /.name-box -->
                </div><!-- /.single-testimonials-style-two -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-testimonials-style-two">
                    <img class="testi-icon" src="{{ asset('landing_page/resources_1') }}/img/testi-icon-2-1.png" alt="Awesome Image"/>
                    <p>There are many variations of passages of available but the majority have suffer alteration in some form by inject humour or random words which don't look even slightly they will believe you.</p>
                    <div class="name-box">
                        <div class="img-box">
                            <img src="{{ asset('landing_page/resources_1') }}/img/testi-2-2.png" alt="Awesome Image"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <h3>Christy Deutsch</h3>
                        </div><!-- /.text-box -->
                    </div><!-- /.name-box -->
                </div><!-- /.single-testimonials-style-two -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-testimonials-style-two">
                    <img class="testi-icon" src="{{ asset('landing_page/resources_1') }}/img/testi-icon-2-1.png" alt="Awesome Image"/>
                    <p>There are many variations of passages of available but the majority have suffer alteration in some form by inject humour or random words which don't look even slightly they will believe you.</p>
                    <div class="name-box">
                        <div class="img-box">
                            <img src="{{ asset('landing_page/resources_1') }}/img/testi-2-3.png" alt="Awesome Image"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <h3>Trang Piluso</h3>
                        </div><!-- /.text-box -->
                    </div><!-- /.name-box -->
                </div><!-- /.single-testimonials-style-two -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-testimonials-style-two">
                    <img class="testi-icon" src="{{ asset('landing_page/resources_1') }}/img/testi-icon-2-1.png" alt="Awesome Image"/>
                    <p>There are many variations of passages of available but the majority have suffer alteration in some form by inject humour or random words which don't look even slightly they will believe you.</p>
                    <div class="name-box">
                        <div class="img-box">
                            <img src="{{ asset('landing_page/resources_1') }}/img/testi-2-1.png" alt="Awesome Image"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <h3>Kera Plainy</h3>
                        </div><!-- /.text-box -->
                    </div><!-- /.name-box -->
                </div><!-- /.single-testimonials-style-two -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-testimonials-style-two">
                    <img class="testi-icon" src="{{ asset('landing_page/resources_1') }}/img/testi-icon-2-1.png" alt="Awesome Image"/>
                    <p>There are many variations of passages of available but the majority have suffer alteration in some form by inject humour or random words which don't look even slightly they will believe you.</p>
                    <div class="name-box">
                        <div class="img-box">
                            <img src="{{ asset('landing_page/resources_1') }}/img/testi-2-2.png" alt="Awesome Image"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <h3>Jutta Jentzsch</h3>
                        </div><!-- /.text-box -->
                    </div><!-- /.name-box -->
                </div><!-- /.single-testimonials-style-two -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-testimonials-style-two">
                    <img class="testi-icon" src="{{ asset('landing_page/resources_1') }}/img/testi-icon-2-1.png" alt="Awesome Image"/>
                    <p>There are many variations of passages of available but the majority have suffer alteration in some form by inject humour or random words which don't look even slightly they will believe you.</p>
                    <div class="name-box">
                        <div class="img-box">
                            <img src="{{ asset('landing_page/resources_1') }}/img/testi-2-3.png" alt="Awesome Image"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <h3>Martha Follick</h3>
                        </div><!-- /.text-box -->
                    </div><!-- /.name-box -->
                </div><!-- /.single-testimonials-style-two -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-testimonials-style-two">
                    <img class="testi-icon" src="{{ asset('landing_page/resources_1') }}/img/testi-icon-2-1.png" alt="Awesome Image"/>
                    <p>There are many variations of passages of available but the majority have suffer alteration in some form by inject humour or random words which don't look even slightly they will believe you.</p>
                    <div class="name-box">
                        <div class="img-box">
                            <img src="{{ asset('landing_page/resources_1') }}/img/testi-2-1.png" alt="Awesome Image"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <h3>Ardella Gaughan</h3>
                        </div><!-- /.text-box -->
                    </div><!-- /.name-box -->
                </div><!-- /.single-testimonials-style-two -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-testimonials-style-two">
                    <img class="testi-icon" src="{{ asset('landing_page/resources_1') }}/img/testi-icon-2-1.png" alt="Awesome Image"/>
                    <p>There are many variations of passages of available but the majority have suffer alteration in some form by inject humour or random words which don't look even slightly they will believe you.</p>
                    <div class="name-box">
                        <div class="img-box">
                            <img src="{{ asset('landing_page/resources_1') }}/img/testi-2-2.png" alt="Awesome Image"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <h3>Hong Coore</h3>
                        </div><!-- /.text-box -->
                    </div><!-- /.name-box -->
                </div><!-- /.single-testimonials-style-two -->
            </div><!-- /.item -->
            <div class="item">
                <div class="single-testimonials-style-two">
                    <img class="testi-icon" src="{{ asset('landing_page/resources_1') }}/img/testi-icon-2-1.png" alt="Awesome Image"/>
                    <p>There are many variations of passages of available but the majority have suffer alteration in some form by inject humour or random words which don't look even slightly they will believe you.</p>
                    <div class="name-box">
                        <div class="img-box">
                            <img src="{{ asset('landing_page/resources_1') }}/img/testi-2-3.png" alt="Awesome Image"/>
                        </div><!-- /.img-box -->
                        <div class="text-box">
                            <h3>Rosalina Austgen</h3>
                        </div><!-- /.text-box -->
                    </div><!-- /.name-box -->
                </div><!-- /.single-testimonials-style-two -->
            </div><!-- /.item -->
        </div><!-- /.testimonials-carousel-style-two -->
    </div><!-- /.thm-container -->
</section><!-- /.testimonials-style-one -->

<section class="app-screenshot-style-two bg-style-two">
    <div class="thm-container">
        <div class="title">
            <h3>Checkout beautiful design <br /> and user interface</h3>
        </div><!-- /.title -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <img src="{{ asset('landing_page/resources_1') }}/img/screen-shot-2-1.jpg" alt="Awesome Image"/>
                <img src="{{ asset('landing_page/resources_1') }}/img/screen-shot-2-2.jpg" alt="Awesome Image"/>
            </div><!-- /.col-md-3 -->
            <div class="col-md-6 col-sm-6 col-xs-12 text-center">
                <img src="{{ asset('landing_page/resources_1') }}/img/screen-shot-2-5.jpg" alt="Awesome Image"/>
            </div><!-- /.col-md-3 -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <img src="{{ asset('landing_page/resources_1') }}/img/screen-shot-2-3.jpg" alt="Awesome Image"/>
                <img src="{{ asset('landing_page/resources_1') }}/img/screen-shot-2-4.jpg" alt="Awesome Image"/>
            </div><!-- /.col-md-3 -->
        </div><!-- /.row -->
    </div><!-- /.thm-container -->
</section><!-- /.app-screenshot-style-two -->

<section class="call-to-action-one">
    <div class="thm-container text-center">
        <h3>Download our app today & <br /> experience endless possibilities.</h3>
        <p>and get started with a free 1 month trial for your business</p>
        <div class="btn-box">
            <a href="#" class="cta-btn style-one">
                <i class="fab fa-apple"></i><!--
                --><span class="text">
                    <span class="tag-line">Download on</span>
                    <span class="name">App Store</span>
                </span>
            </a><!--
            --><a href="#" class="cta-btn style-two">
                <i class="fa fa-play"></i><!--
                --><span class="text">
                    <span class="tag-line">Download on</span>
                    <span class="name">Google Play</span>
                </span>
            </a>
        </div><!-- /.btn-box -->
    </div><!-- /.thm-container -->
</section><!-- /.call-to-action-one -->


<div class="footer-top">
    <div class="thm-container clearfix">
        <div class="logo pull-left">
            <a href="index.html"><img src="{{ asset('landing_page/resources_1') }}/img/logo-1-1.png" alt="Awesome Image"/></a>
        </div><!-- /.logo pull-left -->
        <div class="social pull-right">
            <a href="#" class="fab fa-twitter"></a><!--
            --><a href="#" class="fab fa-facebook-f"></a><!--
            --><a href="#" class="fab fa-instagram"></a><!--
            --><a href="#" class="fab fa-google-plus-g"></a>
        </div><!-- /.social pull-right -->
    </div><!-- /.thm-container clearfix -->
</div><!-- /.footer-top -->
<div class="footer-bottom text-center">
    <div class="thm-container">
        <p>&copy; copyright 2018 by Layerdrops.com</p>
    </div><!-- /.thm-container -->    
</div><!-- /.footer-bottom -->

<div class="search_area zoom-anim-dialog mfp-hide" id="test-search">
    <div class="search_box_inner">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-default" type="button"><i class="fas fa-search"></i></button>
            </span>
        </div>
    </div>
</div>

<div class="scroll-to-top scroll-to-target" data-target="html"><i class="fa fa-angle-up"></i></div>                    

<script src="{{ asset('landing_page/resources_1') }}/js/jquery.js"></script>

<script src="{{ asset('landing_page/resources_1') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/js/bootstrap-select.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/js/jquery.validate.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/js/owl.carousel.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/js/isotope.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/js/jquery.magnific-popup.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/js/waypoints.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/js/jquery.counterup.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/js/wow.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/js/jquery.easing.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/js/tilt.jquery.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/js/custom.js"></script>
<!--Revolution Slider-->
<script src="{{ asset('landing_page/resources_1') }}/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/plugins/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/plugins/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/plugins/revolution/js/extensions/revolution.extension.migration.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="{{ asset('landing_page/resources_1') }}/js/main-slider-script.js"></script>

</body>
</html>