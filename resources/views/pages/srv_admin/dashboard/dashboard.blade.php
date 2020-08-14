@extends('layouts.srv_admin.master')

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
                <a href="#" class="btn" >
                    <vdatenow date="now" type="date"></vdatenow> &nbsp;

                    <!--<i class="flaticon2-calendar-1"></i>-->
                </a>
                <a href="#" data-clipboard="true" id="link_join_layanan" class="btn btn-brand">
                    Link Layanan
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
                    Informasi singkat layanan anda
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
                                        Berlaku Hingga: <strong>
                                            {{ formatDateOnly(auth()->user()->company->subscribe_until) }}
                                        </strong>

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
                                        E-Learning : <strong>Terdapat {{ $company->courses->where('is_deleted','=',0)->count() }} pembelajaran</strong>
                                    </p>
                                    <p class="kt-callout__desc" style="color: #fff">
                                        Assisted Test : <strong>Terdapat {{ $company->exams->where('is_deleted','=',0)->count() }} ujian</strong>
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
                                        Pelajar
                                    </h3>
                                    <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px !important">
                                        Total Pelajar: <strong>{{ $company->usersCount() }} Orang</strong>
                                    </p>
                                    <p class="kt-callout__desc" style="color: #fff; margin-bottom: 0px !important">
                                        Rerata akses E-learning: <strong>{{ round($company->avgElearningAccess()) }} Menit</strong>
                                    </p>
                                    <p class="kt-callout__desc" style="color: #fff;">
                                        Rerata nilai Ujian: <strong>{{ $company->avgExamsResult() }} / 100 poin</strong>
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
            <div class="kt-portlet kt-hidden kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Pengumuman
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
                        <?php
                            $colorful = [
                                "kt-list-timeline__badge--success",
                                "kt-list-timeline__badge--info",
                                "kt-list-timeline__badge--danger",
                                "kt-list-timeline__badge--warning",
                                "kt-list-timeline__badge--brand"
                            ];

                        ?>
                        <div class="kt-list-timeline">
                            <div class="kt-list-timeline__items">
                                @if ($announcement->count() < 1)
                                    <span>Belum ada pengumuman</span>
                                @endif
                                @foreach ($announcement as $item)
                                    <div class="kt-list-timeline__item">
                                        <span class="kt-list-timeline__badge {{ $colorful[rand(0,4)] }}"></span>
                                        <span class="kt-list-timeline__text">{{ $item->title }}</span>
                                        <span class="kt-list-timeline__time">Just now</span>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <dashboard-announcement :current_user="{{ auth()->user() }}"></dashboard-announcement>
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

        let def_start = moment().subtract(4, 'M').format('YYYY-MM-DD 00:00:00');
        let def_end = moment().add(1, 'M').format('YYYY-MM-DD 00:00:00');
        console.log(def_end);
        let def_grouping = 'm';
        initChart(null, null);
        getData(def_start, def_end, def_grouping);
        otherInit();
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

    function getData(start, end, grouping) {
        let response_ = '';

        let ajax_req = $.ajax({
            url: "{{ route('srv_admin.other_data.logs') }}",
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
        });

    }

    function updateData(label, data) {
        actCharts.data.labels = label;
        actCharts.data.datasets[0].data = data;
        actCharts.update();
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




</script>
<script>
    $('#storage_usage').addClass("kt-spinner kt-spinner--sm kt-spinner--brand");
    // $('#storage_size').addClass("kt-spinner kt-spinner--sm kt-spinner--brand");
    // $('#storage_progress').width(0);
    $(document).ready(function() {

        var getUsage = function(){
            $.ajax({
                url: '{{ route("srv_admin.subscribtions.storage.usage") }}',
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
                    console.log(data);
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
    "use strict";
    // Class definition

    var KTClipboardDemo = function () {

        // Private functions
        var demosc = function () {
            // basic example
            new ClipboardJS('[data-clipboard=true]',{
                text: ({ dataset: { clipboardTarget } }) => {
                    return "{{ route('student.auth.register',$company->uuid) }}";
                }
            }).on('success', function(e) {
                e.clearSelection();
                swal.fire({
                    "title": "@lang('courses.msg-copy-share-title')",
                    "html": "Link berikut digunakan untuk bergabung ke Layanan anda",
                    "type": "success",
                    "confirmButtonClass": "btn btn-primary",
                    allowOutsideClick: true,
                    confirmButtonText: "OK",
                    cancelButtonText: "@lang('general.msg-success-ok-btn')",
                })
            });
        }

        return {
            // public functions
            init: function() {
                demosc();
            }
        };
    }();

    jQuery(document).ready(function() {
        KTClipboardDemo.init();
    });
</script>
@endsection
