@extends('pages.saas_admin.customers.monitor.elearning.details-master')

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
                        <h3 class="kt-portlet__head-title">Daftar Materi</h3>
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

                <div class="kt-portlet__body">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                <th>Urutan</th>
                                <th>Judul</th>
                                <th>Pembuat</th>
                                <th>Dibuat Pada</th>
                                <th>File Utama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="kt-portlet__foot kt-hidden">
                    <div class="kt-form__actions">
                        <div class="row justify-content-end">

                            <button id="btn_submit" class="btn btn-success float-left">@lang('general.btn-save')</button>&nbsp;
                            <button id="btn_cancel" class="btn btn-secondary">@lang('general.btn-cancel')</button>

                        </div>
                    </div>
                </div>
                <form class="kt-form " id="kt_form">
                </form>
            </div>
        </div>
    </div>
</div>

<!--End:: App Content-->


@endsection
@section('other-script')
<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/moment-with-locales.js"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/datetime.js"></script>
<!--end::Page Vendors -->
<?php $id_company = $managed['company']->id_company ?>

<script>

    let kt_table = $('#kt_table_1');
    let run_kt_table = $(kt_table).DataTable({
        responsive: true,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        ajax: '{{ route("sudo.customers.monitor.data.courses.teachmaterials.list",["$id_company","$courses->id_courses"]) }}',
        columns: [{
                data: 'location', name: 'location'
            },
            {
                data: 'title', name: 'title'
            },
            {
                data: 'name', name: 'name'

            },
            {
                data: 'created_at', name: 'created_at'
            },
            {
                data: 'main_file_path', name: 'main_file_path'
            },
            {
                data: 'id_tech_material', name: 'id_tech_material'
            },

        ],
        columnDefs: [
            {
                targets: [3],
                render: $.fn.dataTable.render.moment('YYYY-MM-DD H:m:s', 'dddd D MMMM YYYY', 'id'),
            },
            {
                targets:4,
                render: function(data, type, row){

                    console.log(data);
                    // return "-";

                    if(data === "" || data === null){
                        return "-";
                    }

                    var splited = data.split("/");
                    var length = splited.length;

                    return splited[length -1];
                }
            },
            {
                targets: 5,
                render: (data, type, row)=>{

                    var link = "{{ route('sudo.customers.monitor.courses.teachmaterials.detail',[':id_company',':id_courses',':id_teach']) }}";

                    var btn_html = `<a href=":link" class="btn btn-brand">Lihat Detail</a>
                    <a href="#" class="btn_del_teach btn btn-warning" data-id="${data}" data-id-company="${row['id_company']}" data-id-courses="${row['id_c']}" >Hapus</a>`;

                    btn_html = btn_html.replace(':link',link)
                        .replace(':id_company','{{ $id_company }}')
                        .replace(':id_courses',row['id_c'])
                        .replace(':id_teach',data);

                    return btn_html;
                }
            }
        ]

    });


    $(kt_table).on('click','.btn_del_teach', function (e) {
        e.preventDefault();
        let data_id = $(this).attr('data-id');
        let id_company = $(this).attr('data-id-company');
        let id_courses = $(this).attr('data-id-courses');
        let remove_link = "{{ route('sudo.customers.monitor.courses.teachmaterials.delete',[':id_company',':id_courses']) }}";

        remove_link = remove_link.replace(':id_company',id_company)
            .replace(':id_courses',id_courses);

        swal.fire({
            "title": "Hapus materi ?",
            "html": "Apakah anda yakin untuk menghapus materi ini ?",
            "type": "warning",
            "confirmButtonClass": "btn btn-primary",
            "cancelButtonClass": "btn btn-secondary",
            confirmButtonText: "Ya, hapus materi",
            cancelButtonText: "Tidak, batalkan",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {

                let ajax_req = $.ajax({
                    url: remove_link,
                    method: 'post',
                    data: {
                        "teach_material": data_id,
                    },
                    success: function(response) {

                    },
                    error: function(xhr, status, error) {
                        // var err = eval("(" + xhr.responseText + ")");
                        console.log(xhr.responseText);
                        console.log(status);
                        console.log(error);
                    }
                });

                ajax_req.done(function (response) {
                    run_kt_table.ajax.reload();

                    swal.fire({
                       title: 'Berhasil dihapus',
                        type: 'success',
                       html: 'Materi pada kursus ini berhasil dihapus',
                        confirmButtonClass: 'btn btn-primary',
                        confirmButtonText: 'Oke',
                    });
                });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {

            }
        });
    });
</script>
@endsection
