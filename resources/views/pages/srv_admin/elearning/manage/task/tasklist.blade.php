@extends('pages.srv_admin.elearning.manage-single')

@section('other-css')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/plugins/custom/jquery-ui/jquery-ui.bundle.css" rel="stylesheet" type="text/css" />
@endsection
@section('manage')
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet" id="form-wrapper">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 id="header" class="kt-portlet__head-title">Tugas <small>daftar tugas pada kurus/elearning ini</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-actions">
                            <a href="{{ route('srv_admin.courses.task.create',[$courses->uuid]) }}" class="btn btn-outline-brand btn-bold btn-sm">
                                Tambah tugas
                            </a>
                            {{-- <a href="#" class="btn btn-danger btn-sm btn-bold">
                                Export
                            </a> --}}
                        </div>
                    </div>
                </div>
                <form class="kt-form " id="kt_form">
                    <div class="kt-portlet__body kt-wizard-v4__content">
                        <div class="kt-section kt-section--first">
                            <div class="kt-section__body">
                                <div class="row">

                                    <div class="col-lg-9 col-xl-6">
                                        <h3 style="visibility:hidden" class="kt-section__title kt-section__title-sm">@lang('courses.tab-3-title')</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--begin::Portlet-->
                                    <div class="col-md-12">
                                        @foreach($task as $item)
                                        <div id="con_{{ $item->id_task }}" class="kt-portlet kt-portlet--collapsed" data-ktportlet="true" >
                                            <div class="kt-portlet__head">
                                                <div class="kt-portlet__head-label">
                                                    <h3 class="kt-portlet__head-title">
                                                        {{ $item->title }}
                                                    </h3>
                                                </div>
                                                <div class="kt-portlet__head-toolbar">
                                                    <div class="kt-portlet__head-group">
                                                        <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-clean btn-icon-md"><i class="la la-angle-down"></i></a>

                                                        <a href="{{ route('srv_admin.courses.task.edit',[$courses->uuid,$item->id_task]) }}" class="btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="kt-tooltip" data-placement="top" title="Edit" data-original-title="Edit" data-offset="0px 5px"><i class="la la-edit"></i></a>

                                                        <a href="#" onclick="deleteTask('{{ $item->id_task }}')" class="btn btn-sm btn-icon btn-clean btn-icon-md"><i class="la la-close"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body">
                                                <div class="form-group">
                                                    <label><strong>Deskripsi tugas</strong></label>
                                                    <div>
                                                        {!! $item->content !!}
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <?php
                                                        setlocale(LC_TIME, 'Indonesia');
                                                        \Carbon\Carbon::setLocale('id');

                                                        $start_date = \Carbon\Carbon::parse($item->start_at)->formatLocalized('%d %h, %y');

                                                        $end_date = 'Tidak ditentukan';
                                                        if($item->end_at != ''){
                                                            $end_date = \Carbon\Carbon::parse($item->end_at)->formatLocalized('%d %h, %y');
                                                        }

                                                    ?>
                                                    <label><strong>Waktu Pengerjaan</strong></label>
                                                    <div>
                                                        Waktu Mulai : {{ $start_date }} <br>
                                                        waktu Selesai : {{ $end_date }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @endforeach

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<!--End:: App Content-->


@endsection
@section('other-script')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function deleteTask(id){
        swal.fire({
            "title": "Hapus tugas ?",
            "html": "Apakah anda yakin untuk menghapus tugas ini ?",
            "type": "warning",
            "confirmButtonClass": "btn btn-primary",
            "cancelButtonClass": "btn btn-secondary",
            confirmButtonText: "Ya, hapus tugas",
            cancelButtonText: "Tidak, batalkan",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                var taskdelete_url = '{{ route("srv_admin.courses.task.delete",":uuid") }}';
                taskdelete_url = taskdelete_url.replace(":uuid", "{{ $courses->uuid }}");
                $.ajax({
                    url: taskdelete_url,
                    method: 'post',
                    data: {
                        "id_task": id,
                    },
                    success: function(response) {
                        // location.reload(true);
                        // table.ajax.reload();
                        swal.fire({
                            "title": "Berhasil Dihapus",
                            "html": "Tugas berhasil dihapus dari kursus",
                            "type": "success",
                            "confirmButtonClass": "btn btn-primary",
                            cancelButtonClass: "btn btn-secondary",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonText: "OK",
                            cancelButtonText: "@lang('general.msg-success-ok-btn')",
                        });
                        $('#con_'+id).remove();
                    },
                    error: function(xhr, status, error) {
                        // var err = eval("(" + xhr.responseText + ")");
                        console.log(xhr.responseText);
                        console.log(status);
                        console.log(error);
                    }
                })

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {

            }
        });
    }

</script>

<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('/') }}admin_res/plugins/custom/jquery-ui/jquery-ui.bundle.js" type="text/javascript"></script>




@endsection
