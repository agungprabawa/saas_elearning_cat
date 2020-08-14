@extends('pages.srv_admin.assisted_test.manage-single')

@section('other-css')
    <style>
        .custom-file-label {
            background-color: transparent !important;
        }

        .rmaftermargin::after {
            margin: 0px !important
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
                            <h3 class="kt-portlet__head-title">@lang('assisted_test.form-up-title')
                                <small>@lang('assisted_test.form-up-sub-title')</small></h3>
                        </div>

                    </div>
                    <form class="kt-form "
                          id="kt_form">
                        <input type="hidden" name="questType" value="3">
                        <input type="hidden" name="id_question" value="{{ $question->id_question }}">
                        <div class="kt-portlet__body kt-wizard-v4__content">
                            <div class="kt-section kt-section--first">
                                <div class="kt-section__body">
                                    {{-- <input type="hidden" name="id_courses" value="{{ $exam->id_courses }}"> --}}
                                    <div class="row">

                                        <div class="col-lg-9 col-xl-6">
                                            <h3 style="visibility:hidden"
                                                class="kt-section__title kt-section__title-sm">
                                                @lang('assisted_test.tab-3-title')</h3>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('assisted_test.teach-create-f-2')</label>
                                        <textarea type="text" name="question_text"
                                                  id="editor1">{{ $question->question }}</textarea>
                                        <div class="invalid-feedback" style="display:block; font-size:14px"></div>
                                        <span
                                            class="form-text text-muted">@lang('assisted_test.teach-create-f-2-sub')</span>
                                    </div>
                                    <br>
                                    <label>@lang('assisted_test.qtn-c-f4')</label>
                                    <span class="form-text text-muted">@lang('assisted_test.qtn-c-f4-sub')</span>
                                    <br>
                                    <div class="form-group">
                                        <textarea type="text" name="answer"
                                                  id="editor2">{{ $question->answer }}</textarea>
                                        <div class="invalid-feedback" style="display:block; font-size:14px"></div>
                                        <span
                                            class="form-text text-muted">@lang('assisted_test.qtn-c-f4-sub')</span>
                                    </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>@lang('assisted_test.qtn-c-f2')</label>
                                                <input value="{{ $question->score }}" type="number" name="q_score"
                                                       min="1"
                                                       class="form-control">
                                                <div class="invalid-feedback"
                                                     style="display:block; font-size:14px"></div>
                                                <span
                                                    class="form-text text-muted">@lang('assisted_test.qtn-c-f2-sub')</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row justify-content-end">

                                    <button id="btn_submit"
                                            class="btn btn-success float-left">@lang('general.btn-save')</button>&nbsp;
                                    <button id="btn_cancel"
                                            class="btn btn-secondary">@lang('general.btn-cancel')</button>
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
        CKEDITOR.replace('editor2', {
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
        var btn = $('#btn_submit');
        var btn_cancel = $('#btn_cancel');

        btn.on('click', function (e) {
            e.preventDefault();

            KTApp.progress(btn);
            KTApp.block($('#form-wrapper'));
            var update_url = '{{ route("srv_admin.assistedtest.questions.update",":uuid") }}';
            update_url = update_url.replace(":uuid", "{{ $exam->uuid }}");


            // See: http://malsup.com/jquery/form/#ajaxSubmit
            CKEDITOR.instances.editor1.updateElement();
            CKEDITOR.instances.editor2.updateElement();
            $('.invalid-feedback').html('').text();
            $.ajax({
                url: update_url,
                method: 'POST',
                data: $('#kt_form').serialize(),
                success: function (response) {
                    // console.log(response);
                    // return false;
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
                                // var next_loc = "{{ route('srv_admin.assistedtest.overview',':uuid') }}"
                                // next_loc = next_loc.replace(":uuid", response.uuid);
                                // window.location.replace(next_loc);
                                location.reload(true);
                            }
                        });

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
                error: function (xhr, status, error) {
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

        btn_cancel.on('click', function (e) {
            e.preventDefault();
            KTApp.progress(cancel);
            KTApp.block($('#form-wrapper'));
            location.reload(true);
        });
    </script>
@endsection
