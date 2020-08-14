@extends('pages.srv_admin.elearning.manage-single')

@section('other-css')
<style>
    .custom-file-label {
        background-color: transparent !important;
    }
</style>
@endsection

@section('manage')
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet" id="form-wrapper">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">@lang('courses.teach-create-form-title')
                            <small>@lang('courses.teach-create-form-sub')</small></h3>
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
                                            <span class="kt-nav__section-text">Export Tools</span>
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
                <form class="kt-form " id="kt_form">
                    <div class="kt-portlet__body kt-wizard-v4__content">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                {{-- <input type="hidden" name="id_courses" value="{{ $courses->id_courses }}"> --}}
                                <input type="hidden" name="id_task" value="{{ $task->id_task }}">
                                <div class="row">

                                    <div class="col-lg-9 col-xl-6">
                                        <h3 style="visibility:hidden" class="kt-section__title kt-section__title-sm">
                                            @lang('courses.tab-3-title')</h3>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Judul Tugas</label>
                                    <input name="title" value="{{ $task->title }}" class="form-control">
                                    <div id="err_title" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    {{-- <span class="form-text text-muted">@lang('courses.teach-create-f-1-sub')</span> --}}
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Tugas</label>
                                    <textarea type="text" name="content" id="editor1">{!! $task->content !!}</textarea>
                                    <div id="err_content" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    {{-- <span class="form-text text-muted">@lang('courses.teach-create-f-2-sub')</span> --}}
                                </div>

                                <hr>

                                <!-- TANGGAL MULAI -->
                                <div class="row" id="fm_start_time">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>@lang('assisted_test.tab-2-f-5')</label>
                                            <div class="input-group date">
                                                <input readonly value="{{ \Carbon\Carbon::parse($task->start_at) }}" name="start_date" type="text" class="form-control" id="start_date" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar glyphicon-th"></i>
                                                    </span>
                                                </div>
                                                <div id="err_start_date" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            </div>
                                            {{-- <span class="form-text text-muted">@lang('assisted_test.tab-2-f-5-sub')</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>@lang('assisted_test.tab-2-f-9')</label>
                                            <input name="is_no_end_time" 
                                                data-switch="true" type="checkbox" 
                                                data-on-text="Ya" 
                                                data-handle-width="70" 
                                                data-off-text="Tidak" 
                                                data-on-color="success" 
                                                value="1" 
                                                class="form-control"
                                                {{ ($task->end_at == '') ? 'checked':'' }}
                                                >
                                            {{-- <span class="form-text text-muted">@lang('assisted_test.tab-2-f-9-sub')</span> --}}
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row" 
                                    id="fm_end_time" 

                                    style="display:{{ ($task->end_at == '') ? 'none' : '' }}"

                                    >
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>@lang('assisted_test.tab-2-f-7')</label>
                                            <div class="input-group date">
                                                <input readonly 
                                                value="{{ ($task->end_at == '') ? '':\Carbon\Carbon::parse($task->end_at) }}" type="text" name="end_date" 
                                                class="form-control" 
                                                id="end_date" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar glyphicon-th"></i>
                                                    </span>
                                                </div>
                                                <div id="err_end_date" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            </div>
                                            {{-- <span class="form-text text-muted">@lang('assisted_test.tab-2-f-7-sub')</span> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="align-items: center;">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>Maksimal mengirimkan jawaban</label>
                                            <input class="form-control" type="number" name="max_submit" min="0" value="{{ $task->max_submit }}" id="">
                                            <span class="form-text text-muted">Maksimal submit / pengiriman jawaban oleh user, <strong> 0 untuk tanpa batasan </strong></span>
                                            <div id="err_max_submit" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row justify-content-end">

                                <button id="btn_submit" class="btn btn-success float-left">@lang('general.btn-save')</button>&nbsp;
                                <button id="btn_cancel" class="btn btn-secondary">@lang('general.btn-cancel')</button>

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
@section('other-script')

<script src="{{ asset('/') }}admin_res/plugins/ckeditor/ckeditor.js"></script>
<script src="{{ asset('/') }}admin_res/js/pages/crud/forms/widgets/bootstrap-switch.js"
           type="text/javascript"></script>
<script src="{{ asset('/') }}admin_res/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js"
type="text/javascript"></script>
<script src="{{ asset('/') }}admin_res/plugins/moment/moment-with-locales.js"></script>
<script>
    CKEDITOR.replace('editor1', {
        customConfig: '{{ asset("/") }}admin_res/plugins/ckeditor/config.js'
    });
    // var desc = ;
    // CKEDITOR.instances.editor1.setData("");
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
        KTApp.block($('#form-wrapper'));
        var update_url = '{{ route("srv_admin.courses.task.update",":uuid") }}';
        update_url = update_url.replace(":uuid", "{{ $courses->uuid }}");


        // See: http://malsup.com/jquery/form/#ajaxSubmit
        CKEDITOR.instances.editor1.updateElement();
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
                        showCancelButton: true,
                        allowOutsideClick: false,
                        confirmButtonText: "@lang('courses.teach-create-btn-1')",
                        cancelButtonText: "@lang('courses.teach-create-btn-2')",
                    }).then((result) => {
                        if (result.value) {
                            
                            location.reload(true);
                            // swal.close();
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            var urls = '{{ route("srv_admin.courses.task",":uuid") }}';
                            urls = urls.replace(":uuid", "{{ $courses->uuid }}");
                            window.location.replace(urls);
                        }
                    });
                } else {
                    KTApp.unprogress(btn);
                    KTApp.unblock($('#form-wrapper'));

                    console.log(response);
                    var error_data = {};

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
        KTApp.block($('#form-wrapper'));
        location.reload(true);
    });


    $(document).ready(function(){
        $('#start_date').datetimepicker({
            todayHighlight: true,
            startDate: '-0d',
            autoclose: true,
            pickerPosition: 'top-left',
            todayBtn: true,
            format: 'yyyy-mm-dd hh:ii'
        });

        $('#end_date').datetimepicker({
            todayHighlight: true,
            startDate: '-0d',
            autoclose: true,
            pickerPosition: 'top-left',
            todayBtn: false,
            format: 'yyyy-mm-dd hh:ii'
        });


        $('input[name="is_start_immediately"]').on('switchChange.bootstrapSwitch', function (event, state) {
            if (state == true) {
                // var start_date = "{{ \Carbon\Carbon::now()->format('Y/m/d H:i') }}";
                // $('input[name="start_date"]').val(start_date);
                $('#fm_start_time').hide("fast", "swing");
            } else {
                $('#fm_start_time').show("fast", "swing");
            }
        });

        $('input[name="is_no_end_time"]').on('switchChange.bootstrapSwitch', function (event, state) {
            // var end_date = '{!! date('Y/m/d H:i') !!}';

            if (state == true) {

                $('#fm_end_time').hide("fast", "swing");

            } else {
                $('#fm_end_time').show("fast", "swing");
            }
        });
    })
</script>
@endsection