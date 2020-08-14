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
                                <input type="hidden" name="id_courses" value="{{ $courses->id_courses }}">
                                <div class="row">

                                    <div class="col-lg-9 col-xl-6">
                                        <h3 style="visibility:hidden" class="kt-section__title kt-section__title-sm">
                                            @lang('courses.tab-3-title')</h3>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('courses.teach-create-f-1')</label>
                                    <input name="title" class="form-control">
                                    <div id="err_title" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    <span class="form-text text-muted">@lang('courses.teach-create-f-1-sub')</span>
                                </div>
                                <div class="form-group">
                                    <label>@lang('courses.teach-create-f-2')</label>
                                    <textarea type="text" name="description" id="editor1"></textarea>
                                    <div id="err_description" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    <span class="form-text text-muted">@lang('courses.teach-create-f-2-sub')</span>
                                </div>
                                <div class="row" style="align-items: center;">
                                    <div class="col-xl-8">
                                        <div class="form-group">
                                            <label>@lang('courses.teach-create-f-3')</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder" data-realpath="real_path" class="custom-file-label">
                                                        <i class="fa fa-picture-o "></i>
                                                    </a>
                                                </span>
                                                <input id="thumbnail" class="form-control" type="text" name="filepath">
                                                <input id="real_path" type="hidden" name="main_file_path">
                                                <div id="main_file_path" class="invalid-feedback" style="display:block; font-size:14px">
                                                </div>
                                            </div>
                                            <span class="form-text text-muted">@lang('courses.teach-create-f-3-sub')</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 kt-hidden" >
                                        <div class="form-group" style="display: table-cell; vertical-align: middle;">
                                            <label id="lb_allow_download" class="kt-checkbox kt-checkbox--bold kt-checkbox--brand">
                                                <input type="checkbox" id="allow_download" name="allow_download" value="1" checked> @lang('courses.teach-create-f-4')
                                                <span></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div id="holder" style=""></div>
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
<script>
    CKEDITOR.replace('editor1', {
        customConfig: '{{ asset("/") }}admin_res/plugins/ckeditor/config.js'
    });
    // var desc = ;
    // CKEDITOR.instances.editor1.setData("");
</script>
{{-- <script src="{{ asset('/') }}vendor/laravel-filemanager/js/stand-alone-button.js"></script>--}}

<script>
    (function($) {

        $.fn.filemanager = function(type, options) {
            type = type || 'file';

            this.on('click', function(e) {
                var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
                var target_input = $('#' + $(this).data('input'));
                var target_preview = $('#' + $(this).data('preview'));
                var target_real_path = $('#' + $(this).data('realpath'));
                window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
                window.SetUrl = function(items) {
                    var file_path = items.map(function(item) {
                        return item.url;
                    }).join(',');

                    var f_p = file_path;
                    // alert(file_path);
                    var splt = f_p.split("/");
                    // var file_type = (splt[splt.length - 1]).split(".");


                    $.post( "{{ route('validation.file') }}", { url_path: file_path, _token:$('meta[name="csrf-token"]').attr('content') })
                    .done(function( data ) {
                        if(data.status == 0){
                            $("#allow_download").prop("checked", true);
                            $("#allow_download").prop("disabled", true);
                            $("#lb_allow_download").addClass("kt-checkbox--disabled");
                        }else{
                            $("#allow_download").prop("disabled", false);
                            $("#lb_allow_download").removeClass("kt-checkbox--disabled");
                        }
                    });


                    // var file_array = ['pdf', 'mp3', 'mp4', 'ogg', 'jpg', 'png','jpg'];
                    // var is_avail = jQuery.inArray(file_type[file_type.length - 1].toLowerCase(), file_array);


                    // set the value of the desired input to image url
                    target_input.val('').val(splt[splt.length - 1]).trigger('change');
                    target_real_path.val('').val(file_path).trigger('change');
                    // clear previous preview
                    target_preview.html('');

                    // set or change the preview image src
                    items.forEach(function(item) {
                        target_preview.append(
                            $('<img>').css('height', '5rem').attr('src', item.thumb_url)
                        );
                    });

                    // trigger change event
                    target_preview.trigger('change');
                };
                return false;
            });
        }

    })(jQuery);
</script>
<script>
    $('#lfm').filemanager('file');
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
        var update_url = '{{ route("srv_admin.courses.teach.store",":uuid") }}';
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
                            // var next_loc = "{{ route('srv_admin.courses.manage',':uuid') }}"
                            // next_loc = next_loc.replace(":uuid", response.uuid);
                            // window.location.replace(next_loc);
                            location.reload(true);
                            // swal.close();
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            var urls = '{{ route("srv_admin.courses.teach",":uuid") }}';
                            urls = urls.replace(":uuid","{{ $courses->uuid }}");
                            window.location.replace(urls);
                        }
                    });
                } else {
                    KTApp.unprogress(btn);
                    KTApp.unblock($('#form-wrapper'));

                    for (let [key, value] of Object.entries(response.error)) {
                        var errors = $('#err_'+key);
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
</script>
@endsection
