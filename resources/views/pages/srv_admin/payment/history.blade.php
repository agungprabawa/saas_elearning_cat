@extends('layouts.srv_admin.master')

@section('css')
    <!--begin::Page Custom Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/css/pages/invoices/invoice-2.css" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->
    <!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

<!--end::Page Vendors Styles -->
@endsection

@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Riwayat Pembayaran </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            {{-- <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Pages </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Invoices </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Invoice 2 </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div> --}}
        </div>
        {{-- <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <a href="#" class="btn kt-subheader__btn-primary">
                    Payment History
                </a>
                
            </div>
        </div> --}}
    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="fal fa-history"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    Riwayat Pembayaran
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar kt-hidden">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <div class="dropdown dropdown-inline">
                            <button type="button" class="btn btn-default btn-icon-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="la la-download"></i> @lang('users.tb-btn-1')
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <ul class="kt-nav">
                                    <li class="kt-nav__section kt-nav__section--first">
                                        <span class="kt-nav__section-text">Choose an option</span>
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
                        &nbsp;
                        <a href="{{ route('srv_admin.users.create') }}" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            @lang('users.tb-btn-2')
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
                        <th>Tanggal Transaksi</th>
                        <th>Tipe Transaksi</th>
                        <th>Nominal Transaksi</th>
                        <th>Status Transaksi</th>
                        <th>Detail</th>

                    </tr>
                </thead>
            </table>

            <!--end: Datatable -->
        </div>
    </div>
</div>
<!--begin::Modal-->
<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <table>
                            <tr style="padding-bottom: 5px">
                                <td style="width:50%">
                                    <label style="margin-bottom:0px" for="recipient-name" class="form-control-label">Transaksi dilakukan pada</label>
                                </td>
                                <td style="width:2%">:</td>
                                <td>
                                    <strong id="transaction_at"></strong>
                                </td>
                            </tr>
                            <tr style="padding-bottom: 5px">
                                <td style="width:50%">
                                    <label style="margin-bottom:0px" for="recipient-name" class="form-control-label">Tipe transaksi</label>
                                </td>
                                <td style="width:2%">:</td>
                                <td>
                                    <strong id="transaction_type"></strong>
                                </td>
                            </tr>
                            <tr style="padding-bottom: 5px">
                                <td style="width:50%">
                                    <label style="margin-bottom:0px" for="recipient-name" class="form-control-label">Transaksi sebesar</label>
                                </td>
                                <td style="width:2%">:</td>
                                <td>
                                    <strong id="transaction_price"></strong>
                                </td>
                            </tr>
                            <tr style="padding-bottom: 5px">
                                <td style="width:50%">
                                    <label style="margin-bottom:0px" for="recipient-name" class="form-control-label">Status transaksi</label>
                                </td>
                                <td style="width:2%">:</td>
                                <td>
                                    <strong id="transaction_status"></strong>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="form-group">
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_2">
                            <thead>
                                <tr>
                                    <th style="width:50%">Produk</th>
                                    <th class="text-right">Quantiti</th>
                                    <th class="text-right">Harga</th>
                                </tr>
                            </thead>
                            <tbody id="kt_table_2_body">

                            </tbody>
                        </table>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer kt-hidden">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Send message</button>
            </div>
        </div>
    </div>
</div>

<!--end::Modal-->

<!-- end:: Content -->
@endsection

@section('script-bottom')

<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/moment-with-locales.js"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/datetime.js"></script>
<!--end::Page Vendors -->

<script>
    var format = new Intl.NumberFormat('id-ID', { 
        style: 'currency', 
        currency: 'IDR', 
        minimumFractionDigits: 2, 
    }); 
    $('#kt_table_1').DataTable({
        responsive: true,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        ajax: '{{ route("srv_admin.payment.history.json") }}',
        order: [[0,'DESC']],
        columns: [{
                data: 'created_at', name: 'srv_transactions.created_at'
            },
            {
                data: 'type', name: 'srv_transactions.type'
            },
            {
                data: 'total_price', name: 'srv_transactions.total_price'
            },
            {
                data: 'status', name: 'srv_transactions.status'
            },
            {
                data: 'id_s_transaction', name: 'srv_transactions.id_s_transaction'
            },
        ],
        columnDefs: [
            {
                targets: 0,
                render: $.fn.dataTable.render.moment('YYYY-MM-DD H:m:s', 'dddd D MMMM YYYY H:m:s', 'id'),
            },
            {
                targets: 1,
                render: function(data){
                    if(data === '1'){
                        return '<strong>Pembayaran Rutin</strong>';
                    }else{
                        return '<strong>Pembayaran Upgrade</strong>'
                    }
                }
            },
            {
                targets: 2,
                render: function(data){
                    return format.format(data);
                }
            },
            {
                targets: 3,
                render: (data)=>{
                    if(data == '0'){
                        return `<span class="kt-badge kt-badge--inline kt-badge--warning"><strong>Pendding</strong></span>`;
                    }else if(data == '1'){
                        return `<span class="kt-badge kt-badge--inline kt-badge--success"><strong>Selesai</strong></span>`;
                    }else{
                        return `<span class="kt-badge kt-badge--inline kt-badge--danger"><strong>Gagal / Batal</strong></span>`;
                    }
                }
            },
            {
                targets: 4,
                className: "text-center",
                render: (data, type, full, meta) => {
                    var str_action = `
                            <a href="#" data-full=':full' data-toggle="modal" data-id=":id" data-target="#kt_modal_4" class="modal_togler btn btn-sm btn-clean btn-icon btn-icon-md" title="Lihat">
                            <i class="far fa-eye"></i>
                            </a>
                            `;

                        var str = JSON.stringify(full);
                        
                        str_action = str_action.replace(':id',data).replace(':full',str);

                    return str_action;
                }
            }
        ]

    });

    $(document).ready(function(){
        var id_trans = '';
        var full_ = [];
        // var moment = moment();
        moment.locale('id');

        $('#kt_table_1').on('click','.modal_togler',function(e){
            // alert($(this).attr("data-id"));
            e.preventDefault();
            id_trans = $(this).attr("data-id");
            full_ = $(this).attr("data-full");
            $('#kt_table_2_body').empty();
        });

        $('#kt_modal_4').on('show.bs.modal', function(){
            var transjson = jQuery.parseJSON(full_);

            $('#exampleModalLabel').text('Detail Transaksi');
            $('#transaction_at').text(moment(transjson.created_at,'YYYY-MM-DD hh:mm:ss').format('LLLL'));

            var type = '';
            if(transjson.type === '1'){
                type = 'Pembayaran Rutin';
            }else{
                type = 'Pembayaran Upgrade'
            }
            $('#transaction_type').text(type);

            $('#transaction_price').text(format.format(transjson.total_price));

            var sts;
            if(transjson.status == '0'){
                sts = `<span class="kt-badge kt-badge--inline kt-badge--warning"><strong>Pendding</strong></span>`;
            }else if(transjson.status == '1'){
                sts = `<span class="kt-badge kt-badge--inline kt-badge--success"><strong>Selesai</strong></span>`;
            }else{
                sts = `<span class="kt-badge kt-badge--inline kt-badge--danger"><strong>Gagal / Batal</strong></span>`;
            }
            $('#transaction_status').html(sts);

            $.ajax({
                url : '{{ route("srv_admin.payment.history.json") }}?detail='+transjson.id_s_transaction,
                type: 'get',
                success: function(response){
                    // console.log(response);
                    response.forEach(item => {
                        $('#kt_table_2_body').append(`
                            <tr>
                                <td>${item.label}</td>
                                <td class="text-right">${item.size}</td>
                                <td class="text-right">${format.format(item.total_price)}</td>
                            </tr>`);
                    })
                }
            });
        });
    })
</script>


@endsection