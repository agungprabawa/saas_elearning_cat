@extends('layouts.srv_admin.master')

@section('css')

<!--begin::Page Custom Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/css/pages/pricing/pricing-1.css" rel="stylesheet" type="text/css" />
<style>
    .kt-widget31 .kt-widget31__item {
        margin-bottom: 2.5rem !important;
    }

    .kt-badge.kt-badge--inline {
        font-size: 1rem !important;
        font-weight: 600 !important;
        padding: 10px 30px !important;
    }

    .kt-widget31 .kt-widget31__item .kt-widget31__content:last-child {
        width: 60% !important;
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
                @lang('menu.nav-more-subscribe') </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Konfigurasi Layanan
                </a>
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <a href="{{ route('srv_admin.subscribtions.index') }}" class="btn kt-subheader__btn-primary">
                    @lang('subscribtions.res-usage') &nbsp;
                    {{-- <i class="flaticon2-calendar-1"></i> --}}
                </a>

            </div>
        </div>
    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <!--begin::Portlet-->
    <form  id="change_form" class="kt-portlet">
        @csrf
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="fa flaticon-interface-1"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    @lang('menu.nav-more-subscribe')
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="kt-pricing-1">
                <div class="kt-pricing-1__items row">
                    <div class="kt-pricing-1__item col-lg-3">
                        <div class="kt-pricing-1__visual">
                            <div class="kt-pricing-1__hexagon1"></div>
                            <div class="kt-pricing-1__hexagon2"></div>
                            <span class="kt-pricing-1__icon kt-font-brand"><i class="fa flaticon-presentation-1"></i></span>
                        </div>
                        <span class="kt-pricing-1__price">{{ $curentSubs[0]->label }}</span>
                        <h2 class="kt-pricing-1__subtitle">{{ rupiah($curentSubs[0]->price) }}</h2>
                        <span class="kt-pricing-1__description">
                            <span style="padding: 0 5px">
                                {{ strip_tags($curentSubs[0]->desciptions) }}
                            </span>
                        </span>
                        <div class="kt-pricing-1__btn">

                            <input name="attr-1" data-switch="true" type="checkbox" @if($curentSubs[0]->size == 1)
                            checked="checked"
                            @endif
                            data-on-text="Enabled" data-handle-width="70" data-off-text="Disabled" data-on-color="success" value="1">
                        </div>
                    </div>
                    <div class="kt-pricing-1__item col-lg-3">
                        <div class="kt-pricing-1__visual">
                            <div class="kt-pricing-1__hexagon1"></div>
                            <div class="kt-pricing-1__hexagon2"></div>
                            <span class="kt-pricing-1__icon kt-font-brand"><i class="fa flaticon-list"></i></span>
                        </div>
                        <span class="kt-pricing-1__price">{{ $curentSubs[1]->label }}</span>
                        <h2 class="kt-pricing-1__subtitle">{{ rupiah($curentSubs[1]->price) }}</h2>
                        <span class="kt-pricing-1__description">
                            <span style="padding: 0 5px">
                                {{ strip_tags($curentSubs[1]->desciptions) }}
                            </span>
                        </span>
                        <div class="kt-pricing-1__btn">
                            <input name="attr-2" data-switch="true" type="checkbox" @if($curentSubs[1]->size == 1)
                            checked="checked"
                            @endif
                            data-on-text="Enabled" data-handle-width="70" data-off-text="Disabled" data-on-color="success" value="1">
                        </div>
                    </div>
                    <hr>

                    <div class="kt-pricing-1__item col-lg-6">
                        <div class="kt-pricing-1__visual">
                            <div class="kt-pricing-1__hexagon1"></div>
                            <div class="kt-pricing-1__hexagon2"></div>
                            <span class="kt-pricing-1__icon kt-font-success"><i class="fa flaticon-dashboard"></i></span>
                        </div>
                        <span class="kt-pricing-1__price">Resources Usage</span>

                        <div class="col-xl-12 kt-pricing-1__description">
                            <!--begin:: Widgets/User Progress -->
                            <div class="kt-widget31">
                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">

                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Users Capacity
                                            </a>

                                        </div>
                                    </div>
                                    <div class="kt-widget31__content">
                                        <div class="col-md-12">
                                            <input name="attr-3" readonly type="text" class="form-control" value="{{ $curentSubs[2]->size }}" placeholder="Users Capacity">
                                        </div>

                                    </div>
                                </div>

                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Storage Capacity
                                            </a>

                                        </div>
                                    </div>
                                    <div class="kt-widget31__content">
                                        <div class="col-md-12">
                                            <input name="attr-4" readonly type="text" class="form-control" value="{{ $curentSubs[3]->size }}" placeholder="Storage Capacity">
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <!--end:: Widgets/User Progress -->
                        </div>
                    </div>
                </div>
            </div>
            <hr style="width:100%">
            <div class="kt-form__actions">
                <button id="submit_change" class="btn btn-primary float-right">@lang('subscribtions.btn-save')</button>
                <div class="float-right" style="padding:6px"></div>
            <a href="{{ route('srv_admin.subscribtions.index') }}" class="btn btn-secondary float-right">@lang('subscribtions.btn-cancel')</a>
            </div>

        </div>
    </form>

    <!--end::Portlet-->
</div>

<!-- end:: Content -->
@endsection


@section('script-bottom')
<!--begin::Page Scripts(used by this page) -->
<script src="{{ asset('/') }}admin_res/js/pages/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>

<!--end::Page Scripts -->
<script type="text/javascript" src="{{ URL::asset('admin_res/js/pages/crud/forms/widgets/bootstrap-touchspin.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("input[name='attr-3']").TouchSpin({
            postfix: 'Users',
            min: 50,
            max: 100000000,
            step: 50,
            boostat: 5,
            maxboostedstep: 10,

            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',
        });
        $("input[name='attr-4']").TouchSpin({
            postfix: 'GB',
            min: 1,
            max: 100000000,
            step: 1,
            buttondown_class: 'btn btn-secondary',
            buttonup_class: 'btn btn-secondary',
        });
    });
</script>
<!-- Sweet-Alert  -->
<script>
    "use strict";

    // Class definition
    var KTWizard4 = function() {
        // Base elements

        var formEl;
        var validator;
        var wizard;

        // Private functions

        var initSubmit = function() {
            var btn = formEl.find('#submit_change');

            btn.on('click', function(e) {
                e.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                // See: src\js\framework\base\app.js
                KTApp.progress(btn);
                KTApp.block($('#change_form'));

                // See: http://malsup.com/jquery/form/#ajaxSubmit

                $('.invalid-feedback').html('').text();
                formEl.ajaxSubmit({
                    url: '{{ route("srv_admin.subscribtions.save") }}',
                    method: 'POST',
                    data: $('#change_form').serialize(),
                    success: function(response) {
                        if ($.isEmptyObject(response.error)) {
                            console.log(response);
                            var title = "";
                            var content = "";
                            var btnLang = "";

                            if(response.success == "downgrade"){
                                title = "@lang('subscribtions.msg-down-title')";
                                content = "@lang('subscribtions.msg-down-content')";
                                btnLang = "@lang('subscribtions.msg-ok-btn')";
                            }else if(response.success == "upgrade"){
                                title = "@lang('subscribtions.msg-up-title')";
                                content = "@lang('subscribtions.msg-up-content')";
                                btnLang = "@lang('subscribtions.msg-up-btn')";
                            }else{
                                title = "@lang('subscribtions.msg-first-title')";
                                content = "@lang('subscribtions.msg-first-content')";
                                btnLang = "@lang('subscribtions.msg-first-btn')";
                            }

                            swal.fire({
                                "title": title,
                                "html": content,
                                "type": "success",
                                "confirmButtonClass": "btn btn-primary",
                                cancelButtonClass: "btn btn-secondary",
                                showCancelButton: false,
                                allowOutsideClick: false,
                                confirmButtonText: btnLang,
                                cancelButtonText: "@lang('courses.msg-new-btn')",
                            }).then((result) => {
                                if (result.value) {

                                    window.location.replace(response.url);
                                } else if (
                                    /* Read more about handling dismissals below */
                                    result.dismiss === Swal.DismissReason.cancel
                                ) {
                                    // window.location.replace("{{ route('srv_admin.courses.create') }}");
                                }
                            });
                        } else {
                            KTApp.unprogress(btn);
                            KTApp.unblock($('#change_form'));

                            console.log(response);
                            var error_data = {};

                            for (let [key, value] of Object.entries(response.error)) {
                                error_data[key] = value;
                                if (key == "cdesc") {
                                    $('#cke_editor1').siblings('.invalid-feedback').text(value.toString().replace(key, 'Informasi '));
                                }

                                $('input[name="' + key + '"]').siblings('.invalid-feedback').text(value.toString().replace(key, 'Informasi '));
                            }
                            swal.fire({
                                "title": "@lang('courses.msg-error-title')",
                                "html": "@lang('courses.msg-error-content')",
                                "type": "warning",
                                "confirmButtonClass": "btn btn-secondary"
                            });

                        }
                    }
                });
            });
        }

        return {
            // public functions
            init: function() {
                formEl = $('#change_form');
                initSubmit();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTWizard4.init();
    });
</script>

@endsection
