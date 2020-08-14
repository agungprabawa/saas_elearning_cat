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
                        <h3 class="kt-portlet__head-title">Relasi Dengan Kursus
                            <small>@lang('participant.sub-title')</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-wrapper">
                            <button data-toggle="modal" data-target="#kt_select2_modal" data-backdrop="static" class="btn btn-brand btn-elevate btn-icon-sm">
                                <i class="la la-plus"></i>
                                Tambah Relasi
                            </button>

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                <th>Nama Kursus</th>
                                <th>Aksi</th>
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
                        <label>Pilih Kursus</label>
                        <select class="form-control kt-select2" id="kt_select2_3_modal" name="selected_elearning[]" multiple="multiple">

                        </select>
                        <div class="invalid-feedback" id="err_selected_elearning" style="display:block; font-size:14px"></div>
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
        
    });

    // Function
    function participantSelect2Load() {
        var users_url = "{{ route('srv_admin.assistedtest.with.courses.relations') }}";
        

        // multi select
        $('#kt_select2_3_modal').select2({
            placeholder: "Pilih kursus",
            closeOnSelect: false,
            ajax: {
                url: users_url,
                type: "get",
                dataType: 'json',
                delay: 1000,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                        type: 'edit',
                        id_exam: '{{ $exam->id_exam }}'
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
        var enroll_url = '{{ route("srv_admin.assistedtest.relations.store",":uuid") }}';
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
            ajax: '{{ route("srv_admin.assistedtest.relations.json","$exam->uuid") }}',
            columns: [
                {
                    data: 'title',
                    name: 'title',

                },
                {
                    data: 'id_relation',
                    name: 'id_relation'
                }
                
            ],
            "columnDefs": [
                {
                    targets: 1,
                    className: "text-center",
                    sWidth: "70px",
                    orderable: false,
                    render: function(data, type, full, meta) {
                        

                        // let str_action_edit = `
                        // <a href="{{ route('srv_admin.assistedtest.result',[$exam->uuid,':edit_id']) }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="@lang('assisted_test.edt-score-3')">
                        //     <i class="la la-edit"></i>
                        // </a>`;
                        let str_action_detele = `
                        <a href="#" onclick="deleteParticipant(':uuid',':id_relation');" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                            <i class="la la-trash"></i>
                        </a>`;

                        str_action_detele = str_action_detele.replace(":id_relation", full['id_relation']).replace(":uuid", "{{ $exam->uuid }}");
                        // str_action_edit = str_action_edit.replace(":edit_id", full['id']);

                        return str_action_detele;
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
    function deleteParticipant(uuid, id_relation) {
        swal.fire({
            "title": "Hapus Relasi",
            "html": "Relasi ujian dengan kursus ini akan dihapus",
            "type": "warning",
            "confirmButtonClass": "btn btn-primary",
            "cancelButtonClass": "btn btn-secondary",
            confirmButtonText: "Ya hapus relasi",
            cancelButtonText: "@lang('assisted_test.prt-btn-no')",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                var unenroll_url = '{{ route("srv_admin.assistedtest.relations.remove",":uuid") }}';
                unenroll_url = unenroll_url.replace(":uuid", "{{ $exam->uuid }}");
                $.ajax({
                    url: unenroll_url,
                    method: 'post',
                    data: {
                        "id_relation": id_relation,
                    },
                    success: function(response) {
                        swal.fire({
                            "title": "Berhasil Dihapus",
                            "html": "Relasi antara ujian dan kursus berhasil dihapus",
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
