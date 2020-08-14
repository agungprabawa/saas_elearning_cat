@extends('pages.srv_admin.elearning.manage-single')


@section('manage')
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet" id="form-wrapper">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">@lang('courses.tab-1') <small>@lang('courses.tab-1-sub-up')</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar kt-hidden">
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
                                <div class="row">
                                    <label class="col-xl-3"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 style="visibility:hidden" class="kt-section__title kt-section__title-sm">Customer Info:</h3>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>@lang('courses.tab-1-f-1')</label>
                                    <input type="text" class="form-control" name="ctitle" value="{{ $courses->title }}">
                                    <div id="err_ctitle" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    <span class="form-text text-muted">@lang('courses.tab-1-f-1-sub')</span>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>@lang('courses.tab-1-f-2')</label>
                                            <select id="categorys" type="text" class="form-control" name="ccategory">
                                                <option {{ ($courses->category == 0) ? 'selected':'' }} value="0">@lang('courses.str-select-0')</option>
                                                @foreach ($coursesCategory as $item)
                                                <option {{ ($courses->category == $item->id_category ) ? 'selected':'' }} value="{{ $item->id_category }}">{{ $item->category }}</option>
                                                @endforeach
                                            </select>
                                            <span class="form-text text-muted">@lang('courses.tab-1-f-2-sub')</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>@lang('courses.tab-1-f-3')</label>
                                    <textarea type="text" name="cdesc" id="editor1">{!! $courses->descriptions !!}</textarea>
                                    <div id="err_cdesc" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    <span class="form-text text-muted">@lang('courses.tab-1-f-3-sub')</span>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>@lang('courses.tab-1-f-4')</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="custom-file-label">
                                                        <i class="fa fa-picture-o "></i> @lang('courses.tab-1-f-4-placeholder')
                                                    </a>
                                                </span>
                                                <input id="thumbnail" class="form-control" type="text" value="{{ $courses->cover_img_url }}" name="filepath">
                                                <div id="err_filepath" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            </div>
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
        KTApp.block($('#form-wrapper'));
        var update_url = '{{ route("srv_admin.courses.edit1.update",":uuid") }}';
        update_url = update_url.replace(":uuid","{{ $courses->uuid }}");

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
                        showCancelButton: false,
                        allowOutsideClick: false,
                        confirmButtonText: "OK",
                        cancelButtonText: "@lang('general.msg-success-ok-btn')",
                    }).then((result) => {
                        if (result.value) {
                            // var next_loc = "{{ route('srv_admin.courses.manage',':uuid') }}"
                            // next_loc = next_loc.replace(":uuid", response.uuid);
                            // window.location.replace(next_loc);
                            location.reload(true);
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

    cancel.on('click',function(e){
        e.preventDefault();
        KTApp.progress(cancel);
        KTApp.block($('#form-wrapper'));
        location.reload(true);
    });
</script>
@endsection
