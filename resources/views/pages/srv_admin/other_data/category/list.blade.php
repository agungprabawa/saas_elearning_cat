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
                    Daftar Kategori </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs kt-hidden">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Datatables.net </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Data sources </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Ajax Server-side </a>

                    <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet kt-portlet--mobile">
            <div class="kt-portlet__head kt-portlet__head--lg">
                <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-users"></i>
                </span>
                    <h3 class="kt-portlet__head-title">
                        Daftar Kategori
                    </h3>
                </div>
                <div class="kt-portlet__head-toolbar">
                    <div class="kt-portlet__head-wrapper">
                        <div class="kt-portlet__head-actions">
                            &nbsp;
                            <a href="#" id="btn_create" class="btn btn-brand btn-elevate btn-icon-sm" data-toggle="modal" data-target="#kt_modal_5">
                                <i class="la la-plus"></i>
                                Tambah Kategori
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kt-portlet__body">

                <!--begin: Datatable -->
                <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                    <thead>
                    <tr>
                        <th style="width: 30%">Category</th>
                        <th>Deskripsi</th>
                        <th style="width:10%; text-align: center">Aksi</th>
                    </tr>
                    </thead>
                </table>

                <!--end: Datatable -->
            </div>
        </div>
    </div>
    <div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <form class="modal-content" id="kt_form">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div >
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">Nama Kategori:</label>
                            <input type="text" class="form-control" name="category_name">
                            <div id="err_category_name" class="invalid-feedback" style="display:block; font-size:14px"></div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Deskripsi:</label>
                            <textarea class="form-control" name="descriptions" id="message-text"></textarea>
                            <div id="err_descriptions" class="invalid-feedback" style="display:block; font-size:14px"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" id="btn_submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>


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
    </script>

    <script>
        let data_table = '';
        let btn_submit = $('#btn_submit');
        let act_type = 'create';
        let edit_id = null;

        $('#btn_create').on('click',()=>{
           act_type = 'create';
        });

        $('#kt_form').on('submit',function (e) {
            e.preventDefault();
            let url = '';

            if(act_type === 'create'){
                url = `{{ route('srv_admin.other_data.category.store') }}`;
            }else{
                url = `{{ route('srv_admin.other_data.category.update',':edit_id') }}`;
                url = url.replace(':edit_id',edit_id);
            }

            let form_data = new FormData(this);

            let submit = $.ajax({
                url: url,
                type: 'post',
                contentType: false,
                cache: false,
                processData: false,
                data: form_data,
                beforeSend: () => {
                    KTApp.progress(btn_submit);
                }
            });

            submit.done(function (response) {
                KTApp.unprogress(btn_submit);
                if ($.isEmptyObject(response.error)){
                    swal.fire({
                        "title": "Kategori Disimpan",
                        "html": "Kategori berhasil ditambahkan",
                        "type": "success",
                        "confirmButtonClass": "btn btn-primary",
                        cancelButtonClass: "btn btn-secondary",
                        showCancelButton: false,
                        allowOutsideClick: true,
                        confirmButtonText: "Oke",
                        cancelButtonText: "@lang('courses.teach-create-btn-2')",
                    }).then((result) => {
                        $('#kt_modal_5').modal('toggle');
                        data_table.ajax.reload();
                    });
                }else{
                    var error_data = {};
                    console.log(response.error);
                    for (let [key, value] of Object.entries(response.error)) {
                        var errors = $('#err_'+key);
                        // var field = key.toString().replace(/\s+/g, '_');
                        $(errors).text(value.toString());
                        // alert(field+'   '+key+'   '+value);
                    }
                    swal.fire({
                        "title": "@lang('courses.msg-error-title')",
                        "html": "@lang('courses.msg-error-content')",
                        "type": "warning",
                        "confirmButtonClass": "btn btn-secondary"
                    });
                }
            })
        })


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        data_table = $('#kt_table_1').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: '{{ route("srv_admin.other_data.category-data.list") }}',
            columns: [
                {
                    data: 'category', name: 'category'
                },
                {
                    data: 'descriptions', name: 'descriptions'
                },
                {
                    data: 'id_category', name: 'id_category'
                },
            ],
            columnDefs: [
                {
                    targets: 2,
                    render: (data, type, row) => {
                        let str_action = `
                            <a href="#" data-content=':data_content' data-id="${data}" class="btn btn-sm btn-clean btn-icon btn-icon-md btn_edit_category" title="Edit">
                            <i class="la la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md btn_remove_category" title="Delete" data-id="${data}">
                            <i class="la la-trash"></i>
                            </a>`;
                        str_action = str_action
                            .replace(":data_content", JSON.stringify(row));
                        return str_action;
                    }
                }
            ]

        });

        $(document).ready(function () {

            let dt_table =$('#kt_table_1');

            $(dt_table).on('click','.btn_remove_category',function (e) {
                e.preventDefault();
                var id_category = $(this).attr('data-id');
                removeCategory(id_category);

            });

            $(dt_table).on('click','.btn_edit_category', function (e) {
                e.preventDefault();
                act_type = 'edit';
                edit_id = $(this).attr('data-id');
                let datarow = JSON.parse($(this).attr('data-content'));

                $('#kt_modal_5').modal('show');
                $('#kt_modal_5').on('shown.bs.modal',()=>{

                    $('input[name="category_name"]').val(datarow.category);
                    $('textarea[name="descriptions"]').val(datarow.descriptions);
                });

            })
        })

        function removeCategory(id_category) {
            swal.fire({
                "title": "Hapus Kategori ?",
                "html": "Apakah anda akan menghapus kategori ini ?",
                "type": "warning",
                "confirmButtonClass": "btn btn-primary",
                "cancelButtonClass": "btn btn-secondary",
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Tidak",
                showCancelButton: true,
            }).then((result) => {
                if (result.value) {
                    var url = "{{ route('srv_admin.other_data.category.delete',':id_category') }}";
                    url = url.replace(':id_category',id_category);
                    $.ajax({
                        url:url,
                        type: 'post',

                    }).done(function (response) {
                        if($.isEmptyObject(response.error)){
                            swal.fire({
                                "title": "Berhasil Dihapus",
                                "html": "Kategori berhasi dihapus",
                                "type": "success",
                                "confirmButtonClass": "Ok",
                                "cancelButtonClass": "btn btn-secondary",
                                showCancelButton: false,
                            }).then((result)=>{
                                data_table.ajax.reload();
                            });
                        }
                    });

                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {

                }
            });
        }
    </script>


@endsection
