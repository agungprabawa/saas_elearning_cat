@extends('layouts.student.master')

@section('css')
<!--begin::Page Custom Styles(used by this page) -->


<!--end::Page Custom Styles -->
 <!--begin::Page Custom Styles(used by this page) -->
 <link href="{{ asset('/') }}admin_res/css/pages/support-center/faq-2.css" rel="stylesheet" type="text/css" />
<style>
    .kt-sc-faq-2{
        margin-top:30px !important;
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-attachment: fixed !important;
        background: url('{{ $courses->cover_img_url }}');
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
                            <h2 class="kt-infobox__title">@lang('courses.stdn-learning-curent-desc')</h2>
                        </div>
                        <div class="kt-infobox__body">
                            {!! $courses->descriptions !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

        <!--begin::Portlet-->
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__head">

                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-bold nav-tabs-line   nav-tabs-line-right nav-tabs-line-brand" role="tablist">
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
                        <comment :user="{{ auth()->user() }}" :contentdata="{{ $courses }}" type_post="1"></comment>
                    </div>
                    <div class="tab-pane" id="kt_portlet_tab_1_2">
                        <rating :user="{{ auth()->user() }}" :contentdata="{{ $courses }}" type_post="1" post_url="{{ route('post.rating.store') }}"></rating>
                    </div>

                </div>
            </div>
        </div>

        <!--end::Portlet-->

        <!-- end:: accordions -->

{{--    @include('pages.student.learning.comment')--}}
</div>

<!-- end:: Content -->
@endsection

@section('script-bottom')
<script src="{{ asset('/') }}admin_res/plugins/timejs/timeme.js"></script>
<script type="text/javascript">
    // Initialize library and start tracking time
    TimeMe.initialize({
        currentPageName: "my-home-page", // current page
        idleTimeoutInSeconds: 0 // seconds
    });

    var timeSpentOnPage = TimeMe.getTimeOnCurrentPageInSeconds();

</script>
<script>
    $(window).on('beforeunload', function() {

        var url = "{{ route('log.courses') }}";
        var formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('uuid', '{{ $log->uuid }}');
        formData.append('total_access_time', TimeMe.getTimeOnCurrentPageInSeconds());
        navigator.sendBeacon(url, formData);
        // console.log(timeSpentOnPage);
    });

</script>

@endsection
