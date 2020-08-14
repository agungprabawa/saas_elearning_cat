@extends('layouts.student.master')

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
                @lang('assisted_test.stdn-title') </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    {{ $exams->total() }} @lang('assisted_test.exam') </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                @if(isset($_GET['title']))
                Untuk pencarian: &nbsp; <strong>{{ $_GET['title'] ?? '' }}</strong>
                @endif
                <form action="{{ route('student.assistedtest.all.exams') }}" class="kt-margin-l-20" id="kt_subheader_search_form">
                    <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                        <input type="text" name="title" class="form-control" placeholder="Search..." id="generalSearch">
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
        @foreach ($exams as $item)
            <div class="col-xl-4">
                <!--begin:: Widgets/Blog-->
                <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
                    <div class="kt-portlet__body kt-portlet__body--fit kt-portlet__body--unfill">
                        <?php 
                            $img_url = asset('/').'admin_res/media/products/product4.jpg';
                            if(isset($item->cover_img_url)) {
                                $img_url = $item->cover_img_url;
                            }
                            setlocale(LC_TIME, 'Indonesia');
                            \Carbon\Carbon::setLocale('id');

                            $start_date = \Carbon\Carbon::parse($item->start_date)->formatLocalized('%d %h, %y');
                            $start_time = \Carbon\Carbon::parse($item->start_date)->formatLocalized('%H:%M');

                            $end_date = \Carbon\Carbon::parse($item->end_date)->formatLocalized('%d %h, %y');
                            $end_time = \Carbon\Carbon::parse($item->end_date)->formatLocalized('%H:%M');

                            if($item->is_start_immediately){
                                $start_date = \Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %h, %y');
                                $start_time = \Carbon\Carbon::parse($item->created_at)->formatLocalized('%H:%M');
                            }

                            if($item->is_no_end_time){
                                $end_date = \Lang::get('courses.pb-c-i-noend-date-1');
                                $end_time = '';
                            }
                        ?>
                        <div class="kt-widget19__pic kt-portlet-fit--top kt-portlet-fit--sides" style="min-height: 300px; background-image: url('{{ $img_url }}')">
                            <h3 class="kt-widget19__title kt-font-light">
                                {{ $item->title }}
                            </h3>
                            <div class="kt-widget19__shadow"></div>
                            <div class="kt-widget19__labels">
                                <a href="#" class="btn btn-label-light-o2 btn-bold ">Recent</a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-widget19__wrapper">
                            <div class="kt-widget19__content">
                                <div class="kt-widget19__userpic">
                                    <img src="{{ asset('/') }}admin_res/media/users/user1.jpg" alt="">
                                </div>
                                <div class="kt-widget19__info">
                                    <a href="#" class="kt-widget19__username">
                                        {{ $item->creator->name }}
                                    </a>
                                    <span class="kt-widget19__time">
                                        {{ $item->creator->email }}
                                    </span>
                                </div>
                                <div class="kt-widget19__stats">
                                    <span class="kt-widget19__number kt-font-brand">
                                        {{ $item->participants->count() }}
                                    </span>
                                    <a href="#" class="kt-widget19__comment">
                                        @lang('courses.pb-c-i-participant')
                                    </a>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="kt-widget__body">
                                <div class="kt-widget__stats kt-margin-t-20" style="display:flex !important; justify-content: space-between;">
                                    <div class="kt-widget__item d-flex align-items-center kt-margin-r-30">
                                        <span class="kt-widget__date kt-padding-0 kt-margin-r-10">
                                            Start
                                        </span>
                                        <div class="kt-widget__label">
                                            <span class="btn btn-label-brand btn-sm btn-bold btn-upper">{{ $start_date.' '.$start_time }}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__item d-flex align-items-center kt-padding-l-0">
                                        <span class="kt-widget__date kt-padding-0 kt-margin-r-10 ">
                                            Due
                                        </span>
                                        <div class="kt-widget__label">
                                            <span class="btn btn-label-danger btn-sm btn-bold btn-upper">{{ $end_date.' '.$end_time }}</span>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <hr>
                            <div class="kt-widget__text">
                                @lang('assisted_test.mng-max-time') : <strong>{{ $item->max_time }} @lang('general.lb-minutes')</strong>
                                <br><br>
                                {{ substr(strip_tags($item->descriptions),0,90) }}
                                
                            </div>
                            
                        </div>
                        <div class="kt-widget19__action">
                            <a href="{{ route('student.assistedtest.overview',[$item->uuid]) }}" style="width:100%" class="btn btn-sm btn-success btn-bold">Lihat Detail</a>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Blog-->
            </div>
        @endforeach
        
    </div>
    <div class="row">
        <div class="col-md-12">
            {{ $exams->links('pagination::default') }}
        </div>
        
    </div>

    <!--End::Section-->
</div>
<!--end::Portlet-->


@endsection

@section('script-bottom')

@endsection