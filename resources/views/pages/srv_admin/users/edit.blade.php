@extends('layouts.srv_admin.master')

@section('css')

<!--begin::Page Custom Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/css/pages/wizard/wizard-4.css" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles -->

@endsection


@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Server-side processing Examples </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Datatables.net </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Data sources </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Ajax Server-side </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
        <div class="kt-subheader__toolbar">
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

    <div class="kt-wizard-v4">
        <!--end: Form Wizard Nav -->
        <div class="kt-portlet" id="form_wrappers">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                    <span class="kt-portlet__head-icon">
                        <i class="kt-font-brand flaticon-users"></i>
                    </span>
                    <h3 class="kt-portlet__head-title">
                        @lang('users.tb-title')
                    </h3>
                </div>

            </div>
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid">
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

                        <!--begin: Form Wizard Form-->
                        <form class="kt-form" id="kt_form">
                            <!--begin: Form Wizard Step 1-->
                            {{-- <input type="hidden" name="curent_pass" value="{{ $user->password }}"> --}}
                            <div class="kt-heading kt-heading--md">@lang('users.update-sub')</div>
                            <div class="kt-form__section kt-form__section--first">
                                <div class="kt-section__body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('users.create-f-1')</label>
                                                <input type="text" value="{{ $user->name }}" class="form-control" name="name">
                                                <div id="err_name" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                <span class="form-text text-muted">@lang('courses.tab-1-f-1-sub')</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('users.create-f-2')</label>
                                                <input type="text" value="{{ $user->username }}" class="form-control" name="username">
                                                <div id="err_username" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                <span class="form-text text-muted">@lang('courses.tab-1-f-1-sub')</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('users.create-f-3')</label>
                                                <input type="email" value="{{ $user->email }}" class="form-control" name="email">
                                                <div id="err_email" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                <span class="form-text text-muted">@lang('courses.tab-1-f-1-sub')</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('users.create-f-4')</label>
                                                <input type="text" class="form-control" name="password">
                                                <div id="err_password" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                <span class="form-text text-muted">@lang('users.update-f-4-sub')</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>@lang('users.create-f-8')</label>
                                                <select name="type" id="" class="form-control">
                                                    @if (auth()->user()->active_status == 1)
                                                        <option {{ ($user->status == 1) ? 'selected':'' }} value="1">Admin</option>
                                                        <option {{ ($user->status == 2) ? 'selected':'' }} value="2">Staf</option>
                                                    @endif

                                                    <option {{ ($user->status == 3) ? 'selected':'' }} value="3">Student</option>
                                                </select>
                                                <div id="err_type" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                {{-- <span class="form-text text-muted">@lang('users.create-f-4-sub')</span> --}}
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('users.create-f-6')</label>
                                        <input value="{{ $user->address }}" class="form-control" type="text" name="address" id="">
                                        <div id="err_address" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="form-group">
                                                <label>@lang('users.create-f-7')</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="custom-file-label">
                                                            <i class="fa fa-picture-o "></i> @lang('courses.tab-1-f-4-placeholder')
                                                        </a>
                                                    </span>
                                                    <input value="{{ $user->cover_img }}" id="thumbnail" class="form-control" type="text" name="filepath">
                                                    <div id="err_filepath" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                </div>
                                                <span class="form-text text-muted">@lang('users.update-f-7-sub')</span>


                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div id="holder" style=""></div>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="kt-portlet__foot" style="float:right">
                                <div class="kt-form__actions">
                                    <div class="row justify-content-end">

                                        <button id="btn_submit" class="btn btn-success float-left">@lang('general.btn-save')</button>&nbsp;
                                        <button id="btn_cancel" class="btn btn-secondary">@lang('general.btn-cancel')</button>

                                    </div>
                                </div>
                            </div>
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
<script src="{{ asset('/') }}vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script>
    $('#lfm').filemanager('image');
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    var btn = $('#btn_submit');
    var cancel = $('#btn_cancel');

    btn.on('click', function(e) {
        e.preventDefault();

        // See: src\js\framework\base\app.js
        KTApp.progress(btn);
        KTApp.block($('#form_wrappers'));
        var update_url = '{{ route("srv_admin.users.update",":uuid") }}';
        update_url = update_url.replace(":uuid","{{ $user->id }}");

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
                        "title": "Berhasil Diubah",
                        "html": "User berhasil dirubah",
                        "type": "success",
                        "confirmButtonClass": "btn btn-primary",
                        cancelButtonClass: "btn btn-secondary",
                        showCancelButton: false,
                        allowOutsideClick: false,
                        confirmButtonText: "Ok",
                        cancelButtonText: "@lang('courses.teach-create-btn-2')",
                    }).then((result) => {

                            window.location.replace("{{ route('srv_admin.users.index') }}");

                    });
                } else {
                    KTApp.unprogress(btn);
                    KTApp.unblock($('#form_wrappers'));
                    for (let [key, value] of Object.entries(response.error)) {
                        $('#err_'+key).text(value.toString().replace());
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

    cancel.on('click', function(e) {
        e.preventDefault();
        KTApp.progress(cancel);
        KTApp.block($('#form_wrappers'));
        location.reload(true);
    });
</script>

@endsection
