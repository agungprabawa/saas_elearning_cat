@extends('pages.saas_admin.customers.monitor.elearning.details-master')

@section('other-css')
<link href="{{ asset('/') }}plyr-master/dist/plyr.css" rel="stylesheet" type="text/css" />
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
                        <h3 class="kt-portlet__head-title">Informasi Materi</h3>
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
                            {{-- <div class="kt-heading kt-heading--md" style="margin-top: 0px">Informasi Umum</div> --}}
                            <table style="margin-bottom: 10px">
                                <tbody class="table-overview" style="vertical-align: baseline">

                                    <tr>
                                        <td  style="width: 18%">
                                            Judul Materi
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <strong>
                                                {{ $teach->title }}
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Deskripsi materi
                                        </td>
                                        <td>:</td>
                                        <td>

                                                {!! $teach->description !!}

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            File Materi
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <strong>
                                                <?php
                                                    if($teach->main_file_path != ""){
                                                        $exploded = explode("/",$teach->main_file_path);
                                                        $index = count($exploded) - 1;

                                                        $file_name = $exploded[$index];
                                                    }
                                                ?>
                                                {{ $file_name ?? 'Tidak tersedia' }}
                                            </strong>
                                        </td>
                                    </tr>
                                </tbody>


                            </table>
                            <?php
                                $extension = '';
                                $fileType = '';
                                $mimeType  = '';
                                if ($teach->main_file_path != null) {
                                    $cleanUrl = str_replace('http://elcat.localhost/', '', $teach->main_file_path);
                                    $localingPath = str_replace('/', DIRECTORY_SEPARATOR, $cleanUrl); // use \\ on windows
                                    $final = public_path($localingPath);
                                    $extension = pathinfo($final)['extension'];

                                    $mimeType = mime_content_type($final);
                                    $fileType = explode('/',$mimeType)[0];

                                }
                                $noDownStr = 'controlsList=nodownload';
                            ?>
                            @if($fileType == 'video')
                            <video style="width:100%; margin-bottom:20px; object-fit: cover;" controls crossorigin playsinline id="player">

                                <source src="{{ $teach->main_file_path }}" type="{{ $mimeType }}" size="1080" />

                                <!-- Caption files -->
                                {{-- <track kind="captions" label="English" srclang="en" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.en.vtt" default />
                                <track kind="captions" label="Français" srclang="fr" src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-HD.fr.vtt" /> --}}

                                <!-- Fallback for browsers that don't support the <video> element -->
                                <a href="{{ $teach->main_file_path }}" download>Download</a>
                            </video>
                            @elseif($fileType == 'audio')
                            <audio style="width:100%; margin-bottom:20px;" id="player" controls {{ ($teach->allow_download == 1) ? '':$noDownStr}}>
                                <source src="{{ $teach->main_file_path }}" type="{{ $mimeType }}" />
                                {{-- <source src="/path/to/audio.ogg" type="audio/ogg" /> --}}
                            </audio>
                            @elseif($mimeType == 'application/pdf')
                                <a href="{{ $teach->main_file_path }}">Download</a>
                            @else
                                <a href="{{ $teach->main_file_path }}">Download</a>
                            @endif

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

<script src="{{ asset('/') }}plyr-master/dist/plyr.js"></script>
@endsection
