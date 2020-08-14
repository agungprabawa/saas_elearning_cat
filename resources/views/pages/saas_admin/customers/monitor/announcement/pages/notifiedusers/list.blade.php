@extends('pages.saas_admin.customers.monitor.announcement.details-master')

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
                            <h3 class="kt-portlet__head-title">Daftar Penerima Pengumuman</h3>
                        </div>

                    </div>

                    <div class="kt-portlet__body">
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Dibaca pada</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

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
        $('#kt_table_1').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: '{{ route("sudo.customers.monitor.data.announ.notified.list",["$id_company","$announcement->id_ann"]) }}',
            columns: [{
                data: 'name', name: 'name'
            },
                {
                    data: 'read_at', name: 'read_at'
                },

            ],
            columnDefs: [
                {
                    targets: [1],
                    render: $.fn.dataTable.render.moment('YYYY-MM-DD H:m:s', 'dddd D MMMM YYYY', 'id'),
                },

            ]

        });
    </script>
@endsection
