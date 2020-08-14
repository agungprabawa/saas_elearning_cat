@extends('layouts.saas_admin.master')

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
                        <div class="kt-widget__content kt-hidden">
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
                            <a href="{{ route('sudo.customers.monitor.courses.details', [$courses->id_company,$courses->id_courses]) }}" class="kt-widget__item {{ widgetActiveMenu($nav,'overview') }}">
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
                                        Overview
                                    </span>
                                </span>
                            </a>
                            <hr>
                            <a href="{{ route('sudo.customers.monitor.courses.teachmaterials.list',[$managed['id_company'],$courses->id_courses]) }}" class="kt-widget__item kt-widget__item {{ widgetActiveMenu($nav,'teach') }}">
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
                                <span class="kt-badge kt-badge--unified-success kt-badge--sm kt-badge--rounded kt-badge--bolder">{{ $courses->teachMaterials->where('is_deleted','=',0)->count() }}</span>
                            </a>
                            <a href="{{ route('sudo.customers.monitor.courses.task.list',[$managed['id_company'],$courses->id_courses]) }}" class="kt-widget__item kt-widget__item {{ widgetActiveMenu($nav,'task') }}">
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
                            <a href="{{ route('sudo.customers.monitor.courses.participants.list',[$managed['id_company'],$courses->id_courses]) }}" class="kt-widget__item kt-widget__item {{ widgetActiveMenu($nav,'participant') }}">
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
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let btn_del = $('#btn_del');

        btn_del.on('click', function (e) {
            e.preventDefault();

            swal.fire({
                "title": "Hapus Kursus",
                "html": "Apakah anda akan menghapus kursus ini dari layanan ini ?",
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
                        url: "{{ route('sudo.customers.monitor.courses.delete',$managed['id_company']) }}",
                        type: 'post',
                        data: {
                            id_courses: "{{ $courses->id_courses }}",
                            password: result.value
                        },
                        async: false
                    });

                    ajax_res.done(function (response) {
                        if($.isEmptyObject(response.error)){
                            swal.fire({
                                "title": "Kursus Dihapus",
                                "html": "Kursus berhasil dihapus dari layanan ini",
                                "type": "success",
                                "confirmButtonClass": "btn btn-secondary",
                                confirmButtonText: "Oke",
                            }).then((result) => {
                                window.location.replace("{{ route('sudo.customers.monitor.courses.list',$managed['id_company']) }}");
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
