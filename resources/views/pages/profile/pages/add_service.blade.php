<?php
$strViewBlade = '';
if (auth()->user()->active_status == 1 || auth()->user()->active_status == 2) {
    $strViewBlade = 'layouts.srv_admin.master';
} else {
    $strViewBlade = 'layouts.student.master';
}
?>
@extends($strViewBlade)
@section('css')
<!--begin::Page Custom Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/css/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css" />

<!--end::Page Custom Styles -->
@endsection
@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Penambahan Layanan </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs kt-hidden">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Pages </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Wizard </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Wizard 2 </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
        <div class="kt-subheader__toolbar kt-hidden">
            <div class="kt-subheader__wrapper">
                <a href="#" class="btn kt-subheader__btn-primary">
                    Actions &nbsp;

                    <!--<i class="flaticon2-calendar-1"></i>-->
                </a>
                <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="left">
                    <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z" fill="#000000" />
                            </g>
                        </svg>

                        <!--<i class="flaticon2-plus"></i>-->
                    </a>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

                        <!--begin::Nav-->
                        <ul class="kt-nav">
                            <li class="kt-nav__head">
                                Add anything or jump to:
                                <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
                            </li>
                            <li class="kt-nav__separator"></li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-drop"></i>
                                    <span class="kt-nav__link-text">Order</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                    <span class="kt-nav__link-text">Ticket</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                                    <span class="kt-nav__link-text">Goal</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                    <span class="kt-nav__link-text">Support Case</span>
                                    <span class="kt-nav__link-badge">
                                        <span class="kt-badge kt-badge--success">5</span>
                                    </span>
                                </a>
                            </li>
                            <li class="kt-nav__separator"></li>
                            <li class="kt-nav__foot">
                                <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
                            </li>
                        </ul>

                        <!--end::Nav-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            <div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2" data-ktwizard-state="step-first">
                <div class="kt-grid__item kt-wizard-v2__aside">

                    <!--begin: Form Wizard Nav -->
                    <div class="kt-wizard-v2__nav">

                        <!--doc: Remove "kt-wizard-v2__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
                        <div class="kt-wizard-v2__nav-items kt-wizard-v2__nav-items--clickable">
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="flaticon-globe"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label-title">
                                            Informasi Umum
                                        </div>
                                        <div class="kt-wizard-v2__nav-label-desc">
                                            Informasi umum layanan baru
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="fal fa-cubes"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label-title">
                                            Konfigurasi Paket
                                        </div>
                                        <div class="kt-wizard-v2__nav-label-desc">
                                            Konfigurasi paket layanan
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
                                <div class="kt-wizard-v2__nav-body">
                                    <div class="kt-wizard-v2__nav-icon">
                                        <i class="fal fa-info-square"></i>
                                    </div>
                                    <div class="kt-wizard-v2__nav-label">
                                        <div class="kt-wizard-v2__nav-label-title">
                                            Lainnya
                                        </div>
                                        <div class="kt-wizard-v2__nav-label-desc">
                                            Konfigurasi lainnya, opsional
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--end: Form Wizard Nav -->
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">

                    <!--begin: Form Wizard Form-->
                    <form method="POST" class="kt-form" id="kt_form" style="width: 100%">

                        <!--begin: Form Wizard Step 1-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                            <div class="kt-heading kt-heading--md">Informasi Umum Layanan</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    <div class="form-group">
                                        <label>Nama Layanan</label>
                                        <input type="text" name="company_name" class="form-control" name="fname" placeholder="" value="">
                                        <span class="form-text text-muted"></span>
                                        <div id="err_company_name" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('settings.fm-info-category')
                                            <button type="button"
                                                    class="btn btn-light btn-secondary btn-circle btn-sm btn-icon"
                                                    data-toggle="kt-popover" data-trigger="focus"
                                                    title="@lang('general.ket')" data-html="true"
                                                    data-content="@lang('settings.po-1')">
                                                <i class="fal fa-question-circle"></i>
                                            </button>
                                        </label>
                                        <select class="form-control kt-select2" id="kt_select2_4"
                                                name="company_type">
                                            <option></option>
                                            <optgroup label="Lembaga Pendidikan Formal">
                                                <option value="1">
                                                    Pendidikan Dasar
                                                </option>
                                                <option value="2">
                                                    Pendidikan Menengah
                                                </option>
                                                <option value="3">
                                                    Pendidikan Tinggi
                                                </option>
                                            </optgroup>
                                            <optgroup label="Lembaga Nonformal">
                                                <option value="4">
                                                    Lembaga Kursus
                                                </option>
                                                <option value="5">
                                                    Lembaga Pelatihan
                                                </option>
                                            </optgroup>
                                            <optgroup label="Lainnya">
                                                <option value="0">
                                                    Lainnya
                                                </option>
                                            </optgroup>
                                        </select>
                                        {{--                                 <span class="form-text text-muted">Please enter your last name.</span>--}}
                                        <div id="err_company_type" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('settings.fm-info-descriptions')</label>
                                        <textarea style="height: 130px" name="descriptions" id="" cols="20" rows="10"
                                                  class="form-control"></textarea>
                                        <div class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="form-group">
                                                <label>@lang('settings.fm-logo')</label>
                                                <div class="custom-file">
                                                    <input type="file" name="logo" class="custom-file-input"
                                                           id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose
                                                        file</label>
                                                </div>
                                                <div id="err_logo" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 1-->
                        <!--begin: Form Wizard Step 1-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                            <div class="kt-heading kt-heading--md">Konfigurasi Paket</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__form">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label class="kt-option">
                                                <span class="kt-option__control">
                                                    <span class="kt-radio">
                                                        <input type="checkbox" name="elearning" value="1" checked>
                                                        <span></span>
                                                    </span>
                                                </span>
                                                <span class="kt-option__label">
                                                    <span class="kt-option__head">
                                                        <span class="kt-option__title">
                                                            E-Learning
                                                        </span>
                                                        <span class="kt-option__focus">
                                                           Rp. &nbsp; {{ number_format($attibutes[0]->price,0,',','.') }}
                                                        </span>
                                                    </span>
                                                    <span class="kt-option__body">
                                                        {{ $attibutes[0]->desciptions }}
                                                    </span>
                                                </span>
                                            </label>
                                            <div id="err_elearning" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="kt-option">
                                                <span class="kt-option__control">
                                                    <span class="kt-radio">
                                                        <input type="checkbox" name="assistedtest" value="1" checked>
                                                        <span></span>
                                                    </span>
                                                </span>
                                                <span class="kt-option__label">
                                                    <span class="kt-option__head">
                                                        <span class="kt-option__title">
                                                            Assisted Test
                                                        </span>
                                                        <span class="kt-option__focus">
                                                            Rp. &nbsp; {{ number_format($attibutes[1]->price,0,',','.') }}
                                                        </span>
                                                    </span>
                                                    <span class="kt-option__body">
                                                        {{ $attibutes[1]->desciptions }}
                                                    </span>
                                                </span>
                                            </label>
                                            <div id="err_assistedtest" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                        </div>
                                    </div>
                                    <div style="margin-top:10px"></div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kapasitas User</label>
                                                <input id="kt_touchspin_user" type="text" class="form-control" value="0" name="user_capacity" placeholder="" type="text">
                                                
                                                <div id="err_user_capacity" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kapasitas Penyimpanan</label>
                                                <input id="kt_touchspin_storage" type="text" class="form-control" value="0" name="storage_capacity" placeholder="" type="text">
                                                <div id="err_storage_capacity" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 1-->


                        <!--begin: Form Wizard Step 6-->
                        <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                            <div class="kt-heading kt-heading--md">Review your Details and Submit</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-wizard-v2__review">
                                    <div class="kt-wizard-v2__review-item">
                                        <div class="kt-wizard-v2__review-title">
                                            Account Details
                                        </div>
                                        <div class="kt-wizard-v2__review-content">
                                            John Wick<br />
                                            Phone: +61412345678<br />
                                            Email: johnwick@reeves.com
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v2__review-item">
                                        <div class="kt-wizard-v2__review-title">
                                            Support Location Address
                                        </div>
                                        <div class="kt-wizard-v2__review-content">
                                            Address Line 1<br />
                                            Address Line 2<br />
                                            Melbourne 3000, VIC, Australia
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v2__review-item">
                                        <div class="kt-wizard-v2__review-title">
                                            Support Channels
                                        </div>
                                        <div class="kt-wizard-v2__review-content">
                                            Overnight Delivery with Regular Packaging<br />
                                            Preferred Morning (8:00AM - 11:00AM) Delivery
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v2__review-item">
                                        <div class="kt-wizard-v2__review-title">
                                            Delivery Address
                                        </div>
                                        <div class="kt-wizard-v2__review-content">
                                            Address Line 1<br />
                                            Address Line 2<br />
                                            Preston 3072, VIC, Australia
                                        </div>
                                    </div>
                                    <div class="kt-wizard-v2__review-item">
                                        <div class="kt-wizard-v2__review-title">
                                            Payment Details
                                        </div>
                                        <div class="kt-wizard-v2__review-content">
                                            Card Number: xxxx xxxx xxxx 1111<br />
                                            Card Name: John Wick<br />
                                            Card Expiry: 01/21
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--end: Form Wizard Step 6-->

                        <!--begin: Form Actions -->
                        <div class="kt-form__actions">
                            <button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                Previous
                            </button>
                            <button id="btn_submit" type="submit" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
                                Submit
                            </button>
                            <button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                Next Step
                            </button>
                        </div>

                        <!--end: Form Actions -->
                    </form>

                    <!--end: Form Wizard Form-->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script-bottom')

<!--begin::Page Scripts(used by this page) -->
{{-- <script src="{{ asset('/') }}admin_res/js/pages/custom/wizard/wizard-2.js" type="text/javascript"></script> --}}

<!--end::Page Scripts -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var btn_submit = $('#btn_submit');
    $('#kt_form').on('submit', function(e) {
        e.preventDefault();
        // alert($('input[name="profile_avatar"]').val());
        var dataForm = new FormData(this);
        $.ajax({
            url: '{{ route("service.create") }}',
            method: 'post',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                KTApp.progress(btn_submit);
                KTApp.progress($(this));
                $('.invalid-feedback').text('');
            },
            success: function(response) {
                console.log(response);
                if ($.isEmptyObject(response.error)) {

                    swal.fire({
                        "title": "Layanan",
                        "html": "Penambahan layanan berhasil, anda dapat beralih ke layanan baru dengan memilih layanan tersebut pada menu layanan pada navigasi diatas",
                        "type": "success",
                        "confirmButtonClass": "btn btn-primary",
                        cancelButtonClass: "btn btn-secondary",
                        showCancelButton: false,
                        allowOutsideClick: true,
                        confirmButtonText: "Oke",
                        cancelButtonText: "@lang('courses.teach-create-btn-2')",
                    }).then((result) => {
                        window.location.reload(true);
                        // if (result.value) {

                        // }
                    });
                } else {
                    if ($.isPlainObject(response.error)) {
                        for (let [key, value] of Object.entries(response.error)) {
                            var errors = $('#err_' + key);
                            $(errors).text(value.toString());
                            // alert(field+'   '+key+'   '+value);
                        }
                        swal.fire({
                            "title": "@lang('courses.msg-error-title')",
                            "html": "@lang('courses.msg-error-content')",
                            "type": "warning",
                            "confirmButtonClass": "btn btn-secondary"
                        });
                    } else {
                        swal.fire({
                            "title": "Password",
                            "html": "Password anda tidak sesuai",
                            "type": "warning",
                            "confirmButtonClass": "btn btn-secondary"
                        });
                    }
                    console.log(response);
                }
            },
            complete: function() {
                KTApp.unprogress(btn_submit);
                KTApp.unprogress($(this));

                $('input[name="password"]').val("");
                $('input[name="new_password"]').val("");
                $('input[name="re_password"]').val("");
            },
            error: function(xhr, status, error) {
                // var err = eval("(" + xhr.responseText + ")");
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
    });


    $(document).ready(function(){
        $('#kt_touchspin_user').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',

            min: 50,
            max: 1000000000,
            stepinterval: 50,
            step: 50,
            // maxboostedstep: 10000000,
            postfix: 'User'
        });

        $('#kt_touchspin_storage').TouchSpin({
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',

            min: 1,
            max: 1000000000,
            // stepinterval: 5,
            step: 1,
            maxboostedstep: 10000000,
            postfix: 'GB'
        });

        var company_type = $('#kt_select2_4').select2({
            // placeholder: "Select a state",
            allowClear: true,
            placeholder: "Pilih jenis lembaga",
        });
    });
</script>


<script>
    "use strict";

    // Class definition
    var KTWizard2 = function() {
        // Base elements
        var wizardEl;
        var formEl;
        var validator;
        var wizard;

        // Private functions
        var initWizard = function() {
            // Initialize form wizard
            wizard = new KTWizard('kt_wizard_v2', {
                startStep: 1, // initial active step number
                clickableSteps: true // allow step clicking
            });


            // Change event
            wizard.on('change', function(wizard) {
                KTUtil.scrollTop();
            });
        }


        return {
            // public functions
            init: function() {
                wizardEl = KTUtil.get('kt_wizard_v2');
                
                initWizard();
               
            }
        };
    }();

    jQuery(document).ready(function() {
        KTWizard2.init();
    });
</script>
@endsection