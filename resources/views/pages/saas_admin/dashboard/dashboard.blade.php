@extends('layouts.saas_admin.master')

@section('css')

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{  asset('/') }}admin_res/css/pages/support-center/home-1.css" rel="stylesheet" type="text/css"/>

    <style>
        .item-1 {
            background: linear-gradient(0deg, #F9A825E5, #FDD835E5);
            background-size: cover;
        }

        .item-2 {
            background: linear-gradient(0deg, #29B6F6E5, #03A9F4E5);
            background-size: cover;
        }

        .item-3 {
            background: linear-gradient(0deg, #00E676E5, #2ecc71E5);
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
                    Selamat Datang di Dashboard </h3>
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
                    <a href="#" class=""
                       style="padding: 0.65rem 1rem; color:#959cb6 !important; background: #e1e3ec; font-weight: 500">
                        <vdatenow date="now" type="date"></vdatenow> &nbsp;

                        <!--<i class="flaticon2-calendar-1"></i>-->
                    </a>

                </div>
            </div>
        </div>
    </div>
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-sc"
             style="background:linear-gradient(90deg, #1CB5E0BF 0%, #000851BF 100%), url('{{  asset("/") }}admin_res/media/bg/bg-9.jpg'); background-size:cover !important; border-radius: 4px; box-shadow: 0px 0px 13px 0px rgba(82, 63, 105, 0.1)">
            <div class="kt-container ">
                <div class="kt-sc__top" style="border-bottom: none !important">

                    <h3 class="kt-sc__title" style="color: #fff;">
                        Informasi singkat
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
                                            Info Layanan
                                        </h3>
                                        <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px !important">
                                            Jumlah Layanan: <strong>{{ $total_customers->count() }}</strong>
                                        </p>
                                        <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px">
                                            Jumlah User: <strong>{{ $total_users->count() }}</strong>
                                        </p>
                                        <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px">
                                            Jumlah User Online: <strong id="online_user_count"></strong>
                                        </p>
                                        <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px">
                                            Storage Terpakai: <strong id="storage_usage"></strong>
                                        </p>
                                    </div>
                                    <div class="kt-callout__action kt-hidden">
                                        <a href="#" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-brand">Submit
                                            a Request</a>
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
                                            Total E-Learning : <strong>{{ $courses->count() }} </strong>
                                        </p>
                                        <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px">
                                            Total Assisted Test : <strong>{{ $exams->count() }}</strong>
                                        </p>
                                        <p class="kt-callout__desc" style="color: #fff">
                                            Total Pengumuman : <strong>{{ $announc->count() }}</strong>
                                        </p>
                                    </div>
                                    <div class="kt-callout__action kt-hidden">
                                        <a href="#" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-brand">Submit
                                            a Request</a>
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
                                            Transaksi
                                        </h3>
                                        <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px !important">
                                            Transaksi Layanan:
                                            <strong style="display: block">
                                                {{ $serviceTransactions->total_c_success }}
                                                @ total
                                                <helper-currency money="{{ $serviceTransactions->total_s_success }}"
                                                                 type="id-ID" currency="IDR"></helper-currency>
                                            </strong>
                                        </p>
                                        <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px !important">
                                            Total Transaksi non-Layanan:
                                            <strong style="display: block">
                                                {{ $nonServiceTransactions->total_c_success }}
                                                @ total
                                                <helper-currency money="{{ $nonServiceTransactions->total_s_success }}"
                                                                 type="id-ID" currency="IDR"></helper-currency>
                                            </strong>
                                        </p>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Statistik kunjungan
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar ">
                            <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold">
                                <li class="nav-item">
                                    <a class="nav-link active" id="charts_latest" href="#">
                                        Terbaru
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="charts_custom" href="#">
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
            <div class="col-md-4">
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Kunjungan Per Layanan
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar kt-hidden">
                            <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_widget4_tab11_content"
                                       role="tab">
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
                            <div class="kt-list-timeline">
                                <div class="kt-list-timeline__items" id="data_list1">
                                    <div class="kt-list-timeline__item" >
                                        <span class="kt-list-timeline__text">12 new users registered</span>
                                        <span class="kt-list-timeline__time">Just now</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Statistik transaksi
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar ">
                            <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold">
                                <li class="nav-item">
                                    <a class="nav-link active" id="charts2_latest" href="#">
                                        Terbaru
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="charts2_custom" href="#">
                                        Kustom
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <canvas id="transCharts"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="kt-portlet kt-portlet--tabs">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Transaksi
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line   nav-tabs-line-right nav-tabs-line-brand" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_portlet_tab_1_1" role="tab">
                                        Srv Transaksi
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_portlet_tab_1_2" role="tab">
                                        Non-Srv Transaksi
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_portlet_tab_1_1">
                                <div class="kt-scroll" data-scroll="true" data-height="300" style="height: 400px;">
                                    <div class="kt-list-timeline">
                                        <div class="kt-list-timeline__items" id="data_list2-1">
                                            <div class="kt-list-timeline__item" >
                                                <span class="kt-list-timeline__badge kt-list-timeline__badge--success"></span>
                                                <span class="kt-list-timeline__text">12 new users registered</span>
                                                <span class="kt-list-timeline__time">Just now</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="kt_portlet_tab_1_2">
                                <div class="kt-scroll" data-scroll="true" data-height="300" style="height: 400px;">
                                    <div class="kt-list-timeline">
                                        <div class="kt-list-timeline__items" id="data_list2-2">
                                            <div class="kt-list-timeline__item" >
                                                <span class="kt-list-timeline__badge kt-list-timeline__badge--success"></span>
                                                <span class="kt-list-timeline__text">12 new users registered</span>
                                                <span class="kt-list-timeline__time">Just now</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <!--begin::Modal-->
    <div class="modal fade" id="kt_modal_5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Statistik Kustom</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group ">
                            <label style="display: block" for="recipient-name" class="form-control-label">Dari tanggal:</label>
                            <div class="input-group date">
                                <input type="text" class="form-control" id="kt_datepicker_1_modal" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label style="display: block" for="recipient-name" class="form-control-label">Higga tanggal:</label>
                            <div class="input-group date">
                                <input type="text" class="form-control" id="kt_datepicker_2_modal" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="display: block" for="recipient-name" class="form-control-label">Pengelompokan:</label>
                            <select name="grouping_sel" id="sel_grouping" class="form-control">
                                <option value="d">Perhari</option>
                                <option value="m">Perbulan</option>
                                <option value="y">Pertahun</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="chart_custom_req" class="btn btn-primary">Dapatkan data</button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Modal-->
    <!--begin::Modal-->
    <div class="modal fade" id="kt_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Statistik Kustom</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group ">
                            <label style="display: block" for="recipient-name" class="form-control-label">Dari tanggal:</label>
                            <div class="input-group date">
                                <input type="text" class="form-control" id="kt_datepicker_1_modal_2" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>

                        </div>
                        <div class="form-group">
                            <label style="display: block" for="recipient-name" class="form-control-label">Higga tanggal:</label>
                            <div class="input-group date">
                                <input type="text" class="form-control" id="kt_datepicker_2_modal_2" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="la la-calendar-check-o"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label style="display: block" for="recipient-name" class="form-control-label">Pengelompokan:</label>
                            <select name="grouping_sel" id="sel_grouping_2" class="form-control">
                                <option value="d">Perhari</option>
                                <option value="m">Perbulan</option>
                                <option value="y">Pertahun</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" id="chart_custom_req_2" class="btn btn-primary">Dapatkan data</button>
                </div>
            </div>
        </div>
    </div>

    <!--end::Modal-->
@endsection

@section('script-bottom')


    <!--end::Page Vendors -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('/') }}admin_res/js/pages/dashboard.js" type="text/javascript"></script>
    <script src="{{ asset('/') }}admin_res/plugins/datatables/moment-with-locales.js"></script>
    <script src="{{ asset('/') }}admin_res/plugins/chartjs/Chart.js" type="text/javascript"></script>
    <!--end::Page Scripts -->
    <script>

        let actCharts = '';
        let transChart = '';

        let chart_latest = $('#charts_latest');
        let chart_custom = $('#charts_custom');
        let chart2_latest = $('#charts2_latest');
        let chart2_custom = $('#charts2_custom');

        let chart_modal = $('#kt_modal_5');
        let chart_modal2 = $('#kt_modal_6');

        let chart_btn_req = $('#chart_custom_req');
        let chart_btn_req2 = $('#chart_custom_req_2');

        let start_date_picker = $('#kt_datepicker_1_modal');
        let end_date_picker = $('#kt_datepicker_2_modal');
        let start_date_picker_2 = $('#kt_datepicker_1_modal_2');
        let end_date_picker_2 = $('#kt_datepicker_2_modal_2');

        let select_group = $('#sel_grouping');
        let select_group_2 = $('#sel_grouping_2');

        let data_list1 = $('#data_list1');
        let data_list2_1 = $('#data_list2-1');
        let data_list2_2 = $('#data_list2-2');
        let users = [];
        let online_user = $('#online_user_count');


        $(document).ready(function () {

            let listen = Echo.join('channel-active')
                .here((user)=>{
                    users = user;
                    setactive_user(users);
                    console.log(user.length);
                })
                .listen('.active-users',(event)=>{

                })
                .joining(user => {
                    console.log("Joinning "+ user.name);
                    users.push(user);
                    setactive_user(users);
                })
                .leaving(user => {
                   users = users.filter(u => u.id !== user.id);
                   setactive_user(users);
                });


            let def_start = moment().subtract(4, 'M').format('YYYY-MM-DD 00:00:00');
            let def_end = moment().add(1, 'M').format('YYYY-MM-DD 00:00:00');
            console.log(def_end);
            let def_grouping = 'm';
            initChart(null, null);
            initChart2(null,null,null);
            getData(def_start, def_end, def_grouping);
            getData2(def_start,def_end,def_grouping);
            otherInit();
            otherInit2();
        });


        function initChart(label, data) {
            let chartdata = {
                labels: label,
                datasets: [
                    {

                        backgroundColor: '#90a4ff',
                        borderColor: '#90a4ff',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: data
                    }
                ]
            };

            let options = {
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
                            display: false,
                            // drawBorder: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: true,
                            borderDash: [5, 5],
                            drawBorder: false,
                        },
                        ticks: {
                            precision: 0,
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false,
                }
            }

            let graphTarget = $("#graphCanvas");

            actCharts = new Chart(graphTarget, {
                type: 'line',
                data: chartdata,
                options: options,
            });
        }

        function initChart2(label, srv_trans, non_srv_trans) {
            let chartdata = {
                labels: label,
                datasets: [
                    {
                        label: 'Transaksi Service',
                        backgroundColor: 'rgba(52, 73, 94,0.9)',
                        borderColor: '#34495e',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: srv_trans
                    },
                    {
                        label : 'Transaksi Non-Service',
                        backgroundColor: 'rgba(52, 152, 219,0.9)',
                        borderColor: '#3498db',
                        hoverBackgroundColor: '#CCCCCC',
                        hoverBorderColor: '#666666',
                        data: non_srv_trans
                    },
                ]
            };

            let options = {
                scaleBeginAtZero: true,
                tooltips: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function (tooltipItem, data) {

                            let tooltipValue = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                            let lables = data.datasets[tooltipItem.datasetIndex].label;
                            let fin_val = parseInt(tooltipValue).toLocaleString("id-ID",
                                {style:"currency", currency:"IDR"}
                            );

                            return `${lables} : ${fin_val}`;
                        }
                    }
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                            // drawBorder: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: true,
                            borderDash: [5, 5],
                            drawBorder: false,
                        },
                        ticks: {
                            precision: 0,
                            beginAtZero: true,
                            callback: function (value, index, values) {
                                return value.toLocaleString("id-ID",
                                    {style:"currency", currency:"IDR"}
                                    );
                            }
                        }
                    }]
                },
                legend: {
                    display: true,
                }
            }

            let graphTarget2 = $("#transCharts");

            transChart = new Chart(graphTarget2, {
                type: 'line',
                data: chartdata,
                options: options,
            });
        }

        function getData(start, end, grouping) {
            let response_ = '';

            let ajax_req = $.ajax({
                url: "{{ route('sudo.other_data.data.activity-logs') }}",
                type: 'get',
                async: true,
                beforeSend: function(){
                    KTApp.progress(chart_btn_req);
                },
                data: {
                    'start_date': start,
                    'stop_date': end,
                    'grouping': grouping
                }
            });

            ajax_req.done((response) => {

                KTApp.unprogress(chart_btn_req);
                updateData(response.label, response.counted);
                generateListStat(response);
            });

        }

        function getData2(start, end, grouping) {
            let response_ = '';

            let ajax_req = $.ajax({
                url: "{{ route('sudo.other_data.data.transactions-logs') }}",
                type: 'get',
                async: true,
                beforeSend: function(){
                    KTApp.progress(chart_btn_req);
                },
                data: {
                    'start_date': start,
                    'stop_date': end,
                    'grouping': grouping
                }
            });

            ajax_req.done((response) => {

                KTApp.unprogress(chart_btn_req);
                updateData2(response.label, response.srv_transactions, response.non_srv_transactions);
                generateTrStat(response);
                console.log('trans');
                console.log(response);
            });

        }

        function updateData(label, data) {
            actCharts.data.labels = label;
            actCharts.data.datasets[0].data = data;
            actCharts.update();
        }

        function updateData2(label, srv_trans, non_srv_trans) {
            transChart.data.labels = label;
            transChart.data.datasets[0].data = srv_trans;
            transChart.data.datasets[1].data = non_srv_trans;
            transChart.update();
        }

        function otherInit() {
            chart_latest.on('click', function (e) {
                e.preventDefault();

                let cur_start = moment().subtract(4, 'M').format('YYYY-MM-DD 00:00:00');
                let cur_end = moment().add(1, 'M').format('YYYY-MM-DD 00:00:00');
                let cur_grouping = 'm';

                getData(cur_start, cur_end, cur_grouping);

                $(chart_custom).removeClass('active');
                $(this).addClass('active');
            });

            chart_custom.on('click', function (e) {
                e.preventDefault();

                $(chart_latest).removeClass('active');
                $(this).addClass('active');

                chart_modal.modal('toggle');
            });

            $(start_date_picker).datepicker({
                todayHighlight: true,
                orientation: "bottom left",
                templates: 'arrows',
                format: 'yyyy-mm-dd'
            });

            $(end_date_picker).datepicker({
                todayHighlight: true,
                orientation: "bottom left",
                templates: 'arrows',
                format: 'yyyy-mm-dd'
            });

            chart_btn_req.on('click', function (e) {
                e.preventDefault();
                let c_start = $(start_date_picker).val();
                let c_end = $(end_date_picker).val();
                let c_grouping = $(select_group).val();

                getData(c_start, c_end, c_grouping);

            });
        }

        function otherInit2() {
            chart2_latest.on('click', function (e) {
                e.preventDefault();

                let cur_start = moment().subtract(4, 'M').format('YYYY-MM-DD 00:00:00');
                let cur_end = moment().add(1, 'M').format('YYYY-MM-DD 00:00:00');
                let cur_grouping = 'm';

                getData2(cur_start, cur_end, cur_grouping);

                $(chart2_custom).removeClass('active');
                $(this).addClass('active');
            });

            chart2_custom.on('click', function (e) {
                e.preventDefault();

                $(chart2_latest).removeClass('active');
                $(this).addClass('active');

                chart_modal2.modal('toggle');
            });

            $(start_date_picker_2).datepicker({
                todayHighlight: true,
                orientation: "bottom left",
                templates: 'arrows',
                format: 'yyyy-mm-dd'
            });

            $(end_date_picker_2).datepicker({
                todayHighlight: true,
                orientation: "bottom left",
                templates: 'arrows',
                format: 'yyyy-mm-dd'
            });

            chart_btn_req2.on('click', function (e) {
                e.preventDefault();
                let c_start = $(start_date_picker_2).val();
                let c_end = $(end_date_picker_2).val();
                let c_grouping = $(select_group_2).val();

                getData2(c_start, c_end, c_grouping);

            });
        }


        function generateListStat(response) {
            let data_c = response.per_c;

            $(data_list1).empty();
            let str_generator = '';
            data_c.forEach(function (item, index) {
                str_generator =
                    `
                    <div class="kt-list-timeline__item" >
                        <span class="kt-list-timeline__badge kt-list-timeline__badge--success"></span>
                        <span class="kt-list-timeline__text">${item.company_name}</span>
                        <span class="kt-list-timeline__time">${item.counted}</span>
                    </div>
                    `;
                $(data_list1).append(str_generator);
            })

        }

        function generateTrStat(response) {
            let data_t_1 = response.tr_per_c.srv_transactions;
            let data_t_2 = response.tr_per_c.non_srv_transactions;

            $(data_list2_1).empty();
            $(data_list2_2).empty();

            let str_generator = '';
            let str_generator2 = '';

            data_t_1.forEach(function (item, index) {
                str_generator =
                    `
                        <div class="kt-list-timeline__item" >
                            <span class="kt-list-timeline__badge kt-list-timeline__badge--success"></span>
                            <span class="kt-list-timeline__text">${item.company_name}</span>
                            <span class="kt-list-timeline__time">${item.counted}</span>
                        </div>
                    `;
                $(data_list2_1).append(str_generator);
            });

            data_t_2.forEach(function (item, index) {
                str_generator2 =
                    `
                    <div class="kt-list-timeline__item" >
                        <span class="kt-list-timeline__badge kt-list-timeline__badge--success"></span>
                        <span class="kt-list-timeline__text">${item.company_name}</span>
                        <span class="kt-list-timeline__time">${item.counted}</span>
                    </div>
                    `;
                $(data_list2_2).append(str_generator2);
            })
        }

        function setactive_user(user) {
            $(online_user).text(user.length)
        }

    </script>
    <script>
        $('#storage_usage').addClass("kt-spinner kt-spinner--sm kt-spinner--brand");
        // $('#storage_size').addClass("kt-spinner kt-spinner--sm kt-spinner--brand");
        // $('#storage_progress').width(0);
        $(document).ready(function () {

            var getUsage = function () {
                $.ajax({
                    url: '{{ route("sudo.other_data.storage.all") }}',
                    type: 'GET',
                    dataType: 'json',
                    cache: false,
                    async: true,
                    beforeSend: function () {
                        // alert("before");
                        $('#storage_usage').empty();
                    },
                    complete: function () {
                        // alert("before");
                    },
                    success: function (data) {
                        $('#storage_usage').removeClass("kt-spinner kt-spinner--sm kt-spinner--brand");
                        // $('#storage_size').removeClass("kt-spinner kt-spinner--sm kt-spinner--brand");
                        $('#storage_usage').text(data["human_size"]);
                        // $('#storage_progress').width(data["usage_percentage"]);

                    }
                });
            };
            setTimeout(getUsage, 500);
            // setTimeout(alert("test"),2000);
        })
    </script>
@endsection
