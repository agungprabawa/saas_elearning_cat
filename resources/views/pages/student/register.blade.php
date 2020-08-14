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
        url("{{ asset('/') }}admin_res/media/bg/bg-4.jpg");
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
<div class="img-courses kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside"
    >
    <div class="kt-grid__item">
        <a href="#" class="kt-login__logo">
            <img src="{{ asset('/') }}admin_res/media/logos/logo-4.png">
        </a>
    </div>
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
        <div class="kt-grid__item kt-grid__item--middle">
{{--            {{ session()->get('last-url') }}--}}
            <h3 class="kt-login__title">Welcome to <br>{{ $company->company_name }}</h3>
            <h4 class="kt-login__subtitle">The ultimate Bootstrap & Angular 6 admin theme framework for next generation
                web apps.</h4>
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

<!--begin::Content-->
<div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

    <!--begin::Head-->
    <div class="kt-login__head">
        <span class="kt-login__signup-label">@lang('auth.lb-login-1')</span>&nbsp;&nbsp;
        <a id="regis" href="{{ route('student.auth.login',$company->uuid) }}" class="kt-link kt-login__signup-link">@lang('auth.lb-login')</a>
    </div>

    <!--end::Head-->

    <!--begin::Body-->
    <div class="kt-login__body">

        <!--begin::Signin-->
        <div class="kt-login__form">
{{--            {{ dd($company->subscribtions()[2]->size) }}--}}
            <div class="kt-login__title">
                @if($company->allow_external_register == 1)
                <h3 style="text-align:center">@lang('auth.lb-register')</h3>
                @else
                <h3 style="text-align:center">@lang('auth.msg-reg-not-allowed-title')</h3>
                @endif
            </div>
            @if($company->allow_external_register == 1)
            <!--begin::Form-->
                @if($company->usersCount() < $company->subscribtions()[2]->size )
                    <form id="kt_form" class="kt-form" action="" novalidate="novalidate">
                @csrf
                <div class="form-group">
                    <label for="" style="text-align: center;">@lang('auth.msg-login')</label>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Nama" name="name" autocomplete="off">
                            <div class="invalid-feedback" style="display:block; font-size:14px"></div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Username" name="username" autocomplete="off">
                            <div class="invalid-feedback" style="display:block; font-size:14px"></div>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="E-mail" name="email" autocomplete="off">
                    <div class="invalid-feedback" style="display:block; font-size:14px"></div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Password" name="password"
                        autocomplete="off">
                    <div class="invalid-feedback" style="display:block; font-size:14px"></div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Re-Password" name="password_confirmation"
                        autocomplete="off">
                    <div class="invalid-feedback" style="display:block; font-size:14px"></div>
                </div>


                <!--begin::Action-->
                <div class="kt-login__actions">
                    <button id="btn_submit" style="margin:0 auto" class="btn btn-primary btn-elevate kt-login__btn-primary">@lang('auth.btn-register')</button>
                </div>

                <!--end::Action-->
            </form>
                @else
                    <div class="kt-form">
                        <div class="form-group">
                            <label for="" style="text-align:center">
                                Jumlah user pada layanan ini telah memenuhi kuota maksimal
                            </label>
                        </div>
                    </div>
                @endif
            <!--end::Form-->
            @else

            <div class="kt-form">
                <div class="form-group">
                    <label for="" style="text-align:center">
                        @lang('auth.msg-reg-not-allowed')
                    </label>
                </div>
            </div>
            @endif
        </div>

        <!--end::Signin-->
    </div>

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


    var btn = $('#btn_submit');


    btn.on('click', function(e) {
        e.preventDefault();

        // See: src\js\framework\base\app.js
        KTApp.progress(btn);
        KTApp.block($('#form_wrappers'));
        var update_url = '{{ route("student.auth.do.register",":uuid") }}';
        update_url = update_url.replace(":uuid","{{ $company->uuid }}")

        // See: http://malsup.com/jquery/form/#ajaxSubmit

        $('.invalid-feedback').html('').text();
        $.ajax({
            url: update_url,
            method: 'POST',
            data: $('#kt_form').serialize(),
            success: function(response) {
                console.log(response);
                if ($.isEmptyObject(response.error)) {

                    swal.fire({
                        "title": "@lang('general.msg-success-title')",
                        "html": "@lang('general.msg-success-content')",
                        "type": "success",
                        "confirmButtonClass": "btn btn-primary",
                        cancelButtonClass: "btn btn-secondary",
                        showCancelButton: false,
                        allowOutsideClick: false,
                        confirmButtonText: "@lang('auth.btn-continue')",
                    }).then((result) => {
                        if (result.value) {
                            window.location.replace(response.next);
                        }
                    });
                } else {
                    KTApp.unprogress(btn);
                    KTApp.unblock($('#form_wrappers'));

                    console.log(response);
                    var error_data = {};

                    for (let [key, value] of Object.entries(response.error)) {
                        error_data[key] = value;


                        // $('<div class="invalid-feedback" style="display:block; font-size:14px">'+value.toString().replace(key,'Informasi ')+'</div>').insertAfter($('input[name="'+ key +'"]'));

                        $('input[name="' + key + '"]').siblings('.invalid-feedback').text(value.toString().replace(key, 'Informasi '));
                    }
                    swal.fire({
                        "title": "@lang('courses.msg-error-title')",
                        "html": "@lang('courses.msg-error-content')",
                        "type": "warning",
                        "confirmButtonClass": "btn btn-secondary"
                    });

                }
            },
            error: function(xhr, status, error) {
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
