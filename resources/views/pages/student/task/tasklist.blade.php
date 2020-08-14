<?php
    $strViewBlade = '';
    if(auth()->user()->active_status == 1 || auth()->user()->active_status == 2){
        $strViewBlade = 'layouts.srv_admin.master';
    }else{
        $strViewBlade = 'layouts.student.master';
    }
?>
@extends($strViewBlade)
@section('css')
<style>
    .d-flex {
        display: -webkit-box !important;
        display: -ms-flexbox !important;
        /* display: flex !important; */
    }
</style>

@endsection

@section('content')

<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Daftar Tugas </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    {{ $task->total() }} Tugas </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <form class="kt-margin-l-20" id="kt_subheader_search_form">
                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                        <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                        <span class="kt-input-icon__icon kt-input-icon__icon--right">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"></rect>
                                        <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero"></path>
                                    </g>
                                </svg>

                                <!--<i class="flaticon2-search-1"></i>-->
                            </span>
                        </span>
                    </div>
                </form>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>

    </div>
</div>

<!-- end:: Subheader -->

<!-- end:: Subheader -->

<!-- begin:: Content -->

<!--begin::Portlet-->

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <!--Begin::Section-->
    <div class="row">
        @foreach ($task as $item)
            <div class="col-xl-4">
                <!--begin:: Widgets/Blog-->
                <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
                    <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
                        <?php
                            setlocale(LC_TIME, 'Indonesia');
                            \Carbon\Carbon::setLocale('id');

                            $createdAt = \Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %h, %y %H:%M');
                            $startAt = \Carbon\Carbon::parse($item->start_at)->formatLocalized('%d %h, %y %H:%M');
                            $endAt = 'Tidak ditentukan';
                            if($item->end_at != ''){
                                $endAt = \Carbon\Carbon::parse($item->end_at)->formatLocalized('%d %h, %y %H:%M');
                            }

                        ?>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-widget19__wrapper">
                            <div class="kt-widget19__content" style="margin-bottom:15px">
                                {{-- <div class="kt-widget19__userpic">
                                    <img src="{{ asset('/') }}admin_res/media/users/user1.jpg" alt="">
                                </div> --}}
                                <div class="kt-widget19__info" style="padding-left:0px !important;">
                                    <a href="#" class="kt-widget19__username">
                                        {{ $item->title }} - {{ $item->courses->title }}
                                    </a>
                                    <span class="kt-widget19__time">
                                        {{ $createdAt }}
                                    </span>
                                </div>
                                <div class="kt-widget19__stats">

                                </div>
                            </div>

                            <div class="kt-widget__text">
                                {{ substr(strip_tags($item->content),0,90) }}

                            </div>
                            <div class="kt-widget__text" style="padding-top:10px">
                                Dimulai pada :  <strong>{{ $startAt }}</strong> <br>
                                Selesai pada : <strong>{{ $endAt }}</strong> <br>
                                Maksimal Submit : <strong>{{ ($item->max_submit == 0) ? 'Tanpa batasan': $item->max_submit }}</strong> <br>

                                Status Pengerjaan : {!!
                                ($item->submitStatus() <= 0) ?
                                '<strong class="kt-font-warning">Belum dikerjakan</strong>':
                                '<strong class="kt-font-success">Sudah dikerjakan</strong>' !!}
                            </div>
                        </div>
                        <div class="kt-widget19__action">
                            <a href="{{ route('student.task.list',[$item->courses->id_courses, $item->id_task]) }}" style="width:100%" class="btn btn-sm btn-success btn-bold">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Blog-->
            </div>
        @endforeach

    </div>
    <div class="row">
        <div class="col-md-12">
            {{ $task->links('pagination::default') }}
        </div>

    </div>

    <!--End::Section-->
</div>
<!--end::Portlet-->


@endsection

@section('script-bottom')

@endsection
