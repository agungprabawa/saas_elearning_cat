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
                        <h3 id="header" class="kt-portlet__head-title">@lang('courses.teach-index-form-title') <small>@lang('courses.teach-index-form-sub')</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-actions">
                            <a href="{{ route('srv_admin.courses.create.teach',[$courses->uuid]) }}" class="btn btn-outline-brand btn-bold btn-sm">
                                @lang('courses.teach-index-form-create')
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
                                <div class="row ui-sortable" id="kt_sortable_portlets">
                                    <!--begin::Portlet-->
                                    <div class="col-md-12">
                                        @foreach($teachMaterials as $item)
                                        <div class="kt-portlet kt-portlet--collapsed kt-portlet--sortable " data-ktportlet="true" id="con_{{ $item->id_tech_material }}" data-id="{{ $item->id_tech_material }}">
                                            <div class="kt-portlet__head">
                                                <div class="kt-portlet__head-label">
                                                    <h3 class="kt-portlet__head-title">
                                                        {{ $item->title }}
                                                    </h3>
                                                </div>
                                                <div class="kt-portlet__head-toolbar">
                                                    <div class="kt-portlet__head-group">
                                                        <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-clean btn-icon-md"><i class="la la-angle-down"></i></a>

                                                        <a href="{{ route('srv_admin.courses.teach.edit',[$courses->uuid,$item->id_tech_material]) }}" class="btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="kt-tooltip" data-placement="top" title="Edit" data-original-title="Edit" data-offset="0px 5px"><i class="la la-edit"></i></a>

                                                        <a href="#" onclick="deleteMatrial('{{ $item->id_tech_material }}')" class="btn btn-sm btn-icon btn-clean btn-icon-md rem_btn"><i class="la la-close"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="kt-portlet__body">
                                                <div class="form-group">
                                                    <label><strong>@lang('courses.teach-create-f-2')</strong></label>
                                                    <div>
                                                        {!! $item->description !!}
                                                    </div>
                                                </div>
                                                @if(!empty($item->main_file_path))
                                                    <div class="form-group">
                                                        <label><strong>@lang('courses.teach-create-f-3')</strong></label>
                                                        <div>
                                                            <?php
                                                                $path = $item->main_file_path;
                                                                $explodes = explode("/",$path);
                                                                $fileName = end($explodes);
                                                            ?>
                                                            <a href="{{ $item->main_file_path }}">{{ $fileName }}</a>
                                                        </div>
                                                    </div>
                                                @endif

                                            </div>
                                        </div>
                                        @endforeach

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="kt-portlet__foot" style="display:none">
                        <div class="kt-form__actions">
                            <div class="row justify-content-end">

                                <button id="btn_submit" class="btn btn-success float-left">Submit</button>&nbsp;
                                <button id="btn_cancel" class="btn btn-secondary">@lang('general.btn-cancel')</button>

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


    // let id_ = 24;
    // console.log($('#con_'+id_));
    // let rem_btn = $('#rem_btn');
    // rem_btn.on('click', function (e) {
    //     e.preventDefault();
    //     let data_id = $(this).attr('data-id');
    //     console.log($('#con_'+data_id));
    // })

    function deleteMatrial(id_s){
        swal.fire({
            "title": "Hapus materi ?",
            "html": "Apakah anda yakin untuk menghapus materi ini ?",
            "type": "warning",
            "confirmButtonClass": "btn btn-primary",
            "cancelButtonClass": "btn btn-secondary",
            confirmButtonText: "Ya, hapus materi",
            cancelButtonText: "Tidak, batalkan",
            showCancelButton: true,
        }).then((result) => {
            if (result.value) {
                var teachdelete_url = '{{ route("srv_admin.courses.teach.delete",":uuid") }}';
                teachdelete_url = teachdelete_url.replace(":uuid", "{{ $courses->uuid }}");
                let ajax_req = $.ajax({
                    url: teachdelete_url,
                    method: 'post',
                    data: {
                        "teach_material": id_s,
                    },
                    success: function(response) {
                        // location.reload(true);
                        // table.ajax.reload();
                        swal.fire({
                            "title": "Berhasil Dihapus",
                            "html": "Materi berhasil dihapus dari kursus",
                            "type": "success",
                            "confirmButtonClass": "btn btn-primary",
                            cancelButtonClass: "btn btn-secondary",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonText: "OK",
                            cancelButtonText: "@lang('general.msg-success-ok-btn')",
                        });
                        $('#con_'+id_s).remove();
                    },
                    error: function(xhr, status, error) {
                        // var err = eval("(" + xhr.responseText + ")");
                        console.log(xhr.responseText);
                        console.log(status);
                        console.log(error);
                    }
                });

                ajax_req.done(function (response) {
                    console.log($('#con_'+id_s));
                });

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

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
{{-- <script src="{{ asset('/') }}admin_res/js/pages/components/portlets/draggable.js" type="text/javascript"></script> --}}

<script>
    $("#kt_sortable_portlets").sortable({
        connectWith: ".kt-portlet__head",
        items: ".kt-portlet",
        opacity: 0.8,
        handle: '.kt-portlet__head',
        coneHelperSize: true,
        placeholder: 'kt-portlet--sortable-placeholder',
        forcePlaceholderSize: true,
        tolerance: "pointer",
        helper: "clone",
        tolerance: "pointer",
        forcePlaceholderSize: !0,
        helper: "clone",
        cancel: ".kt-portlet--sortable-empty", // cancel dragging if portlet is in fullscreen mode
        revert: 250, // animation in milliseconds
        update: function(b, c) {
            if (c.item.prev().hasClass("kt-portlet--sortable-empty")) {
                c.item.prev().before(c.item);
            };
            var order = $("#kt_sortable_portlets").sortable("toArray", {
                attribute: 'data-id'
            });
            console.log(order);
            updateLoc(order);
        }
    });

    function updateLoc(order){
        var sort_url = '{{ route("srv_admin.courses.teach.sort",":uuid") }}';
        sort_url = sort_url.replace(":uuid","{{ $courses->uuid }}");
        $.ajax({
            url: sort_url,
            method: 'POST',
            data: {
                'new_sort':order,
            },
            success: function(response) {
                console.log(response.success);
                showToasher();
            }
        })
    }

    function showToasher() {
        var content = {};

        content.title = 'Berhasil';
        content.message = 'Posisi berhasil diubah';
        content.icon = 'icon flaticon-exclamation-2';

        $.notify(content, {
            type: 'success',
            allow_dismiss: false,
            newest_on_top: true,
            mouse_over: false,
            showProgressbar: false,
            spacing: 10,
            timer: 2000,
            placement: {
                from: 'top',
                align: 'right'
            },
            offset: {
                x: 30,
                y: 30
            },
            delay: 1000,
            z_index: 10000,
            animate: {
                enter: 'animated slideInRight',
                exit: 'animated slideOutRight'
            }
        });
    }
</script>

<!--end::Page Scripts -->
@endsection
