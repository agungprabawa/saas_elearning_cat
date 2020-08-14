@extends('layouts.srv_admin.master')

@section('css')

@endsection


@section('content')

<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                @lang('announ.edit') </h3>
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
    <form id="kt_form" class="row">
        <div class="col-md-8">
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            @lang('announ.title')
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-form">
                        <div class="kt-form__section kt-form__section--first">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>@lang('announ.fm-1')</label>
                                        <input type="text" value="{{ $announcement->title }}" class="form-control" name="title">
                                        <div id="err_title" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                        {{-- <span class="form-text text-muted">@lang('courses.tab-1-f-1-sub')</span> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>@lang('announ.fm-2')</label>
                                    <textarea type="text" name="content" id="editor1">{!! $announcement->content !!}</textarea>
                                    <div id="err_content" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    {{-- <span class="form-text text-muted">@lang('assisted_test.tab-1-f-3-sub')</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end::Portlet-->
        </div>
        <div class="col-md-4">
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Diumumkan Ke
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="form-group row">
                        <label for="" style="display:block; width:100%">Telah diumukan ke:</label>
                        @foreach ($wasNotifyTo as $item)
                            <button type="button" class="btn btn-secondary">{{ $item->wasNotify()[1] }}</button>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="kt-checkbox" style="width:100%">
                                    <input name="re_notify" type="checkbox"> Umumkan ulang ?
                                    <span></span>
                                </label>
                                <small>Ubah form berikut untuk mengumumkan ulang</small>
                                <div class="kt-checkbox-list" style="padding-top:10px">
                                    <label class="kt-checkbox">
                                        <input name="send_to_all" type="checkbox"> Semua User
                                        <span></span>
                                    </label>
                                    <label class="kt-checkbox">
                                        <input name="send_to_role" type="checkbox"> Tipe User Tertentu
                                        <span></span>
                                    </label>
                                    <label class="kt-checkbox">
                                        <input name="send_to_elearning" type="checkbox"> User E-Learning
                                        <span></span>
                                    </label>
                                    <label class="kt-checkbox">
                                        <input name="send_to_assistedtest" type="checkbox"> User Assisted Test
                                        <span></span>
                                    </label>
                                </div>
                                {{-- <span class="form-text text-muted">Some help text goes here</span> --}}
                            </div>
                        </div>
                    </div>
                    <div style="display:none" id="c_role" class="form-group row">
                        <label>Pilih tipe user</label>
                        <select class="form-control kt-select2" id="select_role" name="selected_role[]" multiple="multiple">
                            <option value="role.1">Administrator</option>
                            <option value="role.2">Staf</option>
                            <option value="role.3">Student</option>
                        </select>

                    </div>

                    <div style="display:none" id="c_learning" class="form-group row">
                        <label>Pilih E-Learning</label>
                        <select class="form-control kt-select2" id="select_learning" name="selected_elearning[]" multiple="multiple">

                        </select>

                    </div>

                    <div style="display:none" id="c_assistedtest" class="form-group row">
                        <label>Pilih Assisted Test</label>
                        <select class="form-control kt-select2" id="select_assistedtest" name="selected_assistedtest[]" multiple="multiple">

                        </select>

                    </div>
                </div>
                <div class="kt-portlet__foot" style="float:right">
                    <div class="kt-form__actions">
                        <div class="row justify-content-end">
                            <button id="btn_submit" class="btn btn-success float-left">Simpan</button>&nbsp;
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>

    </form>
</div>

<!-- end:: Content -->

@endsection

@section('script-bottom')

<script src="{{ asset('/') }}admin_res/plugins/ckeditor/ckeditor.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    CKEDITOR.replace('editor1', {
        customConfig: '{{ asset("/") }}admin_res/plugins/ckeditor/config.js'
    });

    var btn_submit = $('#btn_submit');
    btn_submit.click(function(e){
        e.preventDefault();
        CKEDITOR.instances.editor1.updateElement();
        KTApp.progress(btn_submit);
        $.ajax({
            url: '{{ route("srv_admin.announcement.update",$announcement->uuid) }}',
            method: 'post',
            data: $('#kt_form').serialize(),
            success: function(response){
                $('.invalid-feedback').text('');
                if($.isEmptyObject(response.error)){
                    swal.fire({
                        "title": "Berhasil diperbaharui",
                        "html": "Pengumuman berhasil diperbaharui",
                        "type": "success",
                        "confirmButtonClass": "btn btn-primary",
                        cancelButtonClass: "btn btn-secondary",
                        showCancelButton: false,
                        allowOutsideClick: false,
                        confirmButtonText: "OK",
                        cancelButtonText: "@lang('general.msg-success-ok-btn')",
                    });
                }else{
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
            error: function(xhr, status, error){
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        }).done(function(){
            KTApp.unprogress(btn_submit);
        });
    });


    $(document).ready(function() {
        var send_to_all = $('input[name="send_to_all"]');
        var send_to_elearning = $('input[name="send_to_elearning"]');
        var send_to_assistedtest = $('input[name="send_to_assistedtest"]');
        var send_to_role = $('input[name="send_to_role"]');
        var re_notify = $('input[name="re_notify"]');
        var c_role = $('#c_role');
        var c_learning = $('#c_learning');
        var c_assistedtest = $('#c_assistedtest');
        // var s_role = $


        send_to_all.prop('disabled', true);
        send_to_all.parents().addClass('kt-checkbox--disabled');
        send_to_elearning.prop('disabled', true);
        send_to_elearning.parents().addClass('kt-checkbox--disabled');
        send_to_assistedtest.prop('disabled', true);
        send_to_assistedtest.parent().addClass('kt-checkbox--disabled');
        send_to_role.prop('disabled', true);
        send_to_role.parent().addClass('kt-checkbox--disabled');


        re_notify.change(function(){
            if(re_notify.is(':checked')){
                send_to_all.prop('disabled',false);
                send_to_all.parents().removeClass('kt-checkbox--disabled');

                send_to_elearning.prop('disabled', false);
                send_to_elearning.parents().removeClass('kt-checkbox--disabled');
                send_to_elearning.prop('checked', false);

                send_to_assistedtest.prop('disabled', false);
                send_to_assistedtest.parent().removeClass('kt-checkbox--disabled');
                send_to_assistedtest.prop('checked', false);

                send_to_role.prop('disabled', false);
                send_to_role.parent().removeClass('kt-checkbox--disabled');
                send_to_role.prop('checked', false);

                send_to_role.trigger('change');
                send_to_elearning.trigger('change');
                send_to_assistedtest.trigger('change');

            }else{
                send_to_all.prop('disabled',true);
                send_to_all.parents().addClass('kt-checkbox--disabled');
                send_to_all.prop('checked',false);

                send_to_elearning.prop('disabled', true);
                send_to_elearning.parents().addClass('kt-checkbox--disabled');
                send_to_elearning.prop('checked', false);

                send_to_assistedtest.prop('disabled', true);
                send_to_assistedtest.parent().addClass('kt-checkbox--disabled');
                send_to_assistedtest.prop('checked', false);

                send_to_role.prop('disabled', true);
                send_to_role.parent().addClass('kt-checkbox--disabled');
                send_to_role.prop('checked', false);

                send_to_role.trigger('change');
                send_to_elearning.trigger('change');
                send_to_assistedtest.trigger('change');
            }
        });


        send_to_all.change(function() {
            if (send_to_all.is(':checked')) {
                send_to_elearning.prop('disabled', true);
                send_to_elearning.parents().addClass('kt-checkbox--disabled');
                send_to_elearning.prop('checked', false);

                send_to_assistedtest.prop('disabled', true);
                send_to_assistedtest.parent().addClass('kt-checkbox--disabled');
                send_to_assistedtest.prop('checked', false);

                send_to_role.prop('disabled', true);
                send_to_role.parent().addClass('kt-checkbox--disabled');
                send_to_role.prop('checked', false);

                send_to_role.trigger('change');
                send_to_elearning.trigger('change');
                send_to_assistedtest.trigger('change');
            } else {
                send_to_elearning.prop('disabled', false);
                send_to_elearning.parents().removeClass('kt-checkbox--disabled');

                send_to_assistedtest.prop('disabled', false);
                send_to_assistedtest.parent().removeClass('kt-checkbox--disabled');

                send_to_role.prop('disabled', false);
                send_to_role.parent().removeClass('kt-checkbox--disabled');
            }
        });


        send_to_role.change(function() {
            if (send_to_role.is(':checked')) {
                c_role.fadeIn('fast');
                $('#select_role').select2({
                    placeholder: "Semua tipe",
                });
            } else {
                $('#select_role').val(null).trigger('change');
                c_role.fadeOut('fast');
            }
        });

        send_to_elearning.change(function() {
            if (send_to_elearning.is(':checked')) {
                c_learning.fadeIn('fast');

                var search_learning = '{{ route("srv_admin.announcement.get.notifiable") }}';

                $('#select_learning').select2({
                    placeholder: "Semua E-Learning",
                    closeOnSelect: false,
                    ajax: {
                        url: search_learning,
                        type: "post",
                        dataType: 'json',
                        delay: 1000,
                        data: function(params) {
                            return {
                                searchTerm: params.term, // search term
                                typeSearch: 'elearning',
                            };
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            };
                        },
                        error: function(xhr, status, error) {
                            // var err = eval("(" + xhr.responseText + ")");
                            console.log(xhr.responseText);
                            console.log(status);
                            console.log(error);

                        },
                        cache: true
                    }
                });
            } else {
                $('#select_learning').val(null).trigger('change');
                c_learning.fadeOut('fast');
            }
        });

        send_to_assistedtest.change(function() {
            if (send_to_assistedtest.is(':checked')) {
                c_assistedtest.fadeIn('fast');

                var search_assisted = '{{ route("srv_admin.announcement.get.notifiable") }}';

                $('#select_assistedtest').select2({
                    placeholder: "Semua Assisted Test",
                    closeOnSelect: false,
                    ajax: {
                        url: search_assisted,
                        type: "post",
                        dataType: 'json',
                        delay: 1000,
                        data: function(params) {
                            return {
                                searchTerm: params.term, // search term
                                typeSearch: 'assistedtest',
                            };
                        },
                        processResults: function(response) {
                            return {
                                results: response
                            };
                        },
                        error: function(xhr, status, error) {
                            // var err = eval("(" + xhr.responseText + ")");
                            console.log(xhr.responseText);
                            console.log(status);
                            console.log(error);

                        },
                        cache: true
                    }
                });
            } else {
                $('#select_assistedtest').val(null).trigger('change');
                c_assistedtest.fadeOut('fast');
            }
        })
    })
</script>
@endsection
