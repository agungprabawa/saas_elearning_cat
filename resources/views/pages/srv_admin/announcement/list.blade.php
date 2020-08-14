@extends('layouts.srv_admin.master')

@section('css')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

<!--end::Page Vendors Styles -->
@endsection


@section('content')

<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Daftar Pengumuman </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs kt-hidden">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Pages </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Wizard </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Wizard 4 </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
        <div class="kt-subheader__toolbar kt-hidden">
            <div class="kt-subheader__wrapper">
                <a href="#" class="btn kt-subheader__btn-primary">
                    Actions &nbsp;

                    <!--<i class="flaticon2-calendar-1"></i>-->
                </a>

            </div>
        </div>
    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-md-12">
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            @lang('announ.title')
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <!--begin: Datatable -->
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                <th>Judul Pengumuman</th>
                                <th>Dipublikasi</th>
                                <th>Dilihat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>

                    <!--end: Datatable -->
                </div>

            </div>
            <!--end::Portlet-->
        </div>
    </div>
</div>

<!-- end:: Content -->

@endsection

@section('script-bottom')

<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<!--end::Page Vendors -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#kt_table_1').DataTable({
        responsive: true,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        ajax: '{{ route("srv_admin.announcement.get.json") }}',
        columns: [{
                data: 'title',
                name: 'title'
            },
            {
                data: 'created_at',
                name: 'created_at'
            },
            {
                data: 'readable',
                name: 'readable',
            },
            {
                data: 'uuid',
                name: 'uuid',
                orderable: false,
            },

        ],
        columnDefs: [{
            targets: 3,
            className: "text-center",
            sWidth: "70px",
            render: function(data, type, full, meta) {
                var str_action = `
                            <a href="{{ route('srv_admin.announcement.edit',':href') }}" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Edit">
                            <i class="la la-edit"></i>
                            </a>
                            <button type="button" data-uuid=":uuid" class="btn_del btn btn-sm btn-clean btn-icon btn-icon-md" title="Delete">
                            <i class="la la-trash"></i>
                            </button>`;
                str_action = str_action.replace(':href', data).replace(':uuid', full['uuid']);
                return str_action;
            }
        }, ]
    });

    $(document).ready(function() {
        $('#kt_table_1').on('click', '.btn_del', function(e) {
            swal.fire({
                "title": "Hapus Pengumuman",
                "html": "Apakah anda yakin untuk menghapus pengumuman ini ?",
                "type": "warning",
                "confirmButtonClass": "btn btn-primary",
                cancelButtonClass: "btn btn-secondary",
                showCancelButton: true,
                allowOutsideClick: false,
                confirmButtonText: "Ya, hapus",
                cancelButtonText: "Tidak, batalkan",
            }).then((result) => {
                if (result.value) {
                   ajaxDelete($(e.currentTarget).attr('data-uuid'));
                }
            });
        });
    });

    function ajaxDelete(uuid){
        var url = '{{ route("srv_admin.announcement.delete",":uuid") }}';
        url = url.replace(':uuid',uuid);

        $.ajax({
            url: url,
            type: 'post',
            async:false,
            data: {

            },
            success: function(response){
                console.log(response);
                table.ajax.reload();
                swal.fire({
                    "title": "Pengumuman berhasil dihapus",
                    "html": "Pengumuman telah terhapus dan titarik dari user terkait",
                    "type": "success",
                    "confirmButtonClass": "btn btn-secondary"
                });

            },
            error: function(xhr, status, error){
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
    }
</script>
@endsection
