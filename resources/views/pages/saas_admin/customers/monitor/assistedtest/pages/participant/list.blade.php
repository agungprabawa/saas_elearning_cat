@extends('pages.saas_admin.customers.monitor.assistedtest.details-master')

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
                            <h3 class="kt-portlet__head-title">Daftar Tugas</h3>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Bergabung Pada</th>

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
        $('#kt_table_1').DataTable({
            responsive: true,
            searchDelay: 500,
            processing: true,
            serverSide: true,
            ajax: '{{ route("sudo.customers.monitor.data.exam.participants.list",["$id_company","$exam->id_exam"]) }}',
            columns: [{
                data: 'name', name: 'name'
            },
                {
                    data: 'email', name: 'email'
                },
                {
                    data: 'created_at', name: 'created_at'

                }

            ],
            columnDefs: [
                {
                    targets: [2],
                    render: $.fn.dataTable.render.moment('YYYY-MM-DD H:m:s', 'dddd D MMMM YYYY', 'id'),
                }
            ]

        });
    </script>
@endsection
