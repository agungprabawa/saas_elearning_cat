@extends('pages.saas_admin.customers.monitor.elearning.details-master')

@section('other-css')
<style>
    .custom-file-label {
        background-color: transparent !important;
    }
    .table-overview tr td{
        padding: 5px 0;
    }
    table {
        width: 100% !important;
    }
</style>
@endsection

@section('manage')
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet" id="form-wrapper">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Informasi Kursus</h3>
                    </div>
                    <div class="kt-portlet__head-toolbar kt-hidden">
                        <div class="kt-portlet__head-wrapper">
                            <div class="dropdown dropdown-inline">
                                <button type="button" class="btn btn-label-brand btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="flaticon2-gear"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__section kt-nav__section--first">
                                            <span class="kt-nav__section-text">Export Tools</span>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-print"></i>
                                                <span class="kt-nav__link-text">Print</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-copy"></i>
                                                <span class="kt-nav__link-text">Copy</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-excel-o"></i>
                                                <span class="kt-nav__link-text">Excel</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-text-o"></i>
                                                <span class="kt-nav__link-text">CSV</span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link">
                                                <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                                                <span class="kt-nav__link-text">PDF</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <div class="kt-portlet__body">
                    <div class="kt-section kt-section--first">
                        <div class="kt-section__body">
                            <div class="kt-heading kt-heading--md" style="margin-top: 0px">Informasi Umum</div>
                            <table>
                                <tbody class="table-overview" style="vertical-align: baseline">
                                    
                                    <tr>
                                        <td  style="width: 18%">
                                            Judul Kursus
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <strong>
                                                {{ $courses->title }}
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Kategori Kursus
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <strong>
                                                {{ $courses->category->category ?? 'Tanpa Kategori' }}
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Deskripsi Kursus
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <strong>
                                                {!! $courses->descriptions !!}
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                                
                            </table>
                            <div class="kt-heading kt-heading--md" >Konfigurasi</div>
                            <table>
                                <tbody class="table-overview" style="vertical-align: baseline">
                                    
                                    <tr>
                                        <td  style="width: 18%">
                                            Link Udangan
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <strong>
                                                @if($courses->is_share_link == 1)
                                                    {{ route('student.learning.join',$courses->uuid) }}
                                                @else
                                                    Tidak tersedia
                                                @endif
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Jumlah User
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <strong>
                                                {{ $courses->category->category ?? 'Tanpa Kategori' }}
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Waktu Mulai
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <strong>
                                                <vdatenow date="{{ $courses->start_date }}" type="datetime"></vdatenow>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Waktu Selesai
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <strong>
                                                @if($courses->end_date)
                                                    <vdatenow date="{{ $courses->end_date }}" type="datetime"></vdatenow>
                                                @else
                                                    Tidak tersedia
                                                @endif
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>
                                
                            </table>
                            <div class="kt-heading kt-heading--md" >Jenis</div>
                            <table>
                                <tbody class="table-overview" style="vertical-align: baseline">
                                    <tr>
                                        <td  style="width: 18%">
                                            Biaya
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <strong>
                                                @if($courses->courses_price > 0)
                                                    <helper-currency money="{{ $courses->courses_price }}" type="id-ID" currency="IDR" ></helper-currency>
                                                @else
                                                    Gratis
                                                @endif
                                            </strong>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__foot kt-hidden">
                    <div class="kt-form__actions">
                        <div class="row justify-content-end">

                            <button id="btn_submit" class="btn btn-success float-left">@lang('general.btn-save')</button>&nbsp;
                            <button id="btn_cancel" class="btn btn-secondary">@lang('general.btn-cancel')</button>

                        </div>
                    </div>
                </div>
                <form class="kt-form " id="kt_form">
                </form>
            </div>
        </div>
    </div>
</div>

<!--End:: App Content-->


@endsection
@section('other-script')

@endsection