@extends('layouts.auth.master')
@section('other-css')
    <style>
        .blured-bg {
            /* Add the blur effect
                filter: blur(8px) !important;
                -webkit-filter: blur(8px) !important;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover; */

        }

        .img-courses {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)),
            url('{{ $courses->cover_img_url }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        @media only screen and (min-width: 1025px) {
            .fixed-desktop {
                position: fixed;
                height: 100%;
                max-width: 601px !important;
            }

            .margin-right {
                margin-left: 601px !important;
            }
        }
    </style>
@endsection
@section('content')
    <!--begin::Aside-->
    <div
        class="img-courses fixed-desktop kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside sticky">
        <div class="kt-grid__item">
            <a href="#" class="kt-login__logo">

                <img style="max-height: 100px" src="{{ $company->logo_url }}" alt="">
                {{-- <img src="" alt=""> --}}
            </a>
        </div>
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
            <div class="kt-grid__item kt-grid__item--middle">
                <h3 class="kt-login__title">Welcome to <br> {{ $company->company_name }}!</h3>
                <h4 class="kt-login__subtitle">{{ $company->descriptions }}</h4>
            </div>
        </div>
        <div class="kt-grid__item">
            <div class="kt-login__info">
                <div class="kt-login__copyright">
                    &copy 2018 Metronic
                </div>
                <div class="kt-login__menu">
                    <a href="#" class="kt-link">Privacy</a>
                    <a href="#" class="kt-link">Legal</a>
                    <a href="#" class="kt-link">Contact</a>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Aside-->
    <div style="clear:both"></div>

    <!--begin::Content-->
    <div
        class="margin-right kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

        <!--begin::Head-->
        <div class="kt-login__head" style="display:none">
            <span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;
            <a href="#" class="kt-link kt-login__signup-link">Sign Up!</a>
        </div>

        <!--end::Head-->

        <!--begin::Body-->
        <form class="kt-login__body">

            <!--begin::Signin-->
            <div class="kt-login__form">
                <div class="kt-login__title">
                    <h3>{{ $courses->title }}</h3>
                </div>

                <!--begin::Form-->
                <div class="kt-form" action="" novalidate="novalidate" id="kt_login_form">
                    <label><strong>@lang('courses.tab-1-f-3')</strong></label>
                    <div>
                        {!! $courses->descriptions !!}
                    </div>
                </div>
                <!--end::Form-->

                <!--begin::Divider-->
                <div class="kt-login__divider">
                    <div class="kt-divider">
                        <span></span>

                        <span></span>
                    </div>
                </div>

                <!--end::Divider-->

                <!--begin::Options-->
            @if($company->service_status == 0)
                @guest
                    <div class="kt-login__options">
                            <?php
                            $display = 'block';
                            if ($company->allow_external_register == 0) {
                                $display = 'none';
                            }
                            ?>

                            <a href="{{ route('student.auth.login',$company->uuid) }}" class="btn btn-primary kt-btn">

                                Login
                            </a>
                            <a href="{{ route('student.auth.register',$company->uuid) }}" style="display:{{ $display }}"
                               class="btn btn-info kt-btn">

                                Register
                            </a>
                        </div>
                @else
                    <div class="kt-login__options">
                        @if($courses->participants->groupBy('id_participant')->count() < $courses->max_users || $courses->is_unlimited_users == 1)
                            {{ $courses->participants->groupBy('id_participant')->count() }}
                            @if($isFree == false)
                                <button style="width:100%" id="join_btn_pay" class="btn btn-success kt-btn">
                                    {{-- <i class="fab fa-facebook-f"></i> --}}
                                    <strong>@lang('courses.join-btn-1')
                                        Rp. {{ number_format($courses->courses_price,0,',','.') }}</strong>
                                </button>
                            @else
                                <button style="width:100%" id="join_btn" class="btn btn-success kt-btn">
                                    {{-- <i class="fab fa-facebook-f"></i> --}}
                                    <strong>@lang('courses.join-btn-2')</strong>
                                </button>
                            @endif
                        @else
                            <button type="button" class="btn btn-warning" style="width: 100%">
                                <strong>
                                    Kursus ini sudah mencapai quota maksimal user
                                </strong>
                            </button>

                        @endif
                    </div>
                @endguest
            @else
                <div class="alert alert-danger" role="alert">
                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                    <div class="alert-text">Layanan ini sedang dinonaktifkan, fitur bergabung sementara dinonaktifkan</div>
                </div>
            @endif


            <!--end::Options-->
            </div>

            <!--end::Signin-->
        </form>

        <!--end::Body-->
    </div>

    <!--end::Content-->
@endsection
@section('other-script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        var btn = $('#join_btn');
        var btn_pay = $('#join_btn_pay');

        btn.on('click', function (e) {
            e.preventDefault();

            // See: src\js\framework\base\app.js
            KTApp.progress(btn);
            KTApp.block($('#form-wrapper'));
            var update_url = '{{ route("student.learning.join.do",":uuid") }}';
            update_url = update_url.replace(":uuid", "{{ $courses->uuid }}");

            $('.invalid-feedback').html('').text();
            $.ajax({
                url: update_url,
                method: 'POST',
                data: $('#kt_form').serialize(),
                success: function (response) {
                    console.log(response);
                    if ($.isEmptyObject(response.error)) {
                        swal.fire({
                            "title": "@lang('general.msg-success-title')",
                            "html": "@lang('courses.join-content')",
                            "type": "success",
                            "confirmButtonClass": "btn btn-primary",
                            cancelButtonClass: "btn btn-secondary",
                            allowOutsideClick: false,
                            confirmButtonText: "@lang('courses.join-success-btn')",
                        }).then((result) => {
                            if (result.value) {
                                // var next_loc = "{{ route('srv_admin.courses.manage',':uuid') }}"
                                // next_loc = next_loc.replace(":uuid", response.uuid);
                                // window.location.replace(next_loc);
                                location.reload(true);
                            }
                        });
                    } else {
                        KTApp.unprogress(btn);
                        swal.fire({
                            "title": "@lang('courses.join-private-title')",
                            "html": "@lang('courses.join-private-content')",
                            "type": "warning",
                            "confirmButtonClass": "btn btn-secondary",
                            confirmButtonText: "@lang('courses.join-private-btn')",
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // var err = eval("(" + xhr.responseText + ")");
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);

                    swal.fire({
                        "title": "@lang('general.msg-error-title')",
                        "html": "@lang('general.msg-error-content')",
                        "type": "error",
                        "confirmButtonClass": "btn btn-secondary",
                        confirmButtonText: "@lang('general.msg-error-reload-btn')",
                    }).then((result) => {
                        if (result.value) {
                            location.reload(true);
                        }
                    });

                }
            });

        });

        btn_pay.on('click', function (e) {
            e.preventDefault();

            // See: src\js\framework\base\app.js
            KTApp.progress(btn_pay);
            KTApp.block($('#form-wrapper'));
            var update_url = '{{ route("student.learning.join.do",":uuid") }}';
            update_url = update_url.replace(":uuid", "{{ $courses->uuid }}");

            $('.invalid-feedback').html('').text();
            $.ajax({
                url: update_url,
                method: 'POST',
                data: $('#kt_form').serialize(),
                success: function (response) {
                    console.log(response);
                    if ($.isEmptyObject(response.error)) {
                        window.location.replace(response.invoice_url)
                    } else {
                        KTApp.unprogress(btn);
                        swal.fire({
                            "title": "@lang('general.msg-error-title')",
                            "html": "@lang('general.msg-error-content')",
                            "type": "error",
                            "confirmButtonClass": "btn btn-secondary",
                            confirmButtonText: "@lang('general.msg-error-reload-btn')",
                        }).then((result) => {
                            if (result.value) {
                                location.reload(true);
                            }
                        });
                    }
                },
                error: function (xhr, status, error) {
                    // var err = eval("(" + xhr.responseText + ")");
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);

                    swal.fire({
                        "title": "@lang('general.msg-error-title')",
                        "html": "@lang('general.msg-error-content')",
                        "type": "error",
                        "confirmButtonClass": "btn btn-secondary",
                        confirmButtonText: "@lang('general.msg-error-reload-btn')",
                    }).then((result) => {
                        if (result.value) {
                            location.reload(true);
                        }
                    });

                }
            });

        });
    </script>
@endsection
