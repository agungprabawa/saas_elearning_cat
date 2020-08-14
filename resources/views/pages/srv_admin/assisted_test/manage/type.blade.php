@extends('pages.srv_admin.assisted_test.manage-single')


@section('manage')
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet" id="form-wrapper">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">@lang('assisted_test.tab-3') <small>@lang('assisted_test.tab-3-sub-up')</small></h3>
                    </div>

                </div>
                <form class="kt-form " id="kt_form">
                    <div class="kt-portlet__body kt-wizard-v4__content">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="row">

                                    <div class="col-lg-9 col-xl-6">
                                        <h3 style="visibility:show" class="kt-section__title kt-section__title-sm">@lang('assisted_test.tab-3-title')</h3>
                                    </div>
                                </div>
                                <?php
                                    $is_free = '';
                                    $vis_free = 'block';
                                    $exam_price  = '10000';
                                    $is_private = '';

                                    if($exam->is_free == 1){
                                        $is_free ='checked';
                                        $vis_free = 'none';
                                    }else{
                                        $exam_price = $exam->exam_price;
                                    }

                                    if($exam->is_private == 1){
                                        $is_private = 'checked';
                                    }
                                ?>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label style="display:block">@lang('assisted_test.tab-3-f-1')</label>
                                            <input name="is_free" data-switch="true" type="checkbox" data-on-text="Ya" data-handle-width="70" data-off-text="Tidak" data-on-color="success" value="1" class="form-control" {{ $is_free }}>
                                            <span class="form-text text-muted">@lang('assisted_test.tab-3-f-1-sub')</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group kt-hidden">
                                            <label style="display:block">@lang('assisted_test.tab-3-f-3')</label>
                                            <input name="is_private" data-switch="true" type="checkbox" data-on-text="Ya" data-handle-width="70" data-off-text="Tidak" data-on-color="success" value="1" class="form-control" {{ $is_private }}>
                                            <span class="form-text text-muted">@lang('assisted_test.tab-3-f-3-sub')</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-xl-6" id="fm_price" style="display: {{ $vis_free }}">
                                        <div class="form-group">
                                            <label style="display:block">@lang('assisted_test.tab-3-f-2')</label>
                                            <input min="10000" step="10000" type="number" value="{{ $exam_price }}" class="form-control" name="exam_price" value="10000">
                                            <span class="form-text text-muted">@lang('assisted_test.tab-3-f-2-sub')</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot">
                        <div class="kt-form__actions">
                            <div class="row justify-content-end">

                                <button id="btn_submit" class="btn btn-success float-left">Submit</button>&nbsp;
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
<script src="{{ asset('/') }}admin_res/js/pages/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        $('input[name="is_free"]').on('switchChange.bootstrapSwitch', function(event, state) {
            if (state == true) {
                $('#fm_price').hide("fast", "swing");
            } else {
                $('#fm_price').show("fast", "swing");
            }
        })
    });
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
        var update_url = '{{ route("srv_admin.assistedtest.edit3.update",":uuid") }}';
        update_url = update_url.replace(":uuid","{{ $exam->uuid }}");

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

    cancel.on('click',function(e){
        e.preventDefault();
        KTApp.progress(cancel);
        KTApp.block($('#form-wrapper'));
        location.reload(true);
    });
</script>
@endsection
