@extends('layouts.srv_admin.master')

@section('css')
<!--begin::Page Custom Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/css/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />

<style>
    .bootstrap-switch {
        display: block !important;
    }

    .form-control:disabled {
        background-color: #f7f8fa !important;
        opacity: 1 !important;
    }

    #holder>img {
        height: 10rem !important;
        border-radius: 10px !important;

        margin-left: auto !important;
        margin-right: auto !important;

        display: block !important;
        vertical-align: middle;
    }
</style>
<!--end::Page Custom Styles -->
@endsection


@section('content')

<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                @lang('menu.nav-el-create') </h3>
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
                    Wizard 4 </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
        <div class="kt-subheader__toolbar kt-hidden">
            <div class="kt-subheader__wrapper">
                <a href="#" class="btn kt-subheader__btn-primary">
                    Actions &nbsp;

                    <!--<i class="flaticon2-calendar-1"></i>-->
                </a>

            </div>
        </div>
    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-wizard-v4" id="kt_wizard_v4" data-ktwizard-state="step-first">

        <!--begin: Form Wizard Nav -->
        <div class="kt-wizard-v4__nav">

            <!--doc: Remove "kt-wizard-v4__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
            <div class="kt-wizard-v4__nav-items kt-wizard-v4__nav-items--clickable">
                <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
                    <div class="kt-wizard-v4__nav-body">
                        <div class="kt-wizard-v4__nav-number">
                            1
                        </div>
                        <div class="kt-wizard-v4__nav-label">
                            <div class="kt-wizard-v4__nav-label-title">
                                @lang('courses.tab-1')
                            </div>
                            <div class="kt-wizard-v4__nav-label-desc">
                                @lang('courses.tab-1-sub')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
                    <div class="kt-wizard-v4__nav-body">
                        <div class="kt-wizard-v4__nav-number">
                            2
                        </div>
                        <div class="kt-wizard-v4__nav-label">
                            <div class="kt-wizard-v4__nav-label-title">
                                @lang('courses.tab-2')
                            </div>
                            <div class="kt-wizard-v4__nav-label-desc">
                                @lang('courses.tab-2-sub')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
                    <div class="kt-wizard-v4__nav-body">
                        <div class="kt-wizard-v4__nav-number">
                            3
                        </div>
                        <div class="kt-wizard-v4__nav-label">
                            <div class="kt-wizard-v4__nav-label-title">
                                @lang('courses.tab-3')
                            </div>
                            <div class="kt-wizard-v4__nav-label-desc">
                                @lang('courses.tab-3-sub')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-wizard-v4__nav-item" data-ktwizard-type="step">
                    <div class="kt-wizard-v4__nav-body">
                        <div class="kt-wizard-v4__nav-number">
                            4
                        </div>
                        <div class="kt-wizard-v4__nav-label">
                            <div class="kt-wizard-v4__nav-label-title">
                                @lang('courses.tab-4')
                            </div>
                            <div class="kt-wizard-v4__nav-label-desc">
                                @lang('courses.tab-4-sub')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--end: Form Wizard Nav -->
        <div class="kt-portlet" id="form_wrappers">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid">
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

                        <!--begin: Form Wizard Form-->
                        <form class="kt-form" id="kt_form" enctype="multipart/form-data">
                            <!--begin: Form Wizard Step 1-->
                            <div class="kt-wizard-v4__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
                                <div class="kt-heading kt-heading--md">@lang('courses.tab-1-title')</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v4__form">
                                        <div class="form-group">
                                            <label>@lang('courses.tab-1-f-1')</label>
                                            <input type="text" class="form-control" name="ctitle">
                                            <div id="err_ctitle" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            <span class="form-text text-muted">@lang('courses.tab-1-f-1-sub')</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>@lang('courses.tab-1-f-2')</label>
                                                    <select id="categorys" type="text" class="form-control" name="ccategory">
                                                        <option value="0">@lang('courses.str-select-0')</option>
                                                        @foreach ($coursesCategory as $item)
                                                        <option value="{{ $item->id_category }}">{{ $item->category }}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="form-text text-muted">@lang('courses.tab-1-f-2-sub')</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>@lang('courses.tab-1-f-3')</label>
                                            <textarea type="text" name="cdesc" id="editor1"></textarea>
                                            <div id="err_cdesc" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            <span class="form-text text-muted">@lang('courses.tab-1-f-3-sub')</span>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>@lang('courses.tab-1-f-4')</label>

                                                    <div></div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="courses_cover" id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                    <div id="err_courses_cover" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                    <span class="form-text text-muted">@lang('courses.tab-1-f-4-sub')</span>


                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div id="holder" style=""></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 1-->

                            <!--begin: Form Wizard Step 2-->
                            <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">@lang('courses.tab-2-title')</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v4__form">

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>@lang('courses.tab-2-f-2')</label>
                                                    <input name="share_link" data-switch="true" type="checkbox" data-on-text="Ya" data-handle-width="70" data-off-text="Tidak" data-on-color="success" value="1" class="form-control" checked>
                                                    <span class="form-text text-muted">@lang('courses.tab-2-f-2-sub')</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>@lang('courses.tab-2-f-3')</label>
                                                    <input name="is_unlimited_users" data-switch="true" type="checkbox" data-on-text="Ya" data-handle-width="70" data-off-text="Tidak" data-on-color="success" value="1" class="form-control" checked>
                                                    <span class="form-text text-muted">@lang('courses.tab-2-f-3-sub')</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6">

                                            </div>

                                            <div class="col-xl-6" id="fm_max_user" style="display: none">
                                                <div class="form-group">
                                                    <label>@lang('courses.tab-2-f-4')</label>
                                                    <input type="number" class="form-control" name="max_user" placeholder="">
                                                    <span class="form-text text-muted">@lang('courses.tab-2-f-3-sub')</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="kt-heading kt-heading--md">@lang('courses.tab-2-title-2')</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v4__form">
                                        <div class="row" id="fm_start_time">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>@lang('assisted_test.tab-2-f-5')</label>
                                                    <div class="input-group date">
                                                        <?php

                                                        $datetime1 = \Carbon\Carbon::now()->format('Y-m-d H:i')
                                                        ?>
                                                        <input readonly value="{{ $datetime1 }}" name="start_date" type="text" class="form-control" id="start_date" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="la la-calendar glyphicon-th"></i>
                                                            </span>
                                                        </div>
                                                        <div id="err_start_date" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                    </div>
                                                    <span class="form-text text-muted">@lang('assisted_test.tab-2-f-5-sub')</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>@lang('assisted_test.tab-2-f-9')</label>
                                                    <input name="is_no_end_time" data-switch="true" type="checkbox" data-on-text="Ya" data-handle-width="70" data-off-text="Tidak" data-on-color="success" value="1" class="form-control" checked>
                                                    <span class="form-text text-muted">@lang('assisted_test.tab-2-f-9-sub')</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row" id="fm_end_time" style="display:none">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>@lang('assisted_test.tab-2-f-7')</label>
                                                    <div class="input-group date">
                                                        <?php
                                                        $datetime2 = \Carbon\Carbon::now()->addHours(1)->format('Y-m-d H:i')
                                                        ?>

                                                        <input readonly value="{{ $datetime2 }}" type="text" name="end_date" class="form-control" id="end_date" />
                                                        <div class="input-group-append">
                                                            <span class="input-group-text">
                                                                <i class="la la-calendar glyphicon-th"></i>
                                                            </span>
                                                        </div>
                                                        <div id="err_end_date" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                    </div>
                                                    <span class="form-text text-muted">@lang('assisted_test.tab-2-f-7-sub')</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 2-->

                            <!--begin: Form Wizard Step 3-->
                            <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">

                                <div class="kt-heading kt-heading--md">@lang('courses.tab-3-title')</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v4__form">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>@lang('courses.tab-3-f-1')</label>
                                                    <input name="is_free_course" data-switch="true" type="checkbox" data-on-text="Ya" data-handle-width="70" data-off-text="Tidak" data-on-color="success" value="1" class="form-control" checked>
                                                    <span class="form-text text-muted">@lang('courses.tab-3-f-1-sub')</span>
                                                </div>
                                            </div>
                                            <div class="col-xl-6" id="fm_price" style="display: none">
                                                <div class="form-group">
                                                    <label>@lang('courses.tab-3-f-2')</label>
                                                    <input min="10000" step="5000" type="number" class="form-control" name="course_price" value="10000">
                                                    <span class="form-text text-muted">@lang('courses.tab-3-f-2-sub')</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 3-->

                            <!--begin: Form Wizard Step 4-->
                            <div class="kt-wizard-v4__content" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">@lang('courses.tab-4-title-0')</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v4__review">
                                        <div class="kt-wizard-v4__review-item">
                                            <div class="kt-wizard-v4__review-title">
                                                @lang('courses.tab-4-title-1')
                                            </div>
                                            <div class="kt-wizard-v4__review-content">
                                                <div id="lb_ctitle"></div>
                                                <div id="lb_ccategory"></div>
                                                {{-- Email: johnwick@reeves.com --}}
                                            </div>
                                        </div>
                                        <div class="kt-wizard-v4__review-item">
                                            <div class="kt-wizard-v4__review-title">
                                                @lang('courses.tab-4-title-2')
                                            </div>
                                            <div class="kt-wizard-v4__review-content">
                                                <div id="lb_manual_add"></div>
                                                <div id="lb_share_link"></div>
                                                <div id="lb_is_unlimited_users"></div>
                                                <br>
                                                <div id="lb_is_start_immediately"></div>
                                                <div id="lb_is_hast_end_time"></div>
                                            </div>

                                        </div>
                                        <div class="kt-wizard-v4__review-item">
                                            <div class="kt-wizard-v4__review-title">
                                                @lang('courses.tab-4-title-3')
                                            </div>
                                            <div class="kt-wizard-v4__review-content">
                                                <div id="lb_is_free"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 4-->

                            <!--begin: Form Actions -->
                            <div class="kt-form__actions">
                                <button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                    @lang('courses.btn-previous')
                                </button>
                                <button id="btn_submit" type="submit" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-submit">
                                    @lang('courses.btn-submit')
                                </button>
                                <button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                    @lang('courses.btn-next-step')
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
</div>

<!-- end:: Content -->

@endsection

@section('script-bottom')
<!--begin::Page Scripts(used by this page) -->
{{-- <script src="{{ asset('/') }}admin_res/js/pages/custom/wizard/wizard-4.js" type="text/javascript"></script> --}}
<!--begin::Page Scripts(used by this page) -->
<script src="{{ asset('/') }}admin_res/js/pages/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        $('input[name="is_unlimited_users"]').on('switchChange.bootstrapSwitch', function(event, state) {
            if (state == true) {
                //  alert('true');
                //  $('input[name="max_user"]').prop('disabled',true);
                $('input[name="max_user"]').val('');
                $('#fm_max_user').hide("fast", "swing");
            } else {
                //   alert('false');
                // $('input[name="max_user"]').prop('disabled',false);
                $('#fm_max_user').show("fast", "swing");
                $('input[name="max_user"]').val(50);
            }
        });

        $('input[name="is_no_end_time"]').on('switchChange.bootstrapSwitch', function(event, state) {

            if (state == true) {
                $('#fm_end_time').hide("fast", "swing");
            } else {
                $('#fm_end_time').show("fast", "swing");

            }
        });

        $('input[name="is_free_course"]').on('switchChange.bootstrapSwitch', function(event, state) {
            if (state == true) {
                $('#fm_price').hide("fast", "swing");
            } else {
                $('#fm_price').show("fast", "swing");
            }
        })
    });
</script>
<script src="{{ asset('/') }}admin_res/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1', {
        customConfig: '{{ asset("/") }}admin_res/plugins/ckeditor/config.js'
    });
</script>
<script>
    "use strict";

    // Class definition
    var KTWizard4 = function() {
        // Base elements
        var wizardEl;
        var formEl;
        var validator;
        var wizard;

        // Private functions
        var initWizard = function() {
            // Initialize form wizard
            wizard = new KTWizard('kt_wizard_v4', {
                startStep: 1, // initial active step number
                clickableSteps: true // allow step clicking
            });


            // Change event
            wizard.on('change', function(wizard) {
                KTUtil.scrollTop();

                $('#lb_ctitle').html($('input[name="ctitle"]').val());
                $('#lb_ccategory').html($("#categorys option:selected").text());

                var st_share_link = $('input[name="share_link"]').bootstrapSwitch('state');
                var st_is_unlimited_users = $('input[name="is_unlimited_users"]').bootstrapSwitch('state');
                var st_is_no_end_time = $('input[name="is_no_end_time"]').bootstrapSwitch('state');
                var st_is_free = $('input[name="is_free_course"]').bootstrapSwitch('state');

                var str_share_link = (st_share_link == true) ? '@lang("courses.str_share_link-1")' : '@lang("courses.str_share_link-0")';
                var str_is_unlimited_users = (st_is_unlimited_users == true) ? '@lang("courses.str_is_unlimited_users-1")' : '@lang("courses.str_is_unlimited_users-0")' + $('input[name="max_user"]').val();

                var str_is_hast_end_time = (st_is_no_end_time == true) ? '@lang("courses.str_is_hast_end_time-1")' : '@lang("courses.str_is_hast_end_time-0") ' + $('input[name="end_date"]').val();

                var str_is_free = (st_is_free == true) ? '@lang("courses.str_is_free-1")' : '@lang("courses.str_is_free-0") Rp.' + $('input[name="course_price"]').val();

                $("#lb_share_link").html(str_share_link).text();
                $("#lb_is_unlimited_users").html(str_is_unlimited_users).text();

                $('#lb_is_hast_end_time').html(str_is_hast_end_time).text();

                $('#lb_is_free').html(str_is_free).text();
            });
        }

        var initValidation = function() {
            validator = formEl.validate({
                // Validate only visible fields
                ignore: ":hidden",

                // Validation rules
                rules: {
                    //= Step 1
                    // ctitle: {
                    //     required: true
                    // },
                    // cdesc: {
                    //     required: true
                    // },
                    // phone: {
                    //     required: true
                    // },
                    // emaul: {
                    //     required: true,
                    //     email: true
                    // },

                    // //= Step 2
                    // address1: {
                    //     required: true
                    // },
                    // postcode: {
                    //     required: true
                    // },
                    // city: {
                    //     required: true
                    // },
                    // state: {
                    //     required: true
                    // },
                    // country: {
                    //     required: true
                    // },

                    // //= Step 3
                    // ccname: {
                    //     required: true
                    // },
                    // ccnumber: {
                    //     required: true,
                    //     creditcard: true
                    // },
                    // ccmonth: {
                    //     required: true
                    // },
                    // ccyear: {
                    //     required: true
                    // },
                    // cccvv: {
                    //     required: true,
                    //     minlength: 2,
                    //     maxlength: 3
                    // },
                },

                // Display error
                invalidHandler: function(event, validator) {
                    KTUtil.scrollTop();

                    swal.fire({
                        "title": "",
                        "text": "There are some errors in your submission. Please correct them.",
                        "type": "error",
                        "confirmButtonClass": "btn btn-secondary"
                    });
                },

                // Submit valid form
                submitHandler: function(form) {

                }
            });
        }

        var initSubmit = function() {
            // var btn = formEl.find('[data-ktwizard-type="action-submit"]');



            // btn.on('click', function(e) {
            //     e.preventDefault();
            //     if (validator.form()) {
            //         $.ajaxSetup({
            //             headers: {
            //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //             }
            //         });
            //         // See: src\js\framework\base\app.js
            //         KTApp.progress(btn);
            //         KTApp.block($('#form_wrappers'));

            //         // See: http://malsup.com/jquery/form/#ajaxSubmit
            //         CKEDITOR.instances.editor1.updateElement();
            //         $('.invalid-feedback').html('').text();
            //         $.ajax({
            //             url: '{{ route("srv_admin.courses.store") }}',
            //             method: 'POST',
            //             data: dataForm,
            //             success: function(response) {
            //                 console.log(response);
            //                 if ($.isEmptyObject(response.error)) {

            //                     swal.fire({
            //                         "title": "@lang('courses.msg-success-title')",
            //                         "html": "@lang('courses.msg-success-content')",
            //                         "type": "success",
            //                         "confirmButtonClass": "btn btn-primary",
            //                         cancelButtonClass: "btn btn-secondary",
            //                         showCancelButton: true,
            //                         allowOutsideClick: false,
            //                         confirmButtonText: "@lang('courses.msg-next-btn')",
            //                         cancelButtonText: "@lang('courses.msg-new-btn')",
            //                     }).then((result) => {
            //                         if (result.value) {
            //                             var next_loc = "{{ route('srv_admin.courses.manage',':uuid') }}"
            //                             next_loc = next_loc.replace(":uuid", response.uuid);
            //                             window.location.replace(next_loc);
            //                         } else if (
            //                             /* Read more about handling dismissals below */
            //                             result.dismiss === Swal.DismissReason.cancel
            //                         ) {
            //                             window.location.replace("{{ route('srv_admin.courses.create') }}");
            //                         }
            //                     });
            //                 } else {
            //                     KTApp.unprogress(btn);
            //                     KTApp.unblock($('#form_wrappers'));
            //                     for (let [key, value] of Object.entries(response.error)) {
            //                         var errors = $('#err_' + key);
            //                         $(errors).text(value.toString());
            //                     }
            //                     swal.fire({
            //                         "title": "@lang('courses.msg-error-title')",
            //                         "html": "@lang('courses.msg-error-content')",
            //                         "type": "warning",
            //                         "confirmButtonClass": "btn btn-secondary"
            //                     });

            //                 }
            //             },
            //             error: function(xhr, status, error) {
            //                 // var err = eval("(" + xhr.responseText + ")");
            //                 console.log(xhr.responseText);
            //                 console.log(status);
            //                 console.log(error);


            //             }
            //         });
            //     }
            // });
        }

        return {
            // public functions
            init: function() {
                wizardEl = KTUtil.get('kt_wizard_v4');
                formEl = $('#kt_form');

                initWizard();
                initValidation();
                initSubmit();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTWizard4.init();
    });


    $('#kt_form').on('submit', function(e) {
        e.preventDefault();
        var btn = $('#btn_submit');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // See: src\js\framework\base\app.js
        KTApp.progress(btn);
        KTApp.block($('#form_wrappers'));

        let dataForm = new FormData(this);

        // See: http://malsup.com/jquery/form/#ajaxSubmit
        CKEDITOR.instances.editor1.updateElement();
        $('.invalid-feedback').html('').text();
        $.ajax({
            url: '{{ route("srv_admin.courses.store") }}',
            method: 'POST',
            data: dataForm,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                if ($.isEmptyObject(response.error)) {

                    swal.fire({
                        "title": "@lang('courses.msg-success-title')",
                        "html": "@lang('courses.msg-success-content')",
                        "type": "success",
                        "confirmButtonClass": "btn btn-primary",
                        cancelButtonClass: "btn btn-secondary",
                        showCancelButton: true,
                        allowOutsideClick: false,
                        confirmButtonText: "@lang('courses.msg-next-btn')",
                        cancelButtonText: "@lang('courses.msg-new-btn')",
                    }).then((result) => {
                        if (result.value) {
                            var next_loc = "{{ route('srv_admin.courses.manage',':uuid') }}"
                            next_loc = next_loc.replace(":uuid", response.uuid);
                            window.location.replace(next_loc);
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            window.location.replace("{{ route('srv_admin.courses.create') }}");
                        }
                    });
                } else {
                    KTApp.unprogress(btn);
                    KTApp.unblock($('#form_wrappers'));
                    for (let [key, value] of Object.entries(response.error)) {
                        var errors = $('#err_' + key);
                        $(errors).text(value.toString());
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


            }
        });

    });
</script>



<!--end::Page Scripts -->

<script src="{{ asset('/') }}vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>

<script src="{{ asset('/') }}admin_res/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="{{ asset('/') }}admin_res/plugins/moment/moment-with-locales.js"></script>
<script>
    $(document).ready(function() {
        // $('#start_date').datetimepicker({
        //     format: "yyyy/mm/dd",
        //     startDate: '-0d',
        //     todayHighlight: true,
        //     autoclose: true,
        //     startView: 2,
        //     minView: 2,
        //     forceParse: 0,
        //     pickerPosition: 'bottom-left'
        // });

        $('#start_date').datetimepicker({
            todayHighlight: true,
            startDate: '-0d',
            autoclose: true,
            pickerPosition: 'top-left',
            todayBtn: true,
            format: 'yyyy/mm/dd hh:ii'
        });

        $('#end_date').datetimepicker({
            todayHighlight: true,
            startDate: '-0d',
            autoclose: true,
            pickerPosition: 'top-left',
            todayBtn: false,
            format: 'yyyy/mm/dd hh:ii'
        });
    });
</script>

<script>
    // $('input[name="ctitle"]').keyup(function() {
    //     $('#lb_ctitle').html($(this).val());
    // });

    // $('#lb_ccategory').html($("#categorys option:selected").text());
    // $('#categorys').change(function(){
    //     $('#lb_ccategory').html($("#categorys option:selected").text());
    // });
</script>

@endsection