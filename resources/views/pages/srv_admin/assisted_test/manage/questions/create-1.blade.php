@extends('pages.srv_admin.assisted_test.manage-single')

@section('other-css')
<style>
    .custom-file-label {
        background-color: transparent !important;
    }
    .rmaftermargin::after{
        margin:0px !important
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
                        <h3 class="kt-portlet__head-title">@lang('assisted_test.teach-create-form-title')
                            <small>@lang('assisted_test.teach-create-form-sub')</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @lang('assisted_test.btn-quest-type')
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <!-- <li class="kt-nav__section kt-nav__section--first">
                                            <span class="kt-nav__section-text">Export Tools</span>
                                        </li> -->
                                        <li class="kt-nav__item">
                                            <a href="?type=2" class="kt-nav__link">
                                                <!-- <i class="kt-nav__link-icon la la-print"></i> -->
                                                <span class="kt-nav__link-text">@lang('assisted_test.btn-quest-2')</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="?type=3" class="kt-nav__link">
                                                <!-- <i class="kt-nav__link-icon la la-copy"></i> -->
                                                <span class="kt-nav__link-text">@lang('assisted_test.btn-quest-3')</span>
                                            </a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="kt-form " action="{{ route('srv_admin.assistedtest.questions.store',$exam->uuid) }}" id="kt_form">
                    <input type="hidden" name="questType" value="1">
                    <div class="kt-portlet__body kt-wizard-v4__content">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                {{-- <input type="hidden" name="id_courses" value="{{ $exam->id_courses }}"> --}}
                                <div class="row">

                                    <div class="col-lg-9 col-xl-6">
                                        <h3 style="visibility:hidden" class="kt-section__title kt-section__title-sm">
                                            @lang('assisted_test.tab-3-title')</h3>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>@lang('assisted_test.teach-create-f-2')</label>
                                    <textarea type="text" name="question_text" id="editor1"></textarea>
                                    <div class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    <span class="form-text text-muted">@lang('assisted_test.teach-create-f-2-sub')</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>@lang('assisted_test.qtn-c-f2')</label>
                                            <input value="1" type="number" name="q_score" min="1" class="form-control">
                                            <div class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            <span class="form-text text-muted">@lang('assisted_test.qtn-c-f2-sub')</span>
                                        </div>
                                    </div>
                                </div>

                                <?php
                                $azRange = range('A', 'Z');
                                ?>
                                <label>@lang('assisted_test.qtn-c-f1')</label>
                                <span class="form-text text-muted">@lang('assisted_test.qtn-c-f1-sub')</span>
                                <br>
                                @for ($i = 0; $i < $exam->max_choices; $i++)
                                    <?php
                                    $key1 = Str::random(7);
                                    $key2 = $i;
                                    $key = str_shuffle($key1 . $key2 . time());

                                    ?>
                                    <div class="row">
                                        <div class="col-md-1">
                                            <div class="kt-radio-inline">
                                                <label class="kt-radio">
                                                    <input type="hidden" name="randkey[]" value="{{ $key }}">
                                                    <input type="radio" value="{{ $key }}" name="answer" {{ ($i == 0) ? 'checked':'' }}>
                                                    <span></span>
                                                </label>

                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <textarea type="text" name="optiontext[]" class="form-control" id=""></textarea>
                                                {{-- <textarea type="text" name="{{ strtolower($key) }}" class="form-control" id=""></textarea> --}}
                                            </div>
                                        </div>
                                    </div>
                                    @endfor

                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row justify-content-end">

                                <!-- <button id="btn_submit" class="btn btn-success float-left">@lang('general.btn-save')</button>&nbsp;
                                <button id="btn_cancel" class="btn btn-secondary">@lang('general.btn-cancel')</button> -->
                                <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

                                    <div class="btn-group" role="group">
                                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle rmaftermargin" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                            <button class="btn_selector dropdown-item" id="btn_submit_done">@lang('general.btn-save-done')</button>

                                        </div>
                                    </div>
                                    <button id="btn_submit" type="button" class="btn_selector btn btn-success">@lang('general.btn-save-add')</button>
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
@section('other-script')

<script src="{{ asset('/') }}admin_res/plugins/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor1', {
        customConfig: '{{ asset("/") }}admin_res/plugins/ckeditor/config-question.js'
    });
    // var desc = ;
    // CKEDITOR.instances.editor1.setData("");
</script>
{{-- <script src="{{ asset('/') }}vendor/laravel-filemanager/js/stand-alone-button.js"></script>--}}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    // var btn = $('#btn_submit');
    var btn = $('.btn_selector');
    var btn2 = $('#btn_submit_done');
    var cancel = $('#btn_cancel');

    btn.on('click', function(e) {
        e.preventDefault();

        KTApp.progress(btn);
        KTApp.block($('#form-wrapper'));
        var update_url = '{{ route("srv_admin.assistedtest.questions.store",":uuid") }}';
        update_url = update_url.replace(":uuid", "{{ $exam->uuid }}");


        // See: http://malsup.com/jquery/form/#ajaxSubmit
        CKEDITOR.instances.editor1.updateElement();
        $('.invalid-feedback').html('').text();
        $.ajax({
            url: update_url,
            method: 'POST',
            data: $('#kt_form').serialize(),
            success: function(response) {
                // console.log(response);
                // return false;
                if ($.isEmptyObject(response.error)) {
                    var redirect_url = ""
                    // location.reload(true);
                    var btn_type = e.target.id;
                    if(btn_type == 'btn_submit'){
                        window.location.replace("{{ route('srv_admin.assistedtest.questions.create',$exam->uuid) }}")
                    }else{
                        window.location.replace("{{ route('srv_admin.assistedtest.questions',$exam->uuid) }}")
                    }

                } else {
                    KTApp.unprogress(btn);
                    KTApp.unblock($('#form-wrapper'));

                    console.log(response);
                    var error_data = {};

                    for (let [key, value] of Object.entries(response.error)) {
                        error_data[key] = value;


                        // $('<div class="invalid-feedback" style="display:block; font-size:14px">'+value.toString().replace(key,'Informasi ')+'</div>').insertAfter($('input[name="'+ key +'"]'));

                        $('input[name="' + key + '"]').siblings('.invalid-feedback').text(value.toString().replace(key, 'Informasi '));
                    }
                    swal.fire({
                        "title": "@lang('assisted_test.msg-error-title')",
                        "html": "@lang('assisted_test.msg-error-content')",
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

@if(Session::has('q_saved'))
<script>
    $(document).ready(function() {
        var content = {};

        content.title = '@lang("assisted_test.msg-saved-title")';
        content.message = '@lang("assisted_test.msg-saved-content")';
        content.icon = 'icon flaticon-exclamation-2';

        $.notify(content, {
            type: 'success',
            allow_dismiss: false,
            newest_on_top: true,
            mouse_over: false,
            showProgressbar: false,
            spacing: 10,
            timer: 2000,
            placement: {
                from: 'top',
                align: 'right'
            },
            offset: {
                x: 30,
                y: 30
            },
            delay: 1000,
            z_index: 10000,
            animate: {
                enter: 'animated slideInRight',
                exit: 'animated slideOutRight'
            }
        });
    });

    $(document).ready(function() {
        $("html,body").animate({scrollTop: 0}, 400); //100ms for example
    });
</script>
@endif
@endsection
