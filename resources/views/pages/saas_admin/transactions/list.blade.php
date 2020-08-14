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
                Daftar Transaksi Customers </h3>
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
                            Daftar Transaksi Customers Pengguna Layanan
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                <th>Nama Layanan</th>
                                <th>Jenis Transaksi</th>
                                <th>Harga</th>
                                <th>Transaksi Pada</th>
                                <th>Status</th>
                                <th>Detail</th>
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
                            <tbody style="min-heigh:20px" id="kt_table_2_body">

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

@endsection

@section('script-bottom')
<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/moment-with-locales.js"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/datetime.js"></script>
<!--end::Page Vendors -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

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
        ajax: {
           url: '{{ route("sudo.transactions.data.transactions") }}',
           type: 'get',
           async: false,
        },
        columns: [{
                data: 'company_name', name: 'company_name'
            },
            {
                data: 'type', name: 'type'
            },
            {
                data: 'total_price', name: 'total_price'
            },
            {
                data: 'created_at', name: 'created_at'
            },
            {
                data: 'status', name: 'status'
            },
            {
                data: 'id_t', name: 'id_t'
            }
           
        ],
        columnDefs: [
            {
                targets: [3],
                render: $.fn.dataTable.render.moment('YYYY-MM-DD H:m:s', 'dddd D MMMM YYYY', 'id'),
            },
            {
                targets:2,
                render: (data)=>{
                    return format.format(data);
                }
            },
            {
                targets: 4,
                render: (data)=>{
                    if(data == 'Gagal / Batal'){
                        return `<span class="kt-badge kt-badge--inline kt-badge--danger">${data}</span>`
                    }else if(data == 'Pendding'){
                        return `<span class="kt-badge kt-badge--inline kt-badge--warning">${data}</span>`
                    }else{
                        return `<span class="kt-badge kt-badge--inline kt-badge--success">${data}</span>`
                    }
                }
            },
            {
                targets: 5,
                render: (data, type, full, meta)=>{
                    var url = "{{ route('sudo.transactions.detail',':key') }}";
                    url = url.replace(':key',data);
                    var strfinal = `<a data-full=':full' data-toggle="modal" data-id=":id" data-target="#kt_modal_4" href="#" class="modal_togler">Detail</a>`;

                    var str = JSON.stringify(full);
                        
                    strfinal = strfinal.replace(':id',data).replace(':full',str);

                    return strfinal;
                }
            }
        ]

    });

    $(document).ready(function(){
        var id_trans = '';
        var full_ = [];
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

           
            $('#transaction_type').text(transjson.type);

            $('#transaction_price').text(format.format(transjson.total_price));

            var sts;

            if(transjson.status == 'Gagal / Batal'){
                sts = `<span class="kt-badge kt-badge--inline kt-badge--danger">${transjson.status}</span>`;
            }else if(transjson.status == 'Pendding'){
                sts = `<span class="kt-badge kt-badge--inline kt-badge--warning">${transjson.status}</span>`;
            }else{
                sts = `<span class="kt-badge kt-badge--inline kt-badge--success">${transjson.status}</span>`;
            }
            $('#transaction_status').html(sts);

            
            $.ajax({
                url : '{{ route("sudo.transactions.data.transactions") }}?detail='+transjson.id_t,
                type: 'get',
                success: function(response){
                    console.log(response);
                    response.forEach(item => {
                        $('#kt_table_2_body').append(`
                            <tr>
                                <td>${item.label}</td>
                                <td class="text-right">${item.size}</td>
                                <td class="text-right">${format.format(item.total_price)}</td>
                            </tr>`);
                    });
                }
            }).done(()=>{
                
            });
        });
    });
</script>
@endsection