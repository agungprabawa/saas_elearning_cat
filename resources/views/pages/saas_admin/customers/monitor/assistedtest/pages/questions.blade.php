@extends('pages.saas_admin.customers.monitor.assistedtest.details-master')

@section('other-css')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

<!--end::Page Vendors Styles -->
@endsection

@section('manage')
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet" id="form-wrapper">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Daftar Soal</h3>
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
                    <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                        <thead>
                            <tr>
                                <th>Soal</th>
                                <th>Jenis</th>
                                <th>Dibuat Oleh</th>
                                <th>Dibuat Pada</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
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
<!--begin::Modal-->
<div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $exam->title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <span style="display: block; margin-top: 10px"><strong>Soal / Pertanyaan</strong></span>
                <span id="str_questions"></span>
                <span style="display: block; margin-top: 10px"><strong>Tipe Soal / Pertanyaan</strong></span>
                <span style="display: block;" id="str_type"></span>

                <span style="display: block; margin-top: 10px"><strong>Jawaban Soal / Pertanyaan</strong></span>
                <ul id="str_objectif" style="padding-left: 15px"></ul>
                <div id="str_esai"></div>
            </div>

        </div>
    </div>
</div>

<!--end::Modal-->

@endsection
@section('other-script')
<!--begin::Page Vendors(used by this page) -->
<script src="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.js" type="text/javascript"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/moment-with-locales.js"></script>
<script src="{{ asset('/') }}admin_res/plugins/datatables/datetime.js"></script>
<!--end::Page Vendors -->
<?php
    $id_company = $managed['company']->id_company ?>

<script>

    let btn_del_2 = $('#btn_del');
    let kt_table = $('#kt_table_1');

    let run_kt_table = $(kt_table).DataTable({
        responsive: true,
        searchDelay: 500,
        processing: true,
        serverSide: true,
        ajax: '{{ route("sudo.customers.monitor.data.questions.list",["$id_company","$exam->id_exam"]) }}',
        columns: [
            {
                data: 'question', name: 'question'
            },
            {
                data: 'label', name: 'label'
            },
            {
                data: 'name', name: 'name'
            },
            {
                data: 'created_at', name: 'created_at'
            },
            {
                data: 'id_question', name: 'id_question',
            }

        ],
        columnDefs: [
            {
                targets: [3],
                render: $.fn.dataTable.render.moment('YYYY-MM-DD H:m:s', 'dddd D MMMM YYYY', 'id'),
            },

            {
                targets: 4,
                render: (data, type, row)=>{

                    var rows = JSON.stringify(row);
                    var btn = `
                    <a href="#" data-id="${data}" data-row='${rows}' data-toggle="modal" data-target="#kt_modal_4" class="btn_click btn btn-brand">Lihat Detail</a>

                    <a href="#" class="btn_del btn btn-warning" data-id="${data}" data-id-company="${row['id_company']}" data-id-exam="${row['id_exam']}" >Hapus</a>`;
                    // btn = btn.replace(':row',)
                    return btn;
                }
            }
        ]

    });

    $(kt_table).on('click','.btn_del', function (e) {
        e.preventDefault();
        let data_id = $(this).attr('data-id');
        let id_company = $(this).attr('data-id-company');
        let id_exam = $(this).attr('data-id-exam');
        let remove_link = "{{ route('sudo.customers.monitor.exam.questions.delete',[':id_company',':id_courses']) }}";

        remove_link = remove_link.replace(':id_company',id_company)
            .replace(':id_exam',id_exam);

        swal.fire({
            "title": "Hapus soal ?",
            "html": "Apakah anda yakin untuk menghapus soal ini ?",
            "type": "warning",
            "confirmButtonClass": "btn btn-primary",
            "cancelButtonClass": "btn btn-secondary",
            confirmButtonText: "Ya, hapus pertanyaan",
            cancelButtonText: "Tidak, batalkan",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {

                let ajax_req = $.ajax({
                    url: remove_link,
                    method: 'post',
                    data: {
                        "id_question": data_id,
                    },
                    success: function(response) {

                    },
                    error: function(xhr, status, error) {
                        // var err = eval("(" + xhr.responseText + ")");
                        console.log(xhr.responseText);
                        console.log(status);
                        console.log(error);
                    }
                });

                ajax_req.done(function (response) {
                    run_kt_table.ajax.reload();

                    swal.fire({
                        title: 'Berhasil dihapus',
                        type: 'success',
                        html: 'Soal pada ujian ini berhasil dihapus',
                        confirmButtonClass: 'btn btn-primary',
                        confirmButtonText: 'Oke',
                    });
                });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {

            }
        });
    })


    var id_quest = '';
    var row_data = [];
    $(document).ready(function(){
        $('#kt_table_1').on('click','.btn_click',function(e){
            e.preventDefault();
            // alert($(this).attr('data-id'));
            id_quest = $(this).attr('data-id');
            row_data = jQuery.parseJSON($(this).attr('data-row'));
        });
    });

    $('#kt_modal_4').on('show.bs.modal', function(){
        var url_single_quest = "{{ route('sudo.customers.monitor.data.questions.single',[':id_company',':id_exam',':id_quest']) }}";
        url_single_quest = url_single_quest.replace(':id_company',row_data.id_company)
            .replace(':id_exam',row_data.id_exam)
            .replace(':id_quest',row_data.id_question);

        $.ajax({
            url: url_single_quest,
            type: 'get',
            beforeSend: function () {
                $('#str_questions').html('');
                $('#str_type').text('');
                $('#str_objectif').html('').hide();
                $('#str_esai').html('');

            }
        })
        .done(function(responses){
            $('#str_questions').html(responses.data.question);
            $('#str_type').text(responses.data.type);

            if(responses.data.id_type === 1){

                $.each(responses.quest_option, function (key, value) {
                    // console.log(value.optiontext);
                    var li_item = '';
                    if(value.randkeys === responses.data.answer){
                        li_item = `<li><strong>${value.optiontext}</strong></li>`;
                    }else{
                        li_item = `<li>${value.optiontext}</li>`;
                    }

                    $('#str_objectif').show().append(li_item);

                })
            }else if(responses.data.id_type === 2){
                var li_item = '';
                if(responses.data.answer === "1"){
                    li_item += `<li><strong>Benar</strong></li>`;
                    li_item += `<li>Salah</li>`;
                }else{
                    li_item += `<li>Benar</li>`;
                    li_item += `<li><strong>Salah</strong></li>`;
                }
                $('#str_objectif').show().append(li_item);

            }else if(responses.data.id_type === 3){
                $('#str_esai').html(responses.data.answer);
            }
            console.log(responses);
        });
    });


</script>
@endsection
