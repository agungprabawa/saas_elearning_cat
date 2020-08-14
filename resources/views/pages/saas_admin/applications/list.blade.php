@extends('layouts.saas_admin.master')
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
                Daftar Aplikasi </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs kt-hidden">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                     </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
               
                
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
        @foreach ($apps as $item)
            <div class="col-xl-4">
                <!--begin:: Widgets/Blog-->
                <div class="kt-portlet kt-portlet--height-fluid kt-widget19">
                    
                    <div class="kt-portlet__body">
                        <div class="kt-widget19__wrapper">
                            <div class="kt-widget19__content">
                                {{-- <div class="kt-widget19__userpic">
                                    <img src="{{ asset('/') }}admin_res/media/users/user1.jpg" alt="">
                                </div> --}}
                                <div class="kt-widget19__info" style="padding-left:0px !important">
                                    <a href="#" class="kt-widget19__username">
                                        {{ $item->label }}
                                    </a>
                                    <span class="kt-widget19__time">
                                       Harga: <strong>Rp. {{ number_format($item->price,0,',','.') }}</strong>
                                    </span>
                                </div>
                                <div class="kt-widget19__stats">
                                    
                                </div>
                            </div>
                            
                            <div class="kt-widget__text">
                                {{ $item->label }} {{ substr(strip_tags($item->desciptions),0,90) }}
                            </div>
                        </div>
                        <div class="kt-widget19__action">
                            <a href="{{ route('sudo.apps.manage.details',$item->id_s_attributes) }}" style="width:100%" class="btn btn-sm btn-success btn-bold">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!--end:: Widgets/Blog-->
            </div>
        @endforeach
        
    </div>
    

    <!--End::Section-->
</div>
<!--end::Portlet-->


@endsection

@section('script-bottom')

@endsection