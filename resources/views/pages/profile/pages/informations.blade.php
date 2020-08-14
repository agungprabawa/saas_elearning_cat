@extends('pages.profile.profile')
@section('pages')
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Personal Information
                            <small>update your personal informaiton</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-label-brand btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flaticon2-gear"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__section kt-nav__section--first">
                                            <span class="kt-nav__section-text">Export
                                                Tools</span>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-print"></i>
                                                <span class="kt-nav__link-text">Print</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-copy"></i>
                                                <span class="kt-nav__link-text">Copy</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                                <span class="kt-nav__link-text">Excel</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-text-o"></i>
                                                <span class="kt-nav__link-text">CSV</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                <span class="kt-nav__link-text">PDF</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form id="kt_form" enctype="multipart/form-data" class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 class="kt-section__title kt-section__title-sm">
                                            Customer Info:</h3>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
                                            <div class="kt-avatar__holder" style="background-image: url({{ $profile->cover_img }})">
                                            </div>
                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen"></i>
                                                <input type="file" name="profile_avatar">
                                            </label>
                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                        </div>
                                        <div id="err_profile_avatar" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Nama Anda</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control" name="name" type="text" value="{{ $profile->name }}">
                                        <div id="err_name" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Username Anda</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control" name="username" type="text" value="{{ $profile->username }}">
                                        <div id="err_username" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Deskripsi Singkat</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <textarea name="bio" class="form-control" id="" cols="10" rows="5">{{ $profile->bio }}</textarea>
                                        <div id="err_bio" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 class="kt-section__title kt-section__title-sm">
                                            Informasi Kontak:</h3>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Nomor Handphone</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $profile->phone_number ?? '-' }}" placeholder="Phone" name="phone_number" aria-describedby="basic-addon1">
                                            <div id="err_phone_number" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                        </div>
                                        <span class="form-text text-muted">We'll
                                            never share your email with anyone
                                            else.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Alamat Email</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $profile->email ?? '-' }}" placeholder="Email" name="email" aria-describedby="basic-addon1">
                                            <div id="err_email" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Alamat</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group">
                                            <div class="input-group-prepend"><span class="input-group-text"><i class="fal fa-map-marker-alt"></i></span>
                                            </div>
                                            <input type="text" class="form-control" value="{{ $profile->address ?? '' }}" placeholder="Alamat" name="address" aria-describedby="basic-addon1">
                                            <div id="err_address" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row">
                                <div class="col-lg-3 col-xl-3">
                                </div>
                                <div class="col-lg-9 col-xl-9">
                                    <button id="btn_submit" type="submit" class="btn btn-success">Submit</button>&nbsp;
                                    {{-- <button type="reset" class="btn btn-secondary">Cancel</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!--End:: App Content-->
@endsection
@section('page-script')
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
            url: '{{ route("user.profile.update") }}',
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
                        "title": "Profil Update",
                        "html": "Informasi profil berhasil diperbaharui",
                        "type": "success",
                        "confirmButtonClass": "btn btn-primary",
                        cancelButtonClass: "btn btn-secondary",
                        showCancelButton: false,
                        allowOutsideClick: true,
                        confirmButtonText: "Oke",
                        cancelButtonText: "@lang('courses.teach-create-btn-2')",
                    }).then((result) => {
                        if (result.value) {
                            
                        } 
                    });
                } else {
                    console.log(response);
                    var error_data = {};

                    for (let [key, value] of Object.entries(response.error)) {
                        var errors = $('#err_'+key);
                        // var field = key.toString().replace(/\s+/g, '_');
                        $(errors).text(value.toString());
                        // alert(field+'   '+key+'   '+value);
                    }
                    swal.fire({
                        "title": "@lang('courses.msg-error-title')",
                        "html": "@lang('courses.msg-error-content')",
                        "type": "warning",
                        "confirmButtonClass": "btn btn-secondary"
                    });

                }
            },
            complete: function() {
                KTApp.unprogress(btn_submit);
                KTApp.unprogress($(this));
            },
            error: function(xhr, status, error) {
                // var err = eval("(" + xhr.responseText + ")");
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
    });


    "use strict";

    // Class definition
    var KTUserProfile = function() {
        // Base elements
        var avatar;
        var offcanvas;

        // Private functions
        var initAside = function() {
            // Mobile offcanvas for mobile mode
            offcanvas = new KTOffcanvas('kt_user_profile_aside', {
                overlay: true,
                baseClass: 'kt-app__aside',
                closeBy: 'kt_user_profile_aside_close',
                toggleBy: 'kt_subheader_mobile_toggle'
            });
        }

        var initUserForm = function() {
            avatar = new KTAvatar('kt_user_avatar');
        }

        return {
            // public functions
            init: function() {
                initAside();
                initUserForm();
            }
        };
    }();

    KTUtil.ready(function() {
        KTUserProfile.init();
    });
</script>
@endsection