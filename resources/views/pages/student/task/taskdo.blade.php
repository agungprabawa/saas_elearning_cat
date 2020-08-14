@extends('layouts.student.master')

@section('css')
<!--begin::Page Custom Styles(used by this page) -->


<!--end::Page Custom Styles -->
<!--begin::Page Custom Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/css/pages/support-center/faq-2.css" rel="stylesheet" type="text/css" />
<style>
    .kt-sc-faq-2 {
        margin-top: 30px !important;
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-attachment: fixed !important;

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
                @csrf
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            {{ $task->title }}
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-actions">

                            <button data-toggle="modal" data-target="#kt_modal_1" class="btn btn-clean" data-toggle="modal" data-target="#kt_modal_1">
                                Tugas yang terkirim
                            </button>

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div>
                        {!! $task->content !!}
                    </div>

                </div>

            </div>
        </div>

    </div>

    <!-- begin:: accordions -->
    @if ($task->max_submit != 0 && $task->submitStatus() >= $task->max_submit || $isFinished)
    <div class="alert alert-success" style="width:50%; margin:0 auto" role="alert">
        <div class="alert-icon"><i class="flaticon-warning"></i></div>
        <div class="alert-text">Form pengumpulan jawaban telah ditutup</div>
    </div>
    @else
    <div class="row">
        <div class="col-lg-12">
            {{-- <div class="kt-portlet kt-portlet--height-fluid"> --}}
            <form class="kt-portlet" enctype="multipart/form-data" method="POST" id="kt_form">
                @csrf
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Jawaban Tugas
                        </h3>
                    </div>

                </div>
                <div class="kt-portlet__body">

                    <strong>Jawaban Anda</strong>
                    <div class="form-group">
                        <textarea type="text" name="task_answer" id="editor2"></textarea>
                        <div id="err_task_answer" class="invalid-feedback" style="display:block; font-size:14px"></div>
                        {{-- <span class="form-text text-muted">@lang('courses.teach-create-f-2-sub')</span> --}}
                    </div>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label>File Browser</label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="task_file" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div id="err_task_file" class="invalid-feedback" style="display:block; font-size:14px"></div>
                        </div>

                    </div>

                </div>

                <div class="kt-portlet__foot">
                    <div class="row align-items-center">
                        <div class="col-lg-12 kt-align-right">
                            <button id="btn_send" type="submit" class="btn btn-success">Kirim Jawaban</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>

    </div>
    @endif

</div>
<!--begin::Modal-->
<div class="modal fade" id="kt_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Jawaban yang Terkirim</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <?php $num = 1; ?>
                @foreach ($task->submited->where('created_by','=',auth()->id()) as $item)
                <div class="kt-portlet kt-portlet--collapsed" data-ktportlet="true" id="">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Jawaban {{ $num }}
                                <?php $num++; ?>
                            </h3>
                        </div>
                        <div class="kt-portlet__head-toolbar">
                            <div class="kt-portlet__head-group">
                                <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-clean btn-icon-md"><i class="la la-angle-down"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="form-group">
                            @if(!empty($item->content))
                                <label><strong>Jawaban teks</strong></label>
                                <div>
                                    {!! $item->content !!}
                                </div>
                            @endif
                            @if (!empty($item->file_url))
                                <label><strong>Jawaban File</strong></label>
                                <div>
                                    <a href="{{ $item->file_url }}">Download</a>
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <?php
                            setlocale(LC_TIME, 'Indonesia');
                            \Carbon\Carbon::setLocale('id');

                            $submit_at = \Carbon\Carbon::parse($item->created_at)->formatLocalized('%A, %d %h, %y %H:%M');

                            ?>
                            <label><strong>Waktu Pengumpulan</strong></label>
                            <div>
                                Disubmit pada : {{ $submit_at }} <br>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
                {{-- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti, excepturi? --}}
                <hr>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>

<!--end::Modal-->
<!-- end:: Content -->
@endsection

@section('script-bottom')

<script src="{{ asset('/') }}admin_res/plugins/ckeditor/ckeditor.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    CKEDITOR.replace('editor2', {
        customConfig: '{{ asset("/") }}admin_res/plugins/ckeditor/config_task.js'
    });

    $('#kt_form').on('submit', function(e) {
        e.preventDefault();

        KTApp.progress($('#btn_send'));

        var submitUrl = '{{ route("student.task.submit",[":idCourses",":idTask"]) }}';
        submitUrl = submitUrl.replace(':idCourses', '{{ $task->id_courses }}')
            .replace(':idTask', '{{ $task->id_task }}');

        CKEDITOR.instances.editor2.updateElement();

        var formData = new FormData(this);

        $.ajax({
            url: submitUrl,
            method: 'post',
            data: formData,
            processData: false,
            contentType: false,
            async: true,
            beforeSend: function() {

            },
            success: function(responses) {
                if ($.isEmptyObject(responses.error)) {
                    swal.fire({
                        "title": "Berhasil Terkirim",
                        "html": "Selamat, tugas anda telah berhasil terkirim",
                        "type": "success",
                        "confirmButtonClass": "btn btn-primary",
                        cancelButtonClass: "btn btn-secondary",
                        showCancelButton: false,
                        allowOutsideClick: false,
                        confirmButtonText: "Ok",
                        cancelButtonText: "",
                    }).then((result) => {
                        if (result.value) {
                            location.reload(true);
                        } else if (
                            /* Read more about handling dismissals below */
                            result.dismiss === Swal.DismissReason.cancel
                        ) {
                            window.location.replace("{{ route('srv_admin.users.index') }}");
                        }
                    });
                } else {
                    for (let [key, value] of Object.entries(responses.error)) {
                        var errors = $('#err_'+key);
                        // var field = key.toString().replace(/\s+/g, '_');
                        $(errors).text(value.toString());
                        // alert(field+'   '+key+'   '+value);
                    }
                    swal.fire({
                        "title": "Ooops, Periksa Kembali Jawaban",
                        "html": "Periksa kembali jawaban anda",
                        "type": "warning",
                        "confirmButtonClass": "btn btn-secondary"
                    });
                }
            },
            error: function(xhr, status, error) {
                // var err = eval("(" + xhr.responseText + ")");
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);

                swal.fire({
                    "title": "Gagal Terkirim",
                    "html": "Oops, tugas anda tidak dapat terkirim",
                    "type": "error",
                    "confirmButtonClass": "btn btn-primary",
                    cancelButtonClass: "btn btn-secondary",
                    showCancelButton: false,
                    allowOutsideClick: false,
                    confirmButtonText: "Lanjutkan",
                    cancelButtonText: "",
                }).then((result) => {
                    if (result.value) {
                        location.reload(true);
                    } else if (
                        /* Read more about handling dismissals below */
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        window.location.replace("{{ route('srv_admin.users.index') }}");
                    }
                });

            },
            complete: function() {
                KTApp.unprogress('#btn_send');
                $('#customFile').val(null).trigger('change');
                CKEDITOR.instances.editor2.setData('');
                CKEDITOR.instances.editor2.updateElement();
            }
        });
    })
</script>

@endsection
