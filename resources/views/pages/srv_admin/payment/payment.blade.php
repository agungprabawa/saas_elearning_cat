@extends('layouts.srv_admin.master')

@section('css')
    <!--begin::Page Custom Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/css/pages/invoices/invoice-2.css" rel="stylesheet" type="text/css" />

    <!--end::Page Custom Styles -->
@endsection

@section('content')
<!-- begin:: Subheader -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Pembayaran </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            {{-- <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Pages </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Invoices </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Invoice 2 </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div> --}}
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <a href="{{ route('srv_admin.payment.history') }}" class="btn kt-subheader__btn-primary">
                    Payment History
                </a>

            </div>
        </div>
    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="kt-portlet">
        <div class="kt-portlet__body kt-portlet__body--fit">
            @if($shouldPay == 'yes')
            <div class="kt-invoice-2">
                <div class="kt-invoice__head">
                    <div class="kt-invoice__container">
                        <div class="kt-invoice__brand">
                            <h1 class="kt-invoice__title" style="text-transform: uppercase">@lang('payment.invoice')</h1>
                            <div href="#" class="kt-invoice__logo kt-hidden">
                                <a href="#"><img src="{{ asset('/') }}admin_res/media/company-logos/logo_client_color.png">
                                </a>
                                <span class="kt-invoice__desc">
                                    <span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
                                    <span>Mississippi 96522</span>
                                </span>
                            </div>
                        </div>
                        <div class="kt-invoice__items">
                            <div class="kt-invoice__item">
                                <span class="kt-invoice__subtitle" style="text-transform: uppercase">@lang('payment.type')</span>

                                @if(!isset($lastTransaction))
                                <span class="kt-invoice__text">@lang('payment.type-first')</span>
                                @elseif($lastTransaction->type == 1)
                                <span class="kt-invoice__text">@lang('payment.type-normal')</span>
                                @else
                                <span class="kt-invoice__text">@lang('payment.type-upgrade')</span>
                                @endif
                            </div>

                            <div class="kt-invoice__item">
                                <span class="kt-invoice__subtitle" style="text-transform: uppercase">@lang('payment.your-company')</span>
                                <span class="kt-invoice__text">{{ $company->company_name }}</span>
                            </div>

                            <div class="kt-invoice__item">
                                <span class="kt-invoice__subtitle" style="text-transform: uppercase">@lang('payment.address')</span>
                                <span class="kt-invoice__text">{{ $company->address }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-invoice__body">
                    <div class="kt-invoice__container">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-transform: uppercase">@lang('payment.tb-description')</th>
                                        <th style="text-transform: uppercase">@lang('payment.tb-uses')</th>
                                        <th style="text-transform: uppercase">@lang('payment.tb-rate')</th>
                                        <th style="text-transform: uppercase">@lang('payment.tb-amount')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $amount = 0;
                                        $totalAmount = 0;
                                    ?>
                                    @foreach($curentSubs as $item)
                                    <?php
                                        $amount = ($item->size * $item->price);
                                        $totalAmount += $amount;
                                    ?>
                                        <tr>
                                            <td>{{ $item->label }}</td>
                                            <td>{{ $item->size }}</td>
                                            <td>{{ rupiah($item->price) }}</td>
                                            <td class="kt-font-danger kt-font-lg">{{ rupiah($amount) }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="kt-invoice__footer">
                    <div class="kt-invoice__container">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-transform: uppercase">PAYMENT GATEWAY</th>
                                        <th style="text-transform: uppercase; visibility: hidden">@lang('payment.tb-due-date')</th>
                                        <th></th>
                                        <th style="text-transform: uppercase">@lang('payment.tb-total-amount')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>XENDIT</td>
                                        <td>



                                        </td>
                                        <td></td>
                                        <td class="kt-font-danger kt-font-xl kt-font-boldest">{{ rupiah($totalAmount) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="kt-invoice__actions">
                    <div class="kt-invoice__container">
                        <button type="button" class="btn btn-label-brand btn-bold" style="visibility: hidden" onclick="window.print();">Download Invoice</button>
                        <a href="{{ route('srv_admin.payment.create') }}" style="text-align: right" class="btn btn-brand btn-bold" >@lang('payment.btn-pay')</a>
                    </div>
                </div>
            </div>
            @elseif ($shouldPay == 'upgrade')
            <div class="kt-invoice-2">
                <div class="kt-invoice__head">
                    <div class="kt-invoice__container">
                        <div class="kt-invoice__brand">
                            <h1 class="kt-invoice__title" style="text-transform: uppercase">@lang('payment.invoice')</h1>
                            <div href="#" class="kt-invoice__logo kt-hidden">
                            <a href="#"><img src="{{ asset('/') }}admin_res/media/company-logos/logo_client_color.png"></a>
                                <span class="kt-invoice__desc">
                                    <span>Cecilia Chapman, 711-2880 Nulla St, Mankato</span>
                                    <span>Mississippi 96522</span>
                                </span>
                            </div>
                        </div>
                        <div class="kt-invoice__items">
                            <div class="kt-invoice__item">
                                <span class="kt-invoice__subtitle" style="text-transform: uppercase">@lang('payment.type')</span>
                                @if($lastTransaction->type == 1)
                                <span class="kt-invoice__text">@lang('payment.type-normal')</span>
                                @else
                                <span class="kt-invoice__text">@lang('payment.type-upgrade')</span>
                                @endif
                            </div>

                            <div class="kt-invoice__item">
                                <span class="kt-invoice__subtitle" style="text-transform: uppercase">@lang('payment.your-company')</span>
                                <span class="kt-invoice__text">{{ $company->company_name }}</span>
                            </div>

                            <div class="kt-invoice__item">
                                <span class="kt-invoice__subtitle" style="text-transform: uppercase">@lang('payment.address')</span>
                                <span class="kt-invoice__text">{{ $company->address }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-invoice__body">
                    <div class="kt-invoice__container">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-transform: uppercase">@lang('payment.tb-description')</th>
                                        <th style="text-transform: uppercase">@lang('payment.tb-upgrade')</th>
                                        <th style="text-transform: uppercase">@lang('payment.tb-rate')</th>
                                        <th style="text-transform: uppercase">@lang('payment.tb-amount')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $amount = 0;
                                        $totalAmount = 0;
                                    ?>
                                    @foreach($yourUpgrades as $item)
                                    <?php
                                        $diff = $item->size - $curentSubs[$item->id_s_attribute - 1]->size;
                                        $totalAmount += $item->total_price;
                                    ?>
                                        <tr>
                                            <td>{{ $item->label }}</td>
                                            <td>{{ $diff }}</td>
                                            <td>{{ rupiah($item->price) }}</td>
                                            <td class="kt-font-danger kt-font-lg">{{ rupiah($item->total_price) }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="kt-invoice__footer">
                    <div class="kt-invoice__container">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="text-transform: uppercase">PAYMENT GATEWAY</th>
                                        <th style="text-transform: uppercase; visibility: hidden">@lang('payment.tb-due-date')</th>
                                        <th></th>
                                        <th style="text-transform: uppercase">@lang('payment.tb-total-amount')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>XENDIT</td>
                                        <td>

                                        </td>
                                        <td></td>
                                        <td class="kt-font-danger kt-font-xl kt-font-boldest">{{ rupiah($totalAmount) }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="kt-invoice__actions">
                    <div class="kt-invoice__container">
                        <button type="button" class="btn btn-label-brand btn-bold" style="visibility: hidden" onclick="window.print();">Download Invoice</button>
                        <div style="">
                            <a href="{{ route('srv_admin.payment.upgrade.cancel',[$lastTransaction->transaction_token]) }}"  class="btn btn-secondary btn-bold" >Batalkan</a>
                            <a href="{{ route('srv_admin.payment.upgrade.pay') }}"  class="btn btn-brand btn-bold" >@lang('payment.btn-pay')</a>
                        </div>

                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @if($shouldPay == 'no')
        <div class="row">
            <div class="col">
                <div class="alert alert-light alert-outline-success alert-elevate fade show" role="alert">
                    <div class="alert-icon"><i style="color:#1dc9b7 !important" class="flaticon-information kt-font-brand"></i></div>
                    <div class="alert-text">
                        @lang('payment.has-pay-message')
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- end:: Content -->
@endsection

