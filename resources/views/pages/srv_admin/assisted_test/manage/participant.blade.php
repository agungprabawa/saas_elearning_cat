@extends('pages.srv_admin.assisted_test.manage-single')

@section('other-css')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

<!--end::Page Vendors Styles -->
@endsection

@section('manage')
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet" id="form-wrapper">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">@lang('participant.title')
                            <small>@lang('participant.sub-title')</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <button data-toggle="modal" data-target="#kt_select2_modal" data-backdrop="static" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                @lang('participant.btn-enroll')
                            </button>

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                {{-- <th>@lang('users.tb-h-1')</th> --}}
                                <th>@lang('assisted_test.prt-h1')</th>
                                <th>@lang('assisted_test.prt-h2')</th>
                                <th>@lang('assisted_test.prt-h3')</th>
{{--                                <th>@lang('users.tb-h-5')</th>--}}
                                <th>@lang('users.tb-h-6')</th>

                            </tr>
                        </thead>
                    </table>
                    <!--end: Datatable -->
                </div>

            </div>
        </div>
    </div>
</div>

<!--End:: App Content-->

<!--begin::Modal-->
<div class="modal fade" id="kt_select2_modal" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document" data-backdrop="static">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">Tambahkan Partisipan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>
            <form id="kt_form" class="kt-form kt-form--fit kt-form--label-right">
                <div class="modal-body">

                    <div class="form-group row">
                        <label>@lang('participant.md-users-select')</label>
                        <select class="form-control kt-select2" id="kt_select2_3_modal" name="selected_users[]" multiple="multiple">

                        </select>
                        <div id="err_selected_users" class="invalid-feedback" id="err_selected_users" style="display:block; font-size:14px"></div>
                    </div>

                    <div class="form-group row" style="margin-bottom: 5px">
                        <a id="btn_adv_option" href="#" style="color: #646c9a"><strong> Opsi Advanced <li class="fas fa-chevron-down"></li></strong> </a>
                    </div>

                    <div id="adv_option" class="row" style="display:none">
                        <div class="form-group" style="width:100%">
                            <label>Pilih dari E-Learning: </label>
                            <select class="form-control kt-select2" id="kt_elearning_select" name="selected_elearning[]" multiple="multiple">

                            </select>
                        </div>

                        <div class="form-group" style="width:100%">
                            <label>Pilih dari Assisted Test: </label>
                            <select class="form-control kt-select2" id="kt_assistedtest_select" name="selected_assistedtest[]" multiple="multiple">

                            </select>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.btn-cancel')</button>
                    <button type="button" id="btn_submit" class="btn btn-brand">@lang('general.btn-save')</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--end::Modal-->

<!--end::Modal-->
@endsection
@section('other-script')
<script>
    $('#kt_select2_modal').on('shown.bs.modal', function() {
        participantSelect2Load();
        advOption();
    });

    // Function
    function participantSelect2Load() {
        var users_url = "{{ route('data.select2.users',':uuid') }}";
        users_url = users_url.replace(":uuid", "{{ $exam->uuid }}");

        // multi select
        $('#kt_select2_3_modal').select2({
            placeholder: "@lang('participant.md-users-select')",
            closeOnSelect: false,
            ajax: {
                url: users_url,
                type: "post",
                dataType: 'json',
                delay: 1000,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                        type: 'assistedtest',
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

    }

    function advOption() {
        var btn_adv_option = $('#btn_adv_option');
        var adv_option = $('#adv_option');
        var isClick = false;
        var urlOtherData = '{{ route("data.select2.groups") }}';
        btn_adv_option.click(function(e) {
            e.preventDefault();
            isClick = !isClick;
            if (isClick) {
                adv_option.show('fast', function() {
                    otherElearningSelect2Load(urlOtherData);
                    otherAssistedTestSelect2Load(urlOtherData);
                });
            } else {
                adv_option.hide('fast');
            }
        })
    }

    function otherElearningSelect2Load(url) {
        $('#kt_elearning_select').select2({
            placeholder: "Select a state",
            allowClear: true,
            closeOnSelect: false,
            ajax: {
                url: url,
                type: 'post',
                dataType: 'json',
                delay: 1000,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                        type: 'elearning',
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
    }

    function otherAssistedTestSelect2Load(url) {
        $('#kt_assistedtest_select').select2({
            placeholder: "Select a state",
            allowClear: true,
            closeOnSelect: false,
            ajax: {
                url: url,
                type: 'post',
                dataType: 'json',
                delay: 1000,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                        type: 'assistedtest',
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
    }
</script>
<script>

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

        // return console.log($('#kt_form').serialize());

        e.preventDefault();

        // See: src\js\framework\base\app.js
        KTApp.progress(btn);
        KTApp.progress($('#form-wrapper'));
        var enroll_url = '{{ route("srv_admin.assistedtest.enroll",":uuid") }}';
        enroll_url = enroll_url.replace(":uuid", "{{ $exam->uuid }}");
        // console.log($('#kt_form').serialize());

        $('.invalid-feedback').html('').text();
        $.ajax({
            url: enroll_url,
            method: 'POST',
            data: $('#kt_form').serialize(),
            success: function(response) {
                // console.log(response);
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
                            // location.reload(true);
                            table.ajax.reload();
                            KTApp.unprogress(btn);
                            KTApp.unprogress($('#form-wrapper'));

                            $('#kt_select2_3_modal').val(null).trigger('change');
                            $('#kt_elearning_select').val(null).trigger('change');
                            $('#kt_assistedtest_select').val(null).trigger('change');

                            $('#kt_select2_modal').modal('toggle');
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
<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/moment-with-locales.js"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/datetime.js"></script>
<!--end::Page Vendors -->
<script>
    var table = '';
    $(document).ready(function() {
       table = $('#kt_table_1').DataTable({
            responsive: true,
            searchDelay: 1000,
            processing: true,
            serverSide: true,
            order: [
                [3, 'asc']
            ],
            ajax: '{{ route("srv_admin.assistedtest.participants.to.json","$exam->uuid") }}',
            columns: [{
                    data: 'name',
                    name: 'users.name'
                },
                {
                    data: 'exam_start',
                    name: 'exam_participant.exam_start',

                }, {
                    data: 'final_result',
                    name: 'exam_participant.final_result',
                },
                // {
                //     data: 'status',
                //     name: 'exam_participant.status',
                //
                // },
                {
                    data: 'id',
                    name: 'users.id',
                },
            ],
            "columnDefs": [{
                    targets: 1,
                    render: $.fn.dataTable.render.moment('YYYY-MM-DD H:m:s', 'dddd D MMMM YYYY H:m:s', 'id')
                },
                // {
                //     targets: 3,
                //     render: function(data, type, full, meta) {
                //         console.log(full);
                //
                //         var status = {
                //             1: {
                //                 'title': 'Admin',
                //                 'state': 'success'
                //             },
                //             2: {
                //                 'title': 'Staf',
                //                 'state': 'primary'
                //             },
                //             3: {
                //                 'title': 'Student',
                //                 'state': 'brand'
                //             },
                //         };
                //
                //         if (typeof status[full['status']] === 'undefined') {
                //             return data;
                //         }
                //         return '<span class="kt-badge kt-badge--' + status[full['status']].state + ' kt-badge--dot"></span>&nbsp;' +
                //             '<span class="kt-font-bold kt-font-' + status[full['status']].state + '">' + status[full['status']].title + '</span>';
                //     }
                // },
                {
                    targets: 3,
                    className: "text-center",
                    sWidth: "70px",
                    orderable: false,
                    render: function(data, type, full, meta) {
                        // var str_action = `
                        //         <a href="#" onclick="deleteParticipant(':uuid',':id_user');" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                        //         <i class="la la-trash"></i>
                        //         </a>`;
                        // <span class="dropdown">
                        //         <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                        //         <i class="la la-ellipsis-h"></i>
                        //         </a>
                        //         <div class="dropdown-menu dropdown-menu-right">
                        //         <a class="dropdown-item" href="#"><i class="la la-edit"></i> Edit Details</a>
                        //     <a class="dropdown-item" href="#"><i class="la la-leaf"></i> Update Status</a>
                        //     <a class="dropdown-item" href="#"><i class="la la-print"></i> Generate Report</a>
                        //     </div>
                        //     </span>

                        let str_action_edit = `
                        <a href="{{ route('srv_admin.assistedtest.result',[$exam->uuid,':edit_id']) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="@lang('assisted_test.edt-score-3')">
                            <i class="la la-edit"></i>
                        </a>`;
                        let str_action_detele = `
                        <a href="#" onclick="deleteParticipant(':uuid',':id_user');" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                            <i class="la la-trash"></i>
                        </a>`;

                        str_action_detele = str_action_detele.replace(":id_user", full['id']).replace(":uuid", "{{ $exam->uuid }}");
                        str_action_edit = str_action_edit.replace(":edit_id", full['id']);

                        if (full['id'] == '{{ auth()->user()->id }}') {
                            return str_action_edit;
                        }

                        return str_action_edit + str_action_detele;
                    }
                }
            ]

        });
    });


    // <a href="{{ route('srv_admin.users.edit',':id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
    //                         <i class="la la-edit"></i>
    //                         </a>
</script>

<script>
    function deleteParticipant(uuid, id_user) {
        swal.fire({
            "title": "@lang('assisted_test.prt-title-del')",
            "html": "@lang('assisted_test.prt-content-del')",
            "type": "warning",
            "confirmButtonClass": "btn btn-primary",
            "cancelButtonClass": "btn btn-secondary",
            confirmButtonText: "@lang('assisted_test.prt-btn-yes')",
            cancelButtonText: "@lang('assisted_test.prt-btn-no')",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                var unenroll_url = '{{ route("srv_admin.assistedtest.delete",":uuid") }}';
                unenroll_url = unenroll_url.replace(":uuid", "{{ $exam->uuid }}");
                $.ajax({
                    url: unenroll_url,
                    method: 'post',
                    data: {
                        "id_user": id_user,
                    },
                    success: function(response) {
                        swal.fire({
                            "title": "Berhasil Dikeluarkan",
                            "html": "Partisipan berhasil dikeluarkan dari ujian",
                            "type": "success",
                            "confirmButtonClass": "btn btn-primary",
                            cancelButtonClass: "btn btn-secondary",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonText: "OK",
                            cancelButtonText: "@lang('general.msg-success-ok-btn')",
                        });
                        table.ajax.reload();
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
                                // table.ajax.reload();
                            }
                        });

                    }
                })

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {

            }
        });
    }
</script>

@endsection
