@extends('pages.profile.profile')
@section('pages')
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Change Password<small>change or reset your account password</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar kt-hidden">
                        <div class="kt-portlet__head-toolbar">
                            
                        </div>
                    </div>
                </div>
                <form id="kt_form" class="kt-form kt-form--label-right">
                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 class="kt-section__title kt-section__title-sm">Change Or Recover Your Password:</h3>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="password" name="password" class="form-control" value="" placeholder="Current password">
                                        <a href="#" class="kt-link kt-font-sm kt-font-bold kt-margin-t-5">Forgot password ?</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="password" name="new_password" class="form-control" value="" placeholder="New password">
                                        <div id="err_new_password" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    </div>
                                </div>
                                <div class="form-group form-group-last row">
                                    <label class="col-xl-3 col-lg-3 col-form-label">Verify Password</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input type="password" name="re_password" class="form-control" value="" placeholder="Verify password">
                                        <div id="err_re_password" class="invalid-feedback" style="display:block; font-size:14px"></div>
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
                                    <button type="submit" class="btn btn-brand btn-bold">Change Password</button>&nbsp;
                                    <button type="reset" class="btn btn-secondary">Cancel</button>
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
            url: '{{ route("user.change.password.do") }}',
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
                    if($.isPlainObject(response.error)){
                        for (let [key, value] of Object.entries(response.error)) {
                            var errors = $('#err_'+key);
                            $(errors).text(value.toString());
                            // alert(field+'   '+key+'   '+value);
                        }
                        swal.fire({
                            "title": "@lang('courses.msg-error-title')",
                            "html": "@lang('courses.msg-error-content')",
                            "type": "warning",
                            "confirmButtonClass": "btn btn-secondary"
                        });
                    }else{
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