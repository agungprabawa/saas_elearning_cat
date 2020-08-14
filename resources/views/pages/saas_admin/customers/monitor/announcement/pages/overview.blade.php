@extends('pages.saas_admin.customers.monitor.announcement.details-master')

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
                            <h3 class="kt-portlet__head-title">Pengumuman</h3>
                        </div>

                    </div>

                    <div class="kt-portlet__body">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="kt-heading kt-heading--md" style="margin-top: 0px">Isi Pengumuman</div>
                                <table>
                                    <tbody class="table-overview" style="vertical-align: baseline">

                                    <tr>
                                        <td  style="width: 18%">
                                            Judul Pengumuman
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <strong>
                                                {{ $announcement->title }}
                                            </strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            Konten
                                        </td>
                                        <td>:</td>
                                        <td>
                                            <strong>
                                                {!! $announcement->content !!}
                                            </strong>
                                        </td>
                                    </tr>
                                    </tbody>

                                </table>

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
