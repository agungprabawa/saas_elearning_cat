@extends('layouts.student.master')

@section('css')
    <!--begin::Page Custom Styles(used by this page) -->
    <!--end::Page Custom Styles -->
    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('/') }}admin_res/css/pages/support-center/faq-2.css" rel="stylesheet" type="text/css"/>
    <style>
        .kt-sc-faq-2 {
            margin-top: 30px !important;
            background-size: cover !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-attachment: fixed !important;
            background: url('{{ $exam->cover_img_url }}');
        }
        .c-dp-5 {
            margin-bottom: 5px !important;
        }
    </style>
@endsection

@section('content')
    <!-- begin:: Content -->
    <div class="kt-container  kt-grid__item kt-grid__item--fluid" style="margin-top:30px">
    {{-- @include('pages.student.learning.learning-cover') --}}
    <!-- begin:: accordions -->
        <div class="row">
            <div class="col-lg-12">
                {{-- <div class="kt-portlet kt-portlet--height-fluid"> --}}
                <div class="kt-portlet">
                    <div class="kt-portlet__body">
                        <div class="kt-infobox">
                            <div class="kt-infobox__header">
                                <h2 class="kt-infobox__title">Deskripsi Ujian</h2>
                            </div>
                            <div class="kt-infobox__body">
                                {!! $exam->descriptions !!}
                                <p>
                                    <strong>Keterangan</strong>
                                </p>
                                <p class="c-dp-5">Tanggal Mulai:
                                    <strong>{{ formatDateTime($exam->start_date) }}</strong>
                                </p>
                                <p class="c-dp-5">Tanggal Selesai:
                                    @if($exam->is_no_end_time == 1)
                                        <strong>
                                            Tanpa tanggal selesai
                                        </strong>
                                    @else
                                        {{ formatDateTime($exam->end_date) }}
                                    @endif
                                </p>
                                <p class="">Batas waktu pengerjaan:
                                    <strong>{{ $exam->max_time ?? 'Tanpa tangal selesai' }} Menit</strong>
                                </p>
                                @if(count($exam->withCourses()) > 0)
                                <p>
                                    <strong>Refrensi Kursus</strong>
                                </p>
                                <p>
                                @foreach($exam->withCourses() as $item)
                                    <a href="{{ route('student.learning.join',$item->uuid) }}" class="btn btn-secondary">{{ $item->title }}</a>
                                @endforeach
                                </p>
                                @endif
                                
                                <p>
                                    <strong>Status Pengerjaan</strong>
                                </p>
                                <p class="c-dp-5">Dikerjakan pada:
                                    <strong>{{ formatDateTime($partisipation->exam_start) }}</strong>
                                </p>
                                <p class="c-dp-5">Diselesaikan pada:
                                    <strong>{{ formatDateTime($partisipation->exam_end) }}</strong>
                                </p>
                                <p class="c-dp-5">Hasil Skor:
                                    <strong>{{ $partisipation->final_result }}</strong>
                                </p>
                                <div class="form-group" style="padding: 10px 0">

                                    {{-- Check sudah dikerjakan atau belum --}}

                                    @if($partisipation->exam_start == '' && \Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($exam->end_date)))
                                        <a href="#" class="btn btn-danger">Tidak dikerjakan</a>
                                    @else
                                        @if($partisipation->final_result != '')
                                            <a href="{{ route('student.assistedtest.result.exam',$exam->uuid) }}"
                                               type="button" class="btn btn-success">Lihat Detail
                                            </a>
                                        @else
                                            <a href="{{ route('student.assistedtest.start.exam',$exam->uuid) }}" class="btn btn-success">Kerjakan</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: accordions -->
        <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__head">

                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line   nav-tabs-line-right nav-tabs-line-brand"
                        role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_portlet_tab_1_1" role="tab">
                                Komentar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_portlet_tab_1_2" role="tab">
                                Rating
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active" id="kt_portlet_tab_1_1">
                        <comment :user="{{ auth()->user() }}" :contentdata="{{ $exam }}" type_post="2"></comment>
                    </div>
                    <div class="tab-pane" id="kt_portlet_tab_1_2">
                        <rating :user="{{ auth()->user() }}" :contentdata="{{ $exam }}" type_post="2"
                                post_url="{{ route('post.rating.store') }}"></rating>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end:: Content -->
@endsection

@section('script-bottom')


@endsection
