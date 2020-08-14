@extends('pages.srv_admin.assisted_test.manage-single')


@section('manage')
<?php
$is_unlimited_users = '';
$max_user = 'block';
$max_user_int = $exam->max_users;
$share_link = '';
$is_start_immediately = '';
$start_date = '';
$vstart_date = 'block';
$is_no_end_time = '';
$end_date = '';
$vend_date  = 'block';
$random_q = '';
$random_c = '';

if($exam->random_q == 1) {$random_q = 'checked';}
if($exam->random_c == 1) {$random_c = 'checked';}

if ($exam->is_unlimited_users == 1) {
    $is_unlimited_users = 'checked';
    $max_user = 'none';
    $max_user_int = 50;
}

if ($exam->is_share_link == 1)  {
    $share_link = 'checked';
}

if ($exam->is_no_end_time == 1) {
    $is_no_end_time = 'checked';
    $vend_date = 'none';
}
?>
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet" id="form-wrapper">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">@lang('assisted_test.tab-2') <small>@lang('assisted_test.tab-2-sub-up')</small></h3>
                    </div>

                </div>
                <form class="kt-form " id="kt_form">
                    <div class="kt-portlet__body kt-wizard-v4__content">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="row">

                                    <div class="col-lg-9 col-xl-6">
                                        <h3 style="visibility:show" class="kt-section__title kt-section__title-sm">@lang('assisted_test.tab-2-title-3')</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label style="display:block">@lang('assisted_test.tab-2-f-11')</label>
                                            <input name="random_q" data-switch="true" type="checkbox" data-on-text="Ya" data-handle-width="70" data-off-text="Tidak" data-on-color="success" value="1" class="form-control" {{ $random_q }}>
                                            <span class="form-text text-muted">@lang('assisted_test.tab-2-f-11-sub')</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label style="display:block">@lang('assisted_test.tab-2-f-12')</label>
                                            <input name="random_c" data-switch="true" type="checkbox" data-on-text="Ya" data-handle-width="70" data-off-text="Tidak" data-on-color="success" value="1" class="form-control" {{ $random_c }}>
                                            <span class="form-text text-muted">@lang('assisted_test.tab-2-f-12-sub')</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label style="display:block" for="">@lang('assisted_test.tab-2-f-13')</label>
                                            <input class="form-control" value="{{ $exam->max_time }}" min="10" type="number" name="max_time" id="">
                                            <div id="err_max_time" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            <span class="form-text text-muted">@lang('assisted_test.tab-2-f-13-sub')</span>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label style="display:block" for="">@lang('assisted_test.tab-2-f-14')</label>
                                            <select class="form-control" name="max_choices" id="">
                                                <option {{ $exam->max_choices == 2 ? 'selected':'' }} value="2">B</option>
                                                <option {{ $exam->max_choices == 3 ? 'selected':'' }} value="3">C</option>
                                                <option {{ $exam->max_choices == 4 ? 'selected':'' }} value="4">D</option>
                                                <option {{ $exam->max_choices == 5 ? 'selected':'' }} value="5">E</option>
                                                <option {{ $exam->max_choices == 6 ? 'selected':'' }} value="6">F</option>
                                            </select>
                                            <div id="err_max_choices" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            <span class="form-text text-muted">@lang('assisted_test.tab-2-f-14-sub')</span>
                                        </div>
                                    </div>
                                </div>


                                <hr>
                                <div class="row">

                                    <div class="col-lg-9 col-xl-6">
                                        <h3 style="visibility:show" class="kt-section__title kt-section__title-sm">@lang('assisted_test.tab-2-title')</h3>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>@lang('assisted_test.tab-2-f-3')</label>

                                            <input name="is_unlimited_users" data-switch="true" type="checkbox" data-on-text="Ya" data-handle-width="70" data-off-text="Tidak" data-on-color="success" value="1" class="form-control" {{ $is_unlimited_users }}>
                                            <span class="form-text text-muted">@lang('assisted_test.tab-2-f-3-sub')</span>
                                        </div>
                                    </div>

                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>@lang('assisted_test.tab-2-f-2')</label>
                                            <input name="share_link" data-switch="true" type="checkbox" data-on-text="Ya" data-handle-width="70" data-off-text="Tidak" data-on-color="success" value="1" class="form-control" {{ $share_link }}>
                                            <span class="form-text text-muted">@lang('assisted_test.tab-2-f-2-sub')</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6" id="fm_max_user" style="display: {{ $max_user }}">
                                        <div class="form-group">
                                            <label>@lang('assisted_test.tab-2-f-4')</label>
                                            <input type="number" class="form-control" value="{{ $max_user_int }}" name="max_user" placeholder="">
                                            <span class="form-text text-muted">@lang('assisted_test.tab-2-f-3-sub')</span>
                                        </div>
                                    </div>
                                </div>
                                <hr style="margin-top:20px">
                                <div class="row">
                                    <div class="col-lg-9 col-xl-6">
                                        <h3 style="visibility:show" class="kt-section__title kt-section__title-sm">@lang('assisted_test.tab-2-title-2')</h3>
                                    </div>
                                </div>
                                <!-- TANGGAL MULAI -->
                                <div class="row" id="fm_start_time">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>@lang('assisted_test.tab-2-f-5')</label>
                                            <div class="input-group date">

                                                <input readonly value="{{ Carbon\Carbon::parse($exam->start_date)->format('Y-m-d H:i') }}" name="start_date" type="text" class="form-control" id="start_date" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar glyphicon-th"></i>
                                                    </span>
                                                </div>
                                                <div id="start_date" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            </div>
                                            <span class="form-text text-muted">@lang('assisted_test.tab-2-f-5-sub')</span>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>@lang('assisted_test.tab-2-f-9')</label>
                                            <input name="is_no_end_time" data-switch="true" type="checkbox" data-on-text="Ya" data-handle-width="70" data-off-text="Tidak" data-on-color="success" value="1" class="form-control" {{ $is_no_end_time }}>
                                            <span class="form-text text-muted">@lang('assisted_test.tab-2-f-9-sub')</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- YES NO TGL MULAI N SELESAI -->
                                <div class="row">
                                   <!-- MOVED TO TOP -->
                                </div>

                                <!-- TANGGAL SELESAI -->
                                <div class="row" id="fm_end_time" style="display:{{ $vend_date }}">
                                    <div class="col-xl-6">
                                        <div class="form-group">
                                            <label>@lang('assisted_test.tab-2-f-7')</label>
                                            <div class="input-group date">
                                                <?php
                                                $_end_date = Carbon\Carbon::parse($exam->end_date)->format('Y-m-d H:i');
                                                if($exam->is_no_end_time == 1){
                                                    $_end_date = \Carbon\Carbon::now()->addDays(1)->format('Y-m-d H:i');
                                                }
                                                ?>
                                                <input readonly value="{{ $_end_date }}" type="text" name="end_date" class="form-control" id="end_date" />
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <i class="la la-calendar glyphicon-th"></i>
                                                    </span>
                                                </div>
                                                <div id="err_end_date" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            </div>
                                            <span class="form-text text-muted">@lang('assisted_test.tab-2-f-7-sub')</span>
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

        $('input[name="is_unlimited_users"]').on('switchChange.bootstrapSwitch', function(event, state) {
            if (state == true) {
                //  alert('true');
                //  $('input[name="max_user"]').prop('disabled',true);
                $('input[name="max_user"]').val('');
                $('#fm_max_user').hide("fast", "swing");
            } else {
                //   alert('false');
                // $('input[name="max_user"]').prop('disabled',false);
                $('#fm_max_user').show("fast", "swing");
                $('input[name="max_user"]').val(50);
            }
        });
        $('input[name="is_start_immediately"]').on('switchChange.bootstrapSwitch', function(event, state) {
            if (state == true) {
                // var start_date = "{{ \Carbon\Carbon::now()->format('Y/m/d H:i') }}";
                // $('input[name="start_date"]').val(start_date);
                $('#fm_start_time').hide("fast", "swing");
            } else {
                $('#fm_start_time').show("fast", "swing");
            }
        });

        $('input[name="is_no_end_time"]').on('switchChange.bootstrapSwitch', function(event, state) {
            // var end_date = '{!! date('Y/m/d H:i') !!}';

            if (state == true) {

                $('#fm_end_time').hide("fast", "swing");

            } else {
                $('#fm_end_time').show("fast", "swing");
            }
        });

        $('input[name="is_free_course"]').on('switchChange.bootstrapSwitch', function(event, state) {
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
        var update_url = '{{ route("srv_admin.assistedtest.edit2.update",":uuid") }}';
        update_url = update_url.replace(":uuid", "{{ $exam->uuid }}");

        // See: http://malsup.com/jquery/form/#ajaxSubmit

        $('.invalid-feedback').html('').text();
        $.ajax({
            url: update_url,
            method: 'POST',
            data: $('#kt_form').serialize(),
            beforeSend:function(){
                $('.invalid-feedback').text('');
            },
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
                            // var next_loc = "{{ route('srv_admin.assistedtest.overview',':uuid') }}"
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


    $(document).ready(function() {

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
    });
</script>
<script src="{{ asset('/') }}admin_res/js/pages/crud/forms/widgets/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="{{ asset('/') }}admin_res/plugins/moment/moment-with-locales.js"></script>

@endsection
