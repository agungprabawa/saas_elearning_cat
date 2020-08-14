@extends('layouts.student.master')

@section('css')
 <!--begin::Page Custom Styles(used by this page) -->
 <link href="{{  asset('/') }}admin_res/css/pages/support-center/home-1.css" rel="stylesheet" type="text/css" />


 <style>
     .item-1{
        background:linear-gradient(0deg, #F9A825E5, #FDD835E5), url('{{ $courses[0]->cover_img_url ?? "" }}');
        background-size: cover;
     }

     .item-2{
        background:linear-gradient(0deg, #29B6F6E5, #03A9F4E5), url('{{ $courses[1]->cover_img_url ?? "" }}');
        background-size: cover;
     }

     .item-3{
        background:linear-gradient(0deg, #00E676E5, #2ecc71E5), url('{{ $courses[2]->cover_img_url ?? "" }}');
        background-size: cover;
     }

 </style>
 <!--end::Page Custom Styles -->

@endsection

@section('content')
<!-- begin:: Hero

background: linear-gradient(90deg, #00d2ff 0%, #3a47d5 100%);
-->

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
                <a href="#" class="" style="padding: 0.65rem 1rem; color:#959cb6 !important; background: #e1e3ec; font-weight: 500">
                    <vdatenow date="now" type="date"></vdatenow> &nbsp;

                    <!--<i class="flaticon2-calendar-1"></i>-->
                </a>

            </div>
        </div>
    </div>
</div>

<!--

    background: linear-gradient(90deg, #1CB5E0 0%, #000851 100%);
-->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-sc" style="background:linear-gradient(90deg, #1CB5E0BF 0%, #000851BF 100%), url('{{  asset("/") }}admin_res/media/bg/bg-9.jpg'); background-size:cover !important; border-radius: 4px">
        <div class="kt-container ">
            <div class="kt-sc__top" style="border-bottom: none !important">

                @if ($exams->count() < 1)
                    <h3 class="kt-sc__title" style="color: #fff;">
                        Belum ada kursus
                    </h3>
                @else
                    <h3 class="kt-sc__title" style="color: #fff;">
                        Pelajari kembali kursus
                    </h3>
                @endif

                <div class="kt-sc__nav">
                    <a href="{{ route('student.learning.all.learning') }}" class="kt-link kt-font-bold">Semua kursus</a>
                    {{-- <a href="#" class="kt-link kt-font-bold">Visit Blog</a> --}}
                </div>
            </div>

            <div class="row" style="margin-top:20px">
                <?php $j = 1; ?>

                @foreach ($courses as $item)
                <div class="col-md-4">
                    <div class="kt-portlet kt-callout item-{{ $j }}" style="padding: 0px">
                        <div class="kt-portlet__body" style="min-height: 200px;position: relative;">
                            <div class="kt-callout__body" style="position: absolute;bottom: 30px;">
                                <a href="{{ route('student.learning.learning',$item->uuid) }}">
                                    <div class="kt-callout__content">
                                        <h3 class="kt-callout__title" style="margin-bottom: 0px; color: #fff">
                                            {{ $item->title }}
                                        </h3>
                                        <p class="kt-callout__desc" style="color: #fff">
                                            {{-- {{ $item->lastAccess() }} --}}
                                            Diakses <vdatenow date="{{ $item->lastAccess() ?? 'kosong' }}" type="fromnow"></vdatenow>
                                        </p>
                                    </div>
                                    <div class="kt-callout__action kt-hidden">
                                        <a href="#" class="btn btn-custom btn-bold btn-upper btn-font-sm  btn-brand">Submit a Request</a>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <?php $j++ ?>
                @endforeach

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="kt-portlet">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Overview Ujian Anda
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar kt-hidden">
                        <ul class="nav nav-pills nav-pills-sm nav-pills-label nav-pills-bold" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_widget5_tab1_content" role="tab">
                                    Latest
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab2_content" role="tab">
                                    Month
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_widget5_tab3_content" role="tab">
                                    All time
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-scroll" data-scroll="true" data-height="400" data-scrollbar-shown="true">
                        <div class="kt-widget5">
                            @if ($exams->count() < 1)
                                <span>Belum ada ujian</span>
                            @endif
                            @foreach ($exams as $item)
                                <div class="kt-widget5__item">
                                    <div class="kt-widget5__content">
                                        <div class="kt-widget5__pic">
                                            <img class="kt-widget7__img" src="{{ $item->cover_img_url }}" alt="">
                                        </div>
                                        <div class="kt-widget5__section">
                                            <a href="{{ route('student.assistedtest.overview',$item->uuid) }}" class="kt-widget5__title">
                                                {{ $item->title }}
                                            </a>
                                            <p class="kt-widget5__desc">

                                                {{ substr(strip_tags($item->descriptions),0,45) }}...
                                            </p>
                                            <div class="kt-widget5__info">
                                                {{-- <span>Author:</span>
                                                <span class="kt-font-info " style="color: #595d6e !important">{{ $item->name }}</span> --}}
                                                <p style="margin-bottom: 0px">
                                                    <span>Dimulai:</span>
                                                    <span class="kt-font-info" style="color: #595d6e !important"><vdatenow date="{{ $item->start_date }}" type="datetime"></vdatenow></span>
                                                </p>
                                                <p>
                                                    <span>Batas akhir:</span>
                                                    <span class="kt-font-info" style="color: #595d6e !important"><vdatenow date="{{ $item->end_date ?? 'kosong' }}" type="datetime"></vdatenow></span>
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-widget5__content">
                                        <div class="kt-widget5__stats">
                                            <span class="kt-widget5__number">{{ $item->final_result ?? '-' }}</span>
                                            <span class="kt-widget5__sales">Skor</span>
                                        </div>
                                        <div class="kt-widget5__stats">
                                            <span class="kt-widget5__number">{{ $item->avgOnGroup() }}</span>
                                            <span class="kt-widget5__votes">Avg.</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <dashboard-announcement :current_user="{{ auth()->user() }}"></dashboard-announcement>
        </div>
    </div>
</div>


<!-- end:: Hero -->
@endsection

@section('script-bottom')


@endsection
