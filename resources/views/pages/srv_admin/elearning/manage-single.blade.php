@extends('layouts.srv_admin.master')

@section('css')
@yield('other-css')
<style>
    .kt-portlet__head--noborder {
        background-image: url("{{ $courses->cover_img_url }}") !important;
        background-repeat: no-repeat !important;
        background-size: cover !important;
        height: 125px !important;
    }

    .kt-widget--user-profile-1 {
        padding-top: 10px !important;
        margin-top: 0px !important;
    }

    .no-padding-left {
        padding-left: 0px !important;
    }

    .kt-form {
        width: 85%;
        margin: 0 auto;
    }

    .btn-del {
        -webkit-transition: color 0.3s ease;
        transition: color 0.3s ease;
        background: #ff7f7f;
        border-radius: 4px;
    }

    .btn-del:hover{
        -webkit-transition: color 0.3s ease !important;
        transition: color 0.3s ease !important;
        background: #ff7f7f !important;
        border-radius: 4px !important;
    }
</style>
@endsection

@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                <button class="kt-subheader__mobile-toggle kt-subheader__mobile-toggle--left" id="kt_subheader_mobile_toggle"><span></span></button>
                @lang('courses.mng-title') </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    {{ $courses->title }} </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>


                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>

    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->

<!--begin::Portlet-->

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <!--Begin::Section-->
    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
        <!--Begin:: App Aside Mobile Toggle-->
        <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
            <i class="la la-close"></i>
        </button>

        <!--End:: App Aside Mobile Toggle-->
        <!--Begin:: App Aside-->
        <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">

            <!--begin:: Widgets/Applications/User/Profile1-->
            <div class="kt-portlet kt-portlet--height-fluid-">
                <div class="kt-portlet__head  kt-portlet__head--noborder">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                        </h3>
                    </div>

                </div>
                <div class="kt-portlet__body kt-portlet__body--fit-y">

                    <!--begin::Widget -->
                    <div class="kt-widget kt-widget--user-profile-1">
                        <div class="kt-widget__head">
                            {{-- <div class="kt-widget__media">
                                <img src="{{ asset('/') }}admin_res/media/users/100_13.jpg" alt="image">
                        </div> --}}
                        <div class="kt-widget__content no-padding-left">
                            <div class="kt-widget__section">
                                <a href="#" class="kt-widget__username">
                                    {{ $courses->title }}
                                    <i class="flaticon2-correct kt-font-success"></i>
                                </a>
                                <span class="kt-widget__subtitle">
                                    @if(isset($courses->categorys))
                                    {{ $courses->categorys->category }}
                                    @else
                                    @lang('courses.str-select-0')
                                    @endif

                                </span>
                            </div>
                            <div class="kt-widget__action">
                                {{-- <button type="button" class="btn btn-info btn-sm">@lang('courses.m-btn-add-subj')</button>&nbsp; --}}
                                {{-- <button type="button" class="btn btn-success btn-sm">follow</button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="kt-widget__body">
                        <div class="kt-widget__content">
                            <input type="hidden" id="shared_link" value="{{ route('student.learning.join',$courses->uuid) }}">
                            <div class="kt-widget__info">
                                <span class="kt-widget__label">@lang('courses.m-c-share-link'):</span>
                                @if($courses->is_share_link == 1)
                                <a href="#" class="kt-widget__data" data-clipboard="true" data-clipboard-target="#shared_link">@lang('courses.m-c-share-copy')</a>
                                @else
                                <a href="#" class="kt-widget__data" >@lang('courses.m-c-no-share-copy')</a>
                                @endif
                            </div>
                            <div class="kt-widget__info">
                                <span class="kt-widget__label">Start:</span>
                                <?php
                                    $start_date = \Carbon\Carbon::parse($courses->start_date)->formatLocalized('%d %h, %y - %H:%M');

                                    $end_date = '-';
                                    if($courses->is_no_end_time == 0){
                                        $end_date = \Carbon\Carbon::parse($courses->end_date)->formatLocalized('%d %h, %y - %H:%M');
                                    }
                                ?>
                                <a href="#" class="kt-widget__data">{{ $start_date }}</a>
                            </div>
                            <div class="kt-widget__info">
                                <span class="kt-widget__label">Due:</span>
                                <span class="kt-widget__data">{{ $end_date }}</span>
                            </div>
                        </div>
                        <div class="kt-widget__items">
                            <a style="display:none" href="custom/apps/user/profile-1/overview.html" class="kt-widget__item {{ widgetActiveMenu($nav,'overview') }}">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                                <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        Profile Overview
                                    </span>
                                </span>
                            </a>
                            <hr>
                            <a href="{{ route('srv_admin.courses.teach',[$courses->uuid]) }}" class="kt-widget__item kt-widget__item {{ widgetActiveMenu($nav,'teach') }}">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        @lang('courses.subject')
                                    </span>
                                </span>
                                <span class="kt-badge kt-badge--unified-success kt-badge--sm kt-badge--rounded kt-badge--bolder">{{ $courses->teachMaterials->count() }}</span>
                            </a>
                            <a href="{{ route('srv_admin.courses.task',[$courses->uuid]) }}" class="kt-widget__item kt-widget__item {{ widgetActiveMenu($nav,'task') }}">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        Tugas
                                    </span>
                                </span>
                                <span class="kt-badge kt-badge--unified-success kt-badge--sm kt-badge--rounded kt-badge--bolder">{{ $courses->coursesTask->where('is_deleted','=',0)->count() }}</span>
                            </a>
                            <a href="{{ route('srv_admin.courses.participants',[$courses->uuid]) }}" class="kt-widget__item kt-widget__item {{ widgetActiveMenu($nav,'participant') }}">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24" />
                                                <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        @lang('courses.pb-c-i-participant')
                                    </span>
                                </span>
                                <span class="kt-badge kt-badge--unified-success kt-badge--sm kt-badge--rounded kt-badge--bolder">{{ $courses->participants->count() }}</span>
                            </a>
                            <hr>
                            <a href="{{ route('srv_admin.courses.edit1',[$courses->uuid]) }}" class="kt-widget__item {{ widgetActiveMenu($nav,'informations') }}">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                                <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
                                                <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="kt-widget__desc">
                                        @lang('courses.tab-1')
                                    </span>
                                </span>
                            </a>
                            <a href="{{ route('srv_admin.courses.edit2',[$courses->uuid]) }}" class="kt-widget__item {{ widgetActiveMenu($nav,'config') }}">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="kt-widget__desc">
                                        @lang('courses.tab-2')
                                    </span>
                                    </spandiv>
                            </a>
                            <a href="{{ route('srv_admin.courses.edit3',[$courses->uuid]) }}" class="kt-widget__item {{ widgetActiveMenu($nav,'type') }}">
                                <span class="kt-widget__section">
                                    <span class="kt-widget__icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M20.5,11 L22.5,11 C23.3284271,11 24,11.6715729 24,12.5 C24,13.3284271 23.3284271,14 22.5,14 L20.5,14 C19.6715729,14 19,13.3284271 19,12.5 C19,11.6715729 19.6715729,11 20.5,11 Z M1.5,11 L3.5,11 C4.32842712,11 5,11.6715729 5,12.5 C5,13.3284271 4.32842712,14 3.5,14 L1.5,14 C0.671572875,14 1.01453063e-16,13.3284271 0,12.5 C-1.01453063e-16,11.6715729 0.671572875,11 1.5,11 Z" fill="#000000" opacity="0.3" />
                                                <path d="M12,16 C13.6568542,16 15,14.6568542 15,13 C15,11.3431458 13.6568542,10 12,10 C10.3431458,10 9,11.3431458 9,13 C9,14.6568542 10.3431458,16 12,16 Z M12,18 C9.23857625,18 7,15.7614237 7,13 C7,10.2385763 9.23857625,8 12,8 C14.7614237,8 17,10.2385763 17,13 C17,15.7614237 14.7614237,18 12,18 Z" fill="#000000" fill-rule="nonzero" />
                                            </g>
                                        </svg> </span>
                                    <span class="kt-widget__desc">
                                        @lang('courses.tab-3')
                                    </span>
                                </span>

                            </a>
                            <hr>
                            <a href="#" id="btn_del" class="kt-widget__item btn-del">
                                <span class="kt-widget__section ">
                                    <span class="kt-widget__icon" style="padding: 0 8px; color: #FFF">

                                        <i class="fal fa-trash"></i>
                                    </span>
                                    <span class="kt-widget__desc" style="color: #FFF">
                                        Hapus Kursus
                                    </span>
                                </span>

                            </a>
                        </div>
                    </div>
                </div>

                <!--end::Widget -->
            </div>
        </div>

        <!--end:: Widgets/Applications/User/Profile1-->
    </div>

    <!--End:: App Aside-->
    @yield('manage')

</div>
<!--End::Section-->
</div>
<!--end::Portlet-->
@endsection

@section('script-bottom')
<script>
    "use strict";

    // Class definition
    var KTUserProfile = function() {
        // Base elements
        var avatar;
        var offcanvas;

        // Private functions
        var initAside = function() {
            // Mobile offcanvas for mobile mode
            offcanvas = new KTOffcanvas('kt_user_profile_aside', {
                overlay: true,
                baseClass: 'kt-app__aside',
                closeBy: 'kt_user_profile_aside_close',
                toggleBy: 'kt_subheader_mobile_toggle'
            });
        }

        var initUserForm = function() {
            avatar = new KTAvatar('kt_user_avatar');
        }

        return {
            // public functions
            init: function() {
                initAside();
                initUserForm();
            }
        };
    }();

    KTUtil.ready(function() {
        KTUserProfile.init();
    });
</script>
<script>
"use strict";
// Class definition

var KTClipboardDemo = function () {

    // Private functions
    var demos = function () {
        // basic example
        new ClipboardJS('[data-clipboard=true]',{
            text: ({ dataset: { clipboardTarget } }) => {
                const { value, innerHTML } = document.querySelector(clipboardTarget);
                return value || innerHTML;
            }
        }).on('success', function(e) {
            e.clearSelection();
            swal.fire({
                "title": "@lang('courses.msg-copy-share-title')",
                "html": "@lang('courses.msg-copy-share-content')",
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
            demos();
        }
    };
}();

jQuery(document).ready(function() {
    KTClipboardDemo.init();
});
</script>

<script>
    let btn_del = $('#btn_del');

    btn_del.on('click', function (e) {
        e.preventDefault();

        swal.fire({
            "title": "Hapus Kursus",
            "html": "Apakah anda akan menghapus kursus ini dari layanan anda ?",
            "type": "warning",
            "confirmButtonClass": "btn btn-primary",
            "cancelButtonClass": "btn btn-secondary",
            confirmButtonText: "Ya, hapus kursus",
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
                    url: "{{ route('srv_admin.courses.remove') }}",
                    type: 'post',
                    data: {
                        uuid: "{{ $courses->uuid }}",
                        password: result.value
                    },
                    async: false
                });

                ajax_res.done(function (response) {
                    if($.isEmptyObject(response.error)){
                        swal.fire({
                            "title": "Kursus Dihapus",
                            "html": "Kursus berhasil dihapus dari layanan anda",
                            "type": "success",
                            "confirmButtonClass": "btn btn-secondary",
                            confirmButtonText: "Oke",
                        }).then((result) => {
                            window.location.replace("{{ route('srv_admin.courses.show') }}");
                        });
                    }else{
                        swal.fire({
                            "title": "Gagal Dihapus",
                            "html": "Kursus gagal dihapus, periksa kembali password anda",
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

@yield('other-script')
@endsection
