@extends('layouts.saas_admin.master')

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
                Daftar E-Learning </h3>
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
            <div class="kt-portlet kt-">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Daftar E-Learning Pengguna Layanan
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Materi</th>
                                <th>Partisipan</th>
                                <th>Pembuat</th>
                                <th>Dibuat Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
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
<script src="{{ asset('/') }}admin_res/plugins/datatables/moment-with-locales.js"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/datetime.js"></script>
<!--end::Page Vendors -->
<?php $id_company = $managed['company']->id_company ?>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    
    $('#kt_table_1').DataTable({
        responsive: true,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        ajax: '{{ route("sudo.customers.monitor.data.courses.list","$id_company") }}',
        columns: [{
                data: 'title', name: 'title'
            },
            {
                data: 'materials', name: 'materials'
            },
            {
                data: 'partisipant', name: 'partisipant'
            },
            {
                data: 'name', name: 'name'
            },
            {
                data: 'created_at', name: 'created_at'
            },
            {
                data: 'id_c', name: 'id_c'
            },
           
        ],
        columnDefs: [
            {
                targets: [4],
                render: $.fn.dataTable.render.moment('YYYY-MM-DD H:m:s', 'dddd D MMMM YYYY', 'id'),
            },
            {
                targets: 5,
                render: (data, type, row)=>{
                    var btn_html = `<a href="{{ route('sudo.customers.monitor.courses.details',[':id_company',':id_courses']) }}">Lihat Detail</a>`;
                    console.log(row);
                    
                    btn_html = btn_html.replace(":id_courses", data).replace(':id_company',row['id_company']);

                    return btn_html;
                }
            }
        ]

    });
</script>
@endsection