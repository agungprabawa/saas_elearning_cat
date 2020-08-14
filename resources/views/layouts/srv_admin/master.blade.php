<!DOCTYPE html>

<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>
		<base href="">
		<meta charset="utf-8" />
		<title>Tugas Akhir | E-Learning & Computer Assisted Test</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		@include('layouts.srv_admin.head')

	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body id="body_page" class="kt-page-content-white kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->

		<!-- begin:: Header Mobile -->
		<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
			<div class="kt-header-mobile__logo">
				<a href="index.html">
					<img alt="Logo" src="{{ asset('/') }}admin_res/media/logos/logo-11-sm.png" />
				</a>
			</div>
			<div class="kt-header-mobile__toolbar">
				<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
				<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
			</div>
		</div>
        <!-- end:: Header Mobile -->

		<div id="app" class="kt-grid kt-grid--hor kt-grid--root">
			<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

					{{-- @include('layouts.srv_admin.header') --}}
					@include('layouts.student.header')

					<!-- end:: Header -->

					<div class="kt-body kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-grid--stretch" id="kt_body">
						<div class="kt-container  kt-container--fluid  kt-grid kt-grid--ver">

							@include('layouts.srv_admin.asidenav')
							<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                                @if(auth()->user()->company->service_status != 0)
                                <div class="alert alert-danger fade show" role="alert" style="margin-top: 30px; margin-left: 30px; margin-right: 60px">
                                    <div class="alert-icon"><i class="flaticon-danger"></i></div>
                                    <div class="alert-text">Layanan ini sedang dinonaktifkan, beberapa fitur tidak akan muncul atau tidak dapat digunakan</div>
                                </div>
                                @endif
                                @if(auth()->user()->company->subscribe_until == null || auth()->user()->company->subscribe_until < \Carbon\Carbon::now())
                                    <div class="alert alert-danger fade show" role="alert" style="margin-top: 30px; margin-left: 30px; margin-right: 60px">
                                        <div class="alert-icon"><i class="flaticon-danger"></i></div>
                                        <div class="alert-text">Harap melakukan pembayaran untuk dapat menggunakan layanan ini kembali</div>
                                    </div>
                                @endif
								@yield('content')
							</div>
						</div>
					</div>

					@include('layouts.srv_admin.footer')
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<div id="app">

		</div>

		<!-- begin::Scrolltop -->
		<div id="kt_scrolltop" class="kt-scrolltop">
			<i class="fa fa-arrow-up"></i>
		</div>

		<!-- end::Scrolltop -->

		@include('layouts.srv_admin.footer-script')

	</body>

	<!-- end::Body -->
</html>
