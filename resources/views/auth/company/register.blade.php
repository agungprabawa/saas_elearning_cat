<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Melkin, Booking and Reservation form Wizard by Ansonika.">
    <meta name="author" content="Ansonika">
    <title>Tugas Akhir</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset('landing_page/register_resources') }}/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset('landing_page/register_resources') }}/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset('landing_page/register_resources') }}/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset('landing_page/register_resources') }}/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset('landing_page/register_resources') }}/img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset('landing_page/register_resources') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('landing_page/register_resources') }}/css/menu.css" rel="stylesheet">
    <link href="{{ asset('landing_page/register_resources') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('landing_page/register_resources') }}/css/vendors.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('landing_page/register_resources') }}/css/custom.css" rel="stylesheet">

    <!-- MODERNIZR -->
    <script src="{{ asset('landing_page/register_resources') }}/js/modernizr.js"></script>

    <style>
        .nice-select{
            width: 100% !important;
        }
        .nice-select .list {
            width:100% !important;
        }
        .invalid-feedback{
            display: block;
        }

        .content-left-wrapper.bg_hotel:before {
            background: url('{{ asset("landing_page/register_resources") }}/img/background1.png') center center no-repeat !important;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        .content-left-wrapper .wrapper{
            background-color: transparent !important;
        }
    </style>
</head>

<body>

    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Preload -->

    <div id="loader_form">
        <div data-loader="circle-side-2"></div>
    </div><!-- /loader_form -->

    <!-- <nav>
		<ul class="cd-primary-nav">
			<li><a href="index.html" class="animated_link">Home</a></li>
			<li><a href="about-hotel.html" class="animated_link">View Rooms</a></li>
			<li><a href="contact-hotel.html" class="animated_link">Contact Us</a></li>
			<li><a href="index-2.html" class="animated_link">Restaurant Version</a></li>
			<li><a href="index-3.html" class="animated_link">Spa Version</a></li>
		</ul>
	</nav> -->
    <!-- /menu -->

    <div class="container-fluid full-height">
        <div class="row row-height">
            <div class="col-lg-6 content-left">
                <div class="content-left-wrapper bg_hotel">
                    <div class="wrapper">
                        <a href="index.html" id="logo"><img src="img/logo.svg" alt="" width="45" height="40"></a>
                        <div id="social">
                            <ul>
                                <li><a href="#0"><i class="social_facebook"></i></a></li>
                                <li><a href="#0"><i class="social_twitter"></i></a></li>
                                <li><a href="#0"><i class="social_instagram"></i></a></li>
                            </ul>
                        </div>
                        <!-- /social -->
                        <div class="left_title" style="display: none">
                            <h3>Discover a Beatiful Contest</h3>
                            <p>Rooms Starting from 70$ per night</p>
                        </div>
                    </div>
                </div>
                <!--/content-left-wrapper -->
            </div>
            <!-- /content-left -->

            <div class="col-lg-6 content-right" id="start" style="background-color: #fff">
                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                    </div>
                    <!-- /top-wizard -->
                <form id="wrapped" action="{{ route('public.auth.service.register.do') }}" method="POST">
                        <input id="website" name="website" type="text" value="">
                        <!-- Leave for security protection, read docs for details -->
                        @csrf

                        <div id="middle-wizard">
                            <div class="step">
                                <h3 class="main_question"><strong>1/3</strong>Atur keperluan</h3>
                                <div class="form-group options clearfix align-items-center">
                                    <i style="top:30px" class="pe-7s-plugin"></i><em>E-Learning ?<strong><br>{{ rupiah($srvAtributes[0]->price) }}</strong></em>
                                    <label class="switch-light switch-ios float-right">
                                        <input type="checkbox" value="1" {{ (old('attr-1') == 1) ? 'checked':'' }} name="attr-1">
                                        <span><span>No</span><span>Yes</span></span>
                                        <a></a>
                                    </label>
                                    @error('attr-1')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group options clearfix">
                                    <i style="top:30px" class="pe-7s-plugin"></i><em>Computer Assisted Test ?<strong><br>{{ rupiah($srvAtributes[1]->price) }}</strong></em>
                                    <label class="switch-light switch-ios float-right">
                                        <input type="checkbox" value="1" {{ (old('attr-2') == 1) ? 'checked':'' }} name="attr-2">
                                        <span><span>No</span><span>Yes</span></span>
                                        <a></a>
                                    </label>
                                    @error('attr-2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Pemakai <strong>{{ rupiah($srvAtributes[2]->price) }} / user</strong></label>
                                    <div class="qty-buttons">
                                        <input type="button" value="{{ old('attr-3',50) }}" class="qtyplus" name="attr-3">
                                        <input type="text" name="attr-3" id="attr-3" value="{{ old('attr-3',50) }}" class="qty form-control required" placeholder="Pemakai">
                                        <input type="button" value="-" class="qtyminus" name="attr-3">
                                    </div>
                                    @error('attr-3')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Penyimpanan <strong>{{ rupiah($srvAtributes[3]->price) }} / GB</strong></label>
                                    <div class="qty-buttons">
                                        <input type="button" value="{{ old('attr-4',5) }}" class="qtyplus1" name="attr-4">
                                        <input type="text" name="attr-4" id="attr-4" value="{{ old('attr-4',5) }}" class="qty form-control required" placeholder="Kapasitas Penyimpanan">
                                        <input type="button" value="-" class="qtyminus1" name="attr-4">
                                    </div>
                                    @error('attr-4')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /step-->

                            <div class="step">
                                <h3 class="main_question"><strong>2/3</strong>Informasi Lembaga Pendidikan</h3>
                                <div class="form-group">
                                    <input type="text" name="company_name" value="{{ old('company_name') }}" class="form-control" placeholder="Nama Lembaga">
                                    <i class="icon-user"></i>
                                    @error('company_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" name="company_address" class="form-control" placeholder="Alamat Lembaga">
                                    <i class="icon-user"></i>
                                    @error('company_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="styled-select clearfix" style="width:100%">
                                        <select class="" name="company_type">
                                            @foreach($companyType as $item)
                                                <option {{ (old('company_type') == $item->id_type) ? 'selected':'' }} value="{{ $item->id_type }}ww">{{ $item->label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('company_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- /step-->


                            <div class="submit step">
                                <h3 class="main_question"><strong>3/3</strong>Informasi Anda</h3>
                                <div class="form-group">
                                    <input value="{{ old('name') }}" type="text" name="name" class="form-control " placeholder="Nama anda">
                                    <i class="icon-user"></i>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="email" value="{{ old('email') }}" name="email" class="form-control " placeholder="Email">
                                    <i class="icon-envelope"></i>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" value="{{ old('telephone') }}" name="telephone" class="form-control" placeholder="Telephone">
                                    <i class="icon-phone"></i>
                                    @error('telephone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="row no-gutters pb-1">
                                    <div class="col-6 pr-2">
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                            <i class="pe-7s-key"></i>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6 pl-2">
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi Password">
                                            <i class="pe-7s-key"></i>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="form-group terms">--}}
{{--                                    <label class="container_check">Please accept our <a href="#" data-toggle="modal" data-target="#terms-txt">Terms and conditions</a>--}}
{{--                                        <input type="checkbox" name="terms" value="Yes" class="required">--}}
{{--                                        <span class="checkmark"></span>--}}
{{--                                    </label>--}}
{{--                                </div>--}}
                            </div>
                            <!-- /step-->

                        </div>
                        <!-- /middle-wizard -->
                        <div id="bottom-wizard">
                            <button type="button" name="backward" class="backward">Prev</button>
                            <button type="button" name="forward" class="forward">Next</button>
                            <button type="submit" name="process" class="submit">Submit</button>
                        </div>
                        <!-- /bottom-wizard -->
                    </form>
                </div>
                <!-- /Wizard container -->

                <div class="footer">
                    <ul>
{{--                        <li><a href="about-hotel.html" class="animated_link">Rooms</a></li>--}}
{{--                        <li><a href="contact-hotel.html" class="animated_link">Contact Us</a></li>--}}
{{--                        <li><a href="#0" class="animated_link" target="_parent">Buy this Template</a></li>--}}
                    </ul>
                    <em>© {{ date('Y') }} Tugas Akhir</em>
                </div>
                <!-- Footer -->
            </div>
            <!-- /content-right-->
        </div>
        <!-- /row-->
    </div>
    <!-- /container-fluid -->

    <div class="cd-overlay-nav">
        <span></span>
    </div>
    <!-- /cd-overlay-nav -->

    <div class="cd-overlay-content">
        <span></span>
    </div>
    <!-- /cd-overlay-content -->

    @if($errors->any())
        <script>
            alert('error');
        </script>
    @endif


    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('landing_page/register_resources') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('landing_page/register_resources') }}/js/common_scripts.min.js"></script>
    <script src="{{ asset('landing_page/register_resources') }}/js/velocity.min.js"></script>
    <script src="{{ asset('landing_page/register_resources') }}/js/functions.js"></script>

    <!-- Wizard script -->
    <script src="{{ asset('landing_page/register_resources') }}/js/booking_hotel_func.js"></script>

</body>

</html>
