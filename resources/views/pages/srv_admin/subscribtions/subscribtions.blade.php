@extends('layouts.srv_admin.master')

@section('css')

<!--begin::Page Custom Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/css/pages/pricing/pricing-1.css" rel="stylesheet" type="text/css" />
<style>
    .kt-widget31 .kt-widget31__item {
        margin-bottom: 2.5rem !important;
    }

    .kt-badge.kt-badge--inline {
        font-size: 1rem !important;
        font-weight: 600 !important;
        padding: 10px 30px !important;
    }

    .kt-font-disabled {
        color: #6c757d !important;
    }
</style>
<!--end::Page Custom Styles -->
@endsection


@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                @lang('menu.nav-more-subscribe') </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Status </a>
                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>

    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    @if($isActiveUpgradePayment)
    <div class="row">
        <div class="col">
            <div class="alert alert-light alert-outline-warning alert-elevate fade show" role="alert">
                <div class="alert-icon"><i style="color:#ffb822 !important" class="flaticon-information kt-font-brand"></i></div>
                <div class="alert-text">
                    @lang('subscribtions.need-complete-upgrade')
                </div>
            </div>
        </div>
    </div>
    @endif
    <!--begin::Portlet-->
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="fa flaticon-interface-1"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    @lang('menu.nav-more-subscribe')
                </h3>
            </div>
           <div class="kt-portlet__head-toolbar">

              <a href="#" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
                 @lang('subscribtions.lb-config')
              </a>
              <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right">
                 <ul class="kt-nav" style="min-width: 210px">
                    <li class="kt-nav__section kt-nav__section--first">
                       <span class="kt-nav__section-text">@lang('subscribtions.lb-config')</span>
                    </li>
                    @if($isActiveUpgradePayment == false)
                    <li class="kt-nav__item">
                       <a href="{{ route('srv_admin.subscribtions.change') }}" class="kt-nav__link">
                          <i class="kt-nav__link-icon far fa-box-open"></i>
                          <span class="kt-nav__link-text">@lang('subscribtions.btn-package-change')</span>
                       </a>
                    </li>
                    @endif
                    <li class="kt-nav__item">
                       <a href="{{ route('srv_admin.settings.index') }}" class="kt-nav__link">
                          <i class="kt-nav__link-icon far fa-cogs"></i>
                          <span class="kt-nav__link-text">@lang('subscribtions.btn-other-option')</span>
                       </a>
                    </li>

                 </ul>
              </div>

           </div>
        </div>
        <div class="kt-portlet__body">
            <div class="kt-pricing-1">
                <div class="kt-pricing-1__items row">
                    <div class="kt-pricing-1__item col-lg-3">
                        <div class="kt-pricing-1__visual">
                            <div class="kt-pricing-1__hexagon1"></div>
                            <div class="kt-pricing-1__hexagon2"></div>
                            @if($curentSubs[0]->size == 1)
                            <span class="kt-pricing-1__icon kt-font-brand"><i class="fa flaticon-presentation-1"></i></span>
                            @else
                            <span class="kt-pricing-1__icon kt-font-disabled"><i class="fa flaticon-presentation-1"></i></span>
                            @endif
                        </div>
                        <span class="kt-pricing-1__price">{{ $curentSubs[0]->label }}</span>
                        <h2 class="kt-pricing-1__subtitle">{{ rupiah($curentSubs[0]->price) }}</h2>
                        <span class="kt-pricing-1__description">
                            <span style="padding: 0 5px">
                                {{ strip_tags($curentSubs[0]->desciptions) }}
                            </span>
                        </span>
                        <div class="kt-pricing-1__btn">
                            {{-- <span type="button" class="btn btn-brand btn-custom btn-pill btn-wide btn-uppercase btn-bolder btn-sm">Purchase</span> --}}
                            @if($curentSubs[0]->size == 1)
                            <span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill kt-badge--rounded">Enabled</span>
                            @else
                            <span class="kt-badge kt-badge--gray kt-badge--inline kt-badge--pill kt-badge--rounded">Disabled</span>
                            @endif
                        </div>
                    </div>
                    <div class="kt-pricing-1__item col-lg-3">
                        <div class="kt-pricing-1__visual">
                            <div class="kt-pricing-1__hexagon1"></div>
                            <div class="kt-pricing-1__hexagon2"></div>
                            @if($curentSubs[1]->size == 1)
                            <span class="kt-pricing-1__icon kt-font-brand"><i class="fa flaticon-list"></i></span>
                            @else
                            <span class="kt-pricing-1__icon kt-font-disabled"><i class="fa flaticon-list"></i></span>
                            @endif
                        </div>
                        <span class="kt-pricing-1__price">{{ $curentSubs[1]->label }}</span>
                        <h2 class="kt-pricing-1__subtitle">{{ rupiah($curentSubs[1]->price) }}</h2>
                        <span class="kt-pricing-1__description">
                            <span style="padding: 0 5px">
                                {{ strip_tags($curentSubs[1]->desciptions) }}
                            </span>
                        </span>
                        <div class="kt-pricing-1__btn">
                            @if($curentSubs[1]->size == 1)
                            <span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill kt-badge--rounded">Enabled</span>
                            @else
                            <span class="kt-badge kt-badge--gray kt-badge--inline kt-badge--pill kt-badge--rounded">Disabled</span>
                            @endif
                        </div>
                    </div>
                    <hr>

                    <div class="kt-pricing-1__item col-lg-6">
                        <div class="kt-pricing-1__visual">
                            <div class="kt-pricing-1__hexagon1"></div>
                            <div class="kt-pricing-1__hexagon2"></div>
                            <span class="kt-pricing-1__icon kt-font-success"><i class="fa flaticon-dashboard"></i></span>
                        </div>
                        <span class="kt-pricing-1__price">Resources Usage</span>

                        <div class="col-xl-12 kt-pricing-1__description">
                            <!--begin:: Widgets/User Progress -->
                            <div class="kt-widget31">
                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">

                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Users Capacity
                                            </a>

                                        </div>
                                    </div>
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <a href="#" class="kt-widget31__stats">
                                                <span>{{ $currentUsers }} users</span>
                                                <span>{{ $curentSubs[2]->size }} max</span>
                                            </a>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ ($currentUsers / $curentSubs[2]->size) * 100 }}%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">

                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Storage Capacity
                                            </a>

                                        </div>
                                    </div>
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <a href="#" class="kt-widget31__stats">
                                                <span id="storage_usage"></span>
                                                <span>{{ $curentSubs[3]->size }} GB</span>
                                            </a>
                                            <div class="progress progress-sm">
                                                <div class="progress-bar bg-success" id="storage_progress" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="kt-widget31__item">
                                    <div class="kt-widget31__content">

                                        <div class="kt-widget31__info">
                                            <a href="#" class="kt-widget31__username">
                                                Subscibtions
                                            </a>

                                        </div>
                                    </div>
                                    <div class="kt-widget31__content">
                                        <div class="kt-widget31__progress">
                                            <strong>{{ $until }}</strong>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <!--end:: Widgets/User Progress -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--end::Portlet-->
</div>

<!-- end:: Content -->
@endsection


@section('script-bottom')
<script type="text/javascript" src="{{ URL::asset('admin_res/js/pages/crud/forms/widgets/bootstrap-touchspin.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("input[name='attr-3']").TouchSpin({
            min: 50,
            max: 100000000,
            step: 50,
            boostat: 5,
            maxboostedstep: 10,

            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });
        $("input[name='attr-4']").TouchSpin({
            min: 1,
            max: 100000000,
            step: 1,
            buttondown_class: 'btn btn-primary',
            buttonup_class: 'btn btn-primary'
        });
    });
</script>
<!-- Sweet-Alert  -->
<script src="{{ URL::asset('admin_resources/libs/sweetalert2/sweetalert2.all.min.js') }}" charset="UTF-8"></script>
<script>
    $("#btn-change").click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: "@lang('subscribtions.swa2-title')",
            text: "@lang('subscribtions.swa2-text')",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "@lang('subscribtions.swa2-btn-confirm')",
            cancelButtonText: "@lang('subscribtions.swa2-btn-cancel')",
        }).then((result) => {
            if (result.value) {
                $("#form-change").submit();
            }
        })
    })
</script>
@if(session('status') == 1)
<script>
    Swal.fire({
        title: 'Info',
        text: 'Berhasil',
        icon: 'success'
    });
</script>
@endif
<script>
    // $.ajax({
    //     url: '{{ route("srv_admin.subscribtions.storage.usage") }}',
    //     type: 'GET',
    //     dataType: 'json',
    //     cache: false,
    //     beforeSend: function() {
    //         // alert("before");
    //         $('#storage_usage').empty();
    //         $('#storage_usage').addClass("kt-spinner kt-spinner--sm kt-spinner--brand");
    //     },
    //     complete: function() {
    //         // alert("before");
    //     },
    //     success: function(data) {
    //         $('#storage_usage').text(data["size"]);
    //         // alert(data['size']);
    //     }
    // });
    $('#storage_usage').addClass("kt-spinner kt-spinner--sm kt-spinner--brand");
    $('#storage_progress').width(0);
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
                    $('#storage_usage').removeClass("kt-spinner kt-spinner--sm kt-spinner--brand");
                    $('#storage_usage').text(data["human_size"]);
                    $('#storage_progress').width(data["usage_percentage"]);

                }
            });
        };
        setTimeout(getUsage, 1000);
        // setTimeout(alert("test"),2000);
    })
</script>
@endsection
