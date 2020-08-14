@extends('layouts.saas_admin.master')

@section('css')

<!--begin::Page Custom Styles(used by this page) -->
<link href="{{  asset('/') }}admin_res/css/pages/support-center/home-1.css" rel="stylesheet" type="text/css" />

<style>
    .item-1{
       background:linear-gradient(0deg, #F9A825E5, #FDD835E5);
       background-size: cover;
    }

    .item-2{
       background:linear-gradient(0deg, #29B6F6E5, #03A9F4E5);
       background-size: cover;
    }

    .item-3{
       background:linear-gradient(0deg, #00E676E5, #2ecc71E5);
       background-size: cover;
    }

</style>
<!--end::Page Custom Styles -->
<!--end::Page Vendors Styles -->
@endsection


@section('content')
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title" style="color: #6a6a6a; font-size: 2.2rem">
                Kelola {{ $company->company_name }} </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs kt-hidden">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Custom </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Callout </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                @if($company->service_status != 0)

                    <a href="" data-type="activate" class="btn_inac btn btn-primary">
                        Aktifkan
                    </a>
                @else
                    <a href="" data-type="inactivate" class="btn_inac btn btn-warning">
                        Non aktifkan
                    </a>
                @endif
                <a href="#" class="" style="padding: 0.65rem 1rem; color:#959cb6 !important; background: #e1e3ec; font-weight: 500">
                    <vdatenow date="now" type="date"></vdatenow> &nbsp;

                    <!--<i class="flaticon2-calendar-1"></i>-->
                </a>

            </div>
        </div>
    </div>
</div>
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-sc" style="background:linear-gradient(90deg, #1CB5E0BF 0%, #000851BF 100%), url('{{  asset("/") }}admin_res/media/bg/bg-9.jpg'); background-size:cover !important; border-radius: 4px; box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.1)">
        <div class="kt-container ">
            <div class="kt-sc__top" style="border-bottom: none !important">

                <h3 class="kt-sc__title" style="color: #fff;">
                    Informasi singkat layanan ini
                </h3>

                <div class="kt-sc__nav">
                    {{-- <a href="{{ route('student.learning.all.learning') }}" class="kt-link kt-font-bold">Semua kursus</a> --}}
                    {{-- <a href="#" class="kt-link kt-font-bold">Visit Blog</a> --}}
                </div>
            </div>

            <div class="row" style="margin-top:20px">

                <div class="col-md-4">
                    <div class="kt-portlet kt-callout item-1" style="padding: 0px">
                        <div class="kt-portlet__body" style="min-height: 200px">
                            <div class="kt-callout__body" style="">

                                <div class="kt-callout__content">
                                    <h3 class="kt-callout__title" style="margin-bottom: 20px; color: #fff">
                                        Info Langganan
                                    </h3>
                                    <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px !important">
                                        Dibuat pada: <strong><vdatenow date="{{ $company->created_at }}" type="onlydate"></vdatenow></strong>
                                    </p>
                                    <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px !important">
                                        Berlaku Hingga: <strong><vdatenow date="{{ $company->subscribe_until }}" type="onlydate"></vdatenow></strong>
                                    </p>
                                    <p class="kt-callout__desc" style="color: #fff">
                                        Penyimpanan: <strong><span id="storage_usage"></span> <span id="storage_size"></span></strong>
                                    </p>
                                </div>
                                <div class="kt-callout__action kt-hidden">
                                    <a href="#" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-brand">Submit a Request</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kt-portlet kt-callout item-2" style="padding: 0px">
                        <div class="kt-portlet__body" style="min-height: 200px">
                            <div class="kt-callout__body" style="">

                                <div class="kt-callout__content">
                                    <h3 class="kt-callout__title" style="margin-bottom: 20px; color: #fff">
                                        Aplikasi
                                    </h3>
                                    <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px">
                                        E-Learning : <strong>{{ $company->courses->where('is_deleted','=',0)->count() }} pembelajaran</strong>
                                    </p>
                                    <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px">
                                        Assisted Test : <strong>{{ $company->exams->where('is_deleted','=',0)->count() }} ujian</strong>
                                    </p>
                                    <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px">
                                        Pengumuman : <strong>{{ $company->announcements->where('is_deleted','=',0)->count() }} Pengumuman</strong>
                                    </p>
                                    <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px">
                                        Pengguna : <strong>{{ $company->users->groupBy('id_user')->count() }} Pengguna</strong>
                                    </p>
                                </div>
                                <div class="kt-callout__action kt-hidden">
                                    <a href="#" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-brand">Submit a Request</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="kt-portlet kt-callout item-3" style="padding: 0px">
                        <div class="kt-portlet__body" style="min-height: 200px">
                            <div class="kt-callout__body" style="">

                                <div class="kt-callout__content">
                                    <h3 class="kt-callout__title" style="margin-bottom: 20px; color: #fff">
                                        Lainnya
                                    </h3>
                                    <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px">
                                        Saldo : <strong></strong>
                                    </p>
                                    <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px">
                                        Total Transaksi : <strong>{{ $company->transactionsInternal->count() }}</strong>
                                    </p>
                                    <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px">
                                        T. Nominal Transaksi : <strong>
                                        <helper-currency money="{{ $company->transactionsInternal->where('status','=',1)->sum('price') }}" type="id-ID" currency="IDR"></helper-currency>
                                        </strong>
                                    </p>
                                </div>
                                <div class="kt-callout__action kt-hidden">
                                    <a href="#" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-brand">Submit a Request</a>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-7">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Statistik aktivitas
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold">
                            <li class="nav-item">
                                <a class="nav-link date_range" data-type="default" href="#">
                                    7 Hari
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link date_range" data-type="bulanan" href="#">
                                    Bulanan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link date_range" data-type="custom" href="#">
                                    Kustom
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <canvas id="graphCanvas"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-5">

            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Informasi Layanan
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar kt-hidden">
                        <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_widget4_tab11_content" role="tab">
                                    Today
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_widget4_tab12_content" role="tab">
                                    Week
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_widget4_tab13_content" role="tab">
                                    Month
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-scroll" data-scroll="true" data-height="300" style="height: 400px;">
                        <img src="{{ $company->logo_url }}" alt="" srcset=""
                        style="
                            display: block;
                            max-height: 110px;
                            margin: 0 auto;
                            border: 1px solid #d6d6d6;">
                        <div class="form-group">
                            <table>
                                <tr>
                                    <td>Nama Lembaga</td>
                                    <td>:</td>
                                    <td><strong>{{ $company->company_name }}</strong></td>
                                </tr>
                                <tr>
                                    <td>Jenis Lembaga</td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <strong>{{ $company->type->label }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <strong>{{ $company->address }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <strong>{{ $company->emails }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nomor telepon</td>
                                    <td>
                                        :
                                    </td>
                                    <td>
                                        <strong>{{ $company->phones }}</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Deskripsi
                                    </td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        {!! $company->descriptions !!}
                                    </td>
                                </tr>

                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection

@section('script-bottom')


<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="{{ asset('/') }}admin_res/js/pages/dashboard.js" type="text/javascript"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/moment-with-locales.js"></script>
<script src="{{ asset('/') }}admin_res/plugins/chartjs/Chart.js" type="text/javascript"></script>
<!--end::Page Scripts -->
<script>

   $(document).ready(function(){
        moment.locale('id');

        let logs = {!! $log_data_json !!}
        console.log(logs);
        var label_log_admin = [];
        var data_log_admin = [];
        var label_log_student = [];
        var data_log_student = [];

        let log_admin = logs.admin;
        let log_student = logs.student;


        log_admin.forEach(item=>{
            let mdate = moment(item.date, 'YYYY-MM-DD').format('Do MMM');

            label_log_admin.push(mdate);
            data_log_admin.push(item.count);
        });

        log_student.forEach(item=>{
            let mdate2 = moment(item.date, 'YYYY-MM-DD').format('Do MMM');
            label_log_student.push(mdate2);
            data_log_student.push(item.count);
        });

        var chartdata = {
            labels: label_log_admin,
            datasets: [
                {
                    label: 'Aktivitas Admin',
                    backgroundColor: 'rgba(52, 73, 94,0.9)',
                    borderColor: '#34495e',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: data_log_admin
                },
                {
                    label: 'Aktivitas Siswa',
                    backgroundColor: 'rgba(52, 152, 219,0.9)',
                    borderColor: '#3498db',
                    hoverBackgroundColor: '#CCCCCC',
                    hoverBorderColor: '#666666',
                    data: data_log_student
                }
            ]
        };

        var options = {
            scaleBeginAtZero: true,
            tooltips: {
                mode: 'index',
                intersect: false,
            },
            hover: {
					mode: 'nearest',
					intersect: true
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display:false,
                        // drawBorder: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display:true,
                        borderDash: [5, 5],
                        drawBorder: false,
                    },
                    ticks: {
                        precision:0,
                        beginAtZero:true
                    }
                }]
            },
            legend: {
                display: true,
            }
        }

        var graphTarget = $("#graphCanvas");

        var barGraph = new Chart(graphTarget, {
            type: 'line',
            data: chartdata,
            options: options,
        });

        var date_range = $('.date_range');
        date_range.click(function(e){
            e.preventDefault();
            date_range.removeClass('active');
            $(this).addClass('active');

            var label1 = ['sen','sel','rab','kam'];
            var data = [10,30,5,20];
            var old_data = barGraph.config.data;

            old_data.datasets[0].data = data;

            old_data.labels = label1;

            barGraph.update();

        });
    });

    function getData(){

    }


</script>
<script>
    $('#storage_usage').addClass("kt-spinner kt-spinner--sm kt-spinner--brand");
    // $('#storage_size').addClass("kt-spinner kt-spinner--sm kt-spinner--brand");
    // $('#storage_progress').width(0);
    $(document).ready(function() {

        var getUsage = function(){
            $.ajax({
                url: '{{ route("sudo.customers.monitor.data.storage.usage",$company->id_company) }}',
                type: 'GET',
                dataType: 'json',
                cache: false,
                async: true,
                beforeSend: function() {
                    // alert("before");
                    $('#storage_usage').empty();
                },
                complete: function() {
                    // alert("before");
                },
                success: function(data) {
                    $('#storage_usage').removeClass("kt-spinner kt-spinner--sm kt-spinner--brand");
                    // $('#storage_size').removeClass("kt-spinner kt-spinner--sm kt-spinner--brand");
                    $('#storage_usage').text(data["human_size"]+' dari ');
                    $('#storage_size').text(data['storage_size']+' GB');
                    // $('#storage_progress').width(data["usage_percentage"]);

                }
            });
        };
        setTimeout(getUsage, 1000);
        // setTimeout(alert("test"),2000);
    })
</script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let btn_del = $('.btn_inac');

    $(btn_del).on('click', function (e) {
        e.preventDefault();
        let type = $(this).attr('data-type')
        let str1;
        let str2;
        let str3;
        let str4;
        let str5;
        if(type === 'inactivate'){
            str1 = 'menonaktifkan';
            str2 = 'Dinonaktifkan';
            str3 = 'nonaktifkan';
            str4 = 'dinonaktifkan';
            str5 = `Non Aktifkan`;

        }else{
            str1 = 'mengaktifkan';
            str2 = 'Diaktifkan';
            str3 = 'aktifkan';
            str4 = 'diaktifkan';
            str5 = `Aktifkan`;
        }
        let url = function(){
            if(type === 'inactivate'){
                return "{{ route('sudo.customers.monitor.act.inactivate',$managed['id_company']) }}";
            }else{
                return "{{ route('sudo.customers.monitor.act.activate',$managed['id_company']) }}"
            }
        }

        swal.fire({
            "title": str5,
            "html": `Apakah anda akan ${str1} layanan ini ?`,
            "type": "warning",
            "confirmButtonClass": "btn btn-primary",
            "cancelButtonClass": "btn btn-secondary",
            confirmButtonText: `Ya, ${str3}`,
            cancelButtonText: "Tidak, batalkan",
            showCancelButton: true,
            inputPlaceholder: 'Masukkan password anda',
            input: 'password',
            inputAttributes: {
                maxlength: 100,
                autocapitalize: 'off',
                autocorrect: 'off'
            }
        }).then((result) => {

            console.log(result);

            if (!result.dismiss) {

                let ajax_res = $.ajax({
                    url: url(),
                    type: 'post',
                    data: {
                        id_company: "{{ $managed['id_company'] }}",
                        password: result.value
                    },
                    async: false
                });

                ajax_res.done(function (response) {
                    if($.isEmptyObject(response.error)){
                        swal.fire({
                            "title": `Layanan ${str2}`,
                            "html": `Layanan ini berhasil ${str4}`,
                            "type": "success",
                            "confirmButtonClass": "btn btn-secondary",
                            confirmButtonText: "Oke",
                        }).then((result) => {
                            location.reload();
                        });
                    }else{
                        swal.fire({
                            "title": "Gagal Diproses",
                            "html": `Layanan gagal ${str4}, periksa kembali password anda`,
                            "type": "warning",
                            "confirmButtonClass": "btn btn-secondary",
                            confirmButtonText: "Oke",
                        }).then((result) => {

                        });
                    }
                })


            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {

            }
        });

    });
</script>
@endsection
