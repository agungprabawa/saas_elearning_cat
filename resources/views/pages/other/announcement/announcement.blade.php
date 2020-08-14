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
        background: url('{{ $announcement->cover_img_url }}');
    }
    .c-dp-5{
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
                            <h2 class="kt-infobox__title">{{ $announcement->title }}</h2>
                        </div>
                        <div class="kt-infobox__body">
                            {!! $announcement->content !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- end:: accordions -->

    @include('pages.other.announcement.comment')
</div>

<!-- end:: Content -->
@endsection

@section('script-bottom')


@endsection
