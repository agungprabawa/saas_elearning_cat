@extends('pages.srv_admin.assisted_test.manage-single')

@section('other-css')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

<!--end::Page Vendors Styles -->
<style>
    .dropdown-menu-right{
        padding:0 !important;

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
                        <h3 class="kt-portlet__head-title">@lang('assisted_test.stdn-learning-curent-Soalals') </h3>
                    </div>

                    <div class="kt-portlet__head-toolbar">

                        <div class="btn-group">
                            <a href="{{ route('srv_admin.assistedtest.questions.create',$exam->uuid) }}" type="button" class="btn btn-brand">
                                <i class="la la-plus"></i>
                                <span class="kt-hidden-mobile">@lang('assisted_test.btn-add-question')</span>
                            </a>
                            <button type="button" class="btn btn-brand dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            </button>
                            {{-- <div class="dropdown-menu dropdown-menu-right"> --}}
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="kt-nav" style="width:254px">
                                    <li class="kt-nav__item">
                                        <a href="#" data-toggle="modal" data-target="#kt_select2_modal" data-backdrop="static" class="kt-nav__link">
                                            <i class="kt-nav__link-icon flaticon-attachment"></i>
                                            <span class="kt-nav__link-text">@lang('assisted_test.btn-link-exam')</span>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                {{-- <th>@lang('users.tb-h-1')</th> --}}
                                <th>@lang('assisted_test.qtn-h1')</th>
                                <th>@lang('assisted_test.qtn-h2')</th>
                                <th>Benar</th>
                                <th>Salah</th>
                                <th>@lang('users.tb-h-6')</th>

                            </tr>
                        </thead>
                    </table>
                    <!--end: Datatable -->
                </div>

            </div>
        </div>
    </div>

    @if($externalQues->isNotEmpty())
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet" id="form-wrapper-2">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">@lang('assisted_test.link-quest') </h3>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_2">
                        <thead>
                            <tr>
                                {{-- <th>@lang('users.tb-h-1')</th> --}}
                                <th>@lang('assisted_test.from-exam')</th>
                                <th>@lang('assisted_test.picked-exam')</th>
                                <th>@lang('users.tb-h-6')</th>

                            </tr>
                        </thead>
                    </table>
                    <!--end: Datatable -->
                </div>

            </div>
        </div>
    </div>
    @endif

</div>

<!--End:: App Content-->

<!--begin::Modal-->
<div class="modal fade" id="kt_select2_modal" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document" data-backdrop="static">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">@lang('assisted_test.form-im-title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>
            <form id="kt_form" class="kt-form kt-form--fit kt-form--label-right">
                <div class="modal-body">
                    <input type="hidden" name="uuid" id="uuid">
                    <div class="form-group row">
                        <label>@lang('assisted_test.form-im-f-1')</label>
                        <select class="form-control kt-select2" id="kt_select2_3_modal" name="selected_exam">

                        </select>
                        <span class="form-text text-muted">@lang('assisted_test.form-im-f-1-sub')</span>
                    </div>
                    <div class="form-group row">
                        <label style="display:block">@lang('assisted_test.form-im-f-2')</label>
                        <input class="form-control" value="0" type="number" name="picked" id="picked">
                        <span style="text-align: justify" class="form-text text-muted">@lang('assisted_test.form-im-f-2-sub')</span>
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
<!--begin::Modal-->
<div class="modal fade" id="kt_select2_modal_2" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document" data-backdrop="static">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">@lang('assisted_test.form-im-title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>
            <form id="kt_form_edit" class="kt-form kt-form--fit kt-form--label-right">
                <div class="modal-body">
                    <input type="hidden" name="id_picked" id="id_picked">
                    <div class="form-group row">
                        <label>@lang('assisted_test.form-im-f-1')</label>

                        <input type="text" class="form-control" id="selected_exam_edit" readonly name="selected_exam_edit" id="">
                        <span class="form-text text-muted">@lang('assisted_test.form-im-f-1-sub')</span>
                    </div>
                    <div class="form-group row">
                        <label style="display:block">@lang('assisted_test.form-im-f-2')</label>
                        <input class="form-control" type="number" name="picked" id="picked_edit">
                        <span style="text-align: justify" class="form-text text-muted">@lang('assisted_test.form-im-f-2-sub')</span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('general.btn-cancel')</button>
                    <button type="button" id="btn_update" class="btn btn-brand">@lang('general.btn-save')</button>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $('#kt_select2_modal').on('shown.bs.modal', function() {
        // basic
        $('#kt_select2_1_modal').select2({
            placeholder: "Select a state"
        });

        // nested
        $('#kt_select2_2_modal').select2({
            placeholder: "Select a state"
        });

        var users_url = "{{ route('srv_admin.assistedtest.exam.search',':uuid') }}";
        users_url = users_url.replace(":uuid", "{{ $exam->uuid }}")
        // multi select
        $('#kt_select2_3_modal').select2({
            placeholder: "@lang('assisted_test.form-im-f-1')",
            closeOnSelect: true,
            ajax: {
                url: users_url,
                type: "post",
                dataType: 'json',
                delay: 1000,
                data: function(params) {
                    return {
                        searchTerm: params.term // search term
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
        $('#kt_select2_3_modal').on("select2:selecting", function(e) {
            // what you would like to happen
            // alert('select');
            var selected_data = e.params.args.data;

            console.log(e.params.args.data);

            $('#picked').val(selected_data.total_questions);
            $('#uuid').val(selected_data.uuid);
            $("#picked").attr({
                "max" : selected_data.total_questions,        // substitute your own
                "min" : 0          // values (or variables) here
            });

        });

    });

    // $('#kt_select2_modal_2').on('shown.bs.modal',function(){
    //     var url =
    //     $.get();
    // });

    $('#kt_table_2').on('click',".btn_edit",function(){
        var linked_id = ($(this).attr("data-id"));
        var linked_get = '{{ route("srv_admin.assistedtest.questions.linked.edit",[":uuid",":id_link"]) }}';
        linked_get = linked_get.replace(":uuid","{{ $exam->uuid }}")
            .replace(":id_link",linked_id);
        $.get(linked_get,function(response){
            $('#selected_exam_edit').val(response.data['title']);
            $('#picked_edit').val(response.data.picked);
            $('#id_picked').val(response.data.id_exam_question);

            $("#picked_edit").attr({
                "max" : response.max_picked,        // substitute your own
                "min" : 0          // values (or variables) here
            });
        })

        $('#kt_select2_modal_2').modal('show');
    });


    var btn_edit = $('#btn_update');

    btn_edit.on('click',function(e){
        // return console.log($('#kt_form').serialize());

        e.preventDefault();
        // console.log($('#kt_form').serialize());
        // return false;
        // See: src\js\framework\base\app.js
        KTApp.progress(btn_edit);
        KTApp.block($('#kt_select2_modal_2'));
        var link_url = '{{ route("srv_admin.assistedtest.questions.linked.update",":uuid") }}';
        link_url = link_url.replace(":uuid", "{{ $exam->uuid }}");

        $('.invalid-feedback').html('').text();
        $.ajax({
            url: link_url,
            method: 'POST',
            data: $('#kt_form_edit').serialize(),
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
                    KTApp.unprogress(btn_edit);
                    KTApp.unblock($('#kt_select2_modal_2'));

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

</script>
<script>

</script>
<script>

    var btn = $('#btn_submit');
    var cancel = $('#btn_cancel');

    btn.on('click', function(e) {

        // return console.log($('#kt_form').serialize());

        e.preventDefault();
        // console.log($('#kt_form').serialize());
        // return false;
        // See: src\js\framework\base\app.js
        KTApp.progress(btn);
        KTApp.block($('#form-wrapper'));
        var link_url = '{{ route("srv_admin.assistedtest.questions.link",":uuid") }}';
        link_url = link_url.replace(":uuid", "{{ $exam->uuid }}");

        $('.invalid-feedback').html('').text();
        $.ajax({
            url: link_url,
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
                        if (key == "cdesc") {
                            // $('<div class="invalid-feedback" style="display:block; font-size:14px">'+value.toString().replace(key,'Informasi ')+'</div>').insertAfter($('#cke_editor1'));
                            $('#cke_editor1').siblings('.invalid-feedback').text(value.toString().replace(key, 'Informasi '));
                        }

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
<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/moment-with-locales.js"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/datetime.js"></script>
<!--end::Page Vendors -->
<script>
    let kt_tables = $('#kt_table_1').DataTable({
        responsive: true,
        searchDelay: 1000,
        processing: true,
        serverSide: true,
        scrollY:'50vh',
        scrollCollapse: true,
        ajax: '{{ route("srv_admin.assistedtest.questions.json","$exam->uuid") }}',
        order: [ [1, 'asc'] ],
        columns: [{
                data: 'question',
                name: 'question'
            },
            {
                data: 'label',
                name: 'label',
            },
            {
                data: 'benar',
                name: 'benar'
            },
            {
                data: 'salah',
                name: 'salah'
            },
            {
                data: 'id_question',
                name: 'id_question'
            },
        ],
        columnDefs: [
            {
                targets: 4,
                className: "text-center",
                sWidth: "70px",
                orderable: false,
                render: function(data, type, full, meta){
                    var str_action = `
                            <a href="#" onclick="deleteQuestion(':uuid',':id_question')" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                            <i class="la la-trash"></i>
                            </a>
                            <a href=":edit_url" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
                            <i class="la la-edit"></i>
                            </a>`;
                    str_action = str_action.replace(":edit_url","{{ route('srv_admin.assistedtest.questions.edit',[$exam->uuid,':id_question']) }}")
                            .replace(":id_question",full['id_question']).replace(":uuid","{{ $exam->uuid }}").replace(":id_question",full["id_question"]);

                    return str_action;
                }
            }
        ]

    });

    // <a href="{{ route('srv_admin.users.edit',':id') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
    //                         <i class="la la-edit"></i>
    //                         </a>

    $('#kt_table_2').DataTable({
        responsive: true,
        searchDelay: 1000,
        processing: true,
        serverSide: true,
        scrollY:'50vh',
        scrollCollapse: true,
        ajax: '{{ route("srv_admin.assistedtest.questions.linked.json","$exam->uuid") }}',
        order: [ [1, 'asc'] ],
        columns: [{
                data: 'title',
                name: 'exams.title'
            },
            {
                data: 'picked',
                name: 'exam_questions_adv.picked',

            },
            {
                data: 'id_exam_question',
                name: 'exam_questions_adv.id_exam_question'
            },
        ],
        columnDefs: [
            {
                targets: 2,
                className: "text-center",
                sWidth: "70px",
                orderable: false,
                render: function(data, type, full, meta){
                    var str_action = `
                            <a href="#" onclick="deleteLinkedQuestion(':uuid', ':id_picked')" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                            <i class="la la-trash"></i>
                            </a>
                            <button data-id=":data_id" class="btn_edit btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
                            <i class="la la-edit"></i>
                            </button>`;
                    str_action = str_action.replace(":data_id",full['id_exam_question']).replace(":uuid","{{ $exam->uuid }}").replace(":id_picked",full['id_exam_question']);

                    return str_action;
                }
            }
        ],
    });
</script>

<script>

    function deleteLinkedQuestion(uuid, id_picked) {
        swal.fire({
            "title": "@lang('assisted_test.picked-rm-title')",
            "html": "@lang('assisted_test.picked-rm-content')",
            "type": "warning",
            "confirmButtonClass": "btn btn-primary",
            "cancelButtonClass": "btn btn-secondary",
            confirmButtonText: "@lang('assisted_test.picked-rm-yes')",
            cancelButtonText: "@lang('assisted_test.picked-rm-no')",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                var unenroll_url = '{{ route("srv_admin.assistedtest.questions.linked.remove",":uuid") }}';
                unenroll_url = unenroll_url.replace(":uuid", "{{ $exam->uuid }}");
                $.ajax({
                    url: unenroll_url,
                    method: 'post',
                    data: {
                        "id_picked": id_picked,
                    },
                    success: function(response) {
                        location.reload(true);

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
                })

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {

            }
        });
    }


    function deleteQuestion(uuid, id_question) {
        swal.fire({
            "title": "@lang('assisted_test.question-rm-title')",
            "html": "@lang('assisted_test.question-rm-content')",
            "type": "warning",
            "confirmButtonClass": "btn btn-primary",
            "cancelButtonClass": "btn btn-secondary",
            confirmButtonText: "@lang('assisted_test.question-rm-yes')",
            cancelButtonText: "@lang('assisted_test.question-rm-no')",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                var unenroll_url = '{{ route("srv_admin.assistedtest.questions.remove",":uuid") }}';
                unenroll_url = unenroll_url.replace(":uuid", "{{ $exam->uuid }}");
                $.ajax({
                    url: unenroll_url,
                    method: 'post',
                    data: {
                        "id_question": id_question,
                    },
                    success: function(response) {
                        // location.reload(true);
                        kt_tables.ajax.reload();
                        swal.fire({
                            "title": "Berhasil Dihapus",
                            "html": "Soal berhasil dihapus dari ujian",
                            "type": "success",
                            "confirmButtonClass": "btn btn-primary",
                            cancelButtonClass: "btn btn-secondary",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonText: "OK",
                            cancelButtonText: "@lang('general.msg-success-ok-btn')",
                        });
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
