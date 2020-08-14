@extends('layouts.saas_admin.master')

@section('css')

@endsection


@section('content')

<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <h3 class="kt-subheader__title">
                Kelola Layanan </h3>
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs kt-hidden">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Pages </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Wizard </a>
                <span class="kt-subheader__breadcrumbs-separator"></span>
                <a href="" class="kt-subheader__breadcrumbs-link">
                    Wizard 4 </a>

                <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
            </div>
        </div>
        <div class="kt-subheader__toolbar kt-hidden">
            <div class="kt-subheader__wrapper">
                <a href="#" class="btn kt-subheader__btn-primary">
                    Actions &nbsp;

                    <!--<i class="flaticon2-calendar-1"></i>-->
                </a>

            </div>
        </div>
    </div>
</div>

<!-- end:: Subheader -->

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <form id="kt_form" class="row">
        <div class="col-md-8">
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Kelola Layanan
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-form">
                        <div class="kt-form__section kt-form__section--first">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Nama Layanan</label>
                                        <input type="text" class="form-control" name="label" value="{{ $app->label }}">
                                        <div id="err_label" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                        {{-- <span class="form-text text-muted">@lang('courses.tab-1-f-1-sub')</span> --}}

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <label>@lang('announ.fm-2')</label>
                                    <textarea type="text" name="content" id="editor1">{{ $app->desciptions }}</textarea>
                                    <div id="err_content" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                    {{-- <span class="form-text text-muted">@lang('assisted_test.tab-1-f-3-sub')</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!--end::Portlet-->
        </div>
        <div class="col-md-4">
            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Harga
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Inline Checkboxes</label>
                                <input class="form-control" min="0" value="{{ $app->price }}" type="text" name="price" id="price">
                                <div id="err_price" class="invalid-feedback" style="display:block; font-size:14px"></div>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <div class="kt-portlet__foot" style="float:right">
                    <div class="kt-form__actions">
                        <div class="row justify-content-end">
                            <button id="btn_submit" class="btn btn-success float-left">Simpan</button>&nbsp;
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Portlet-->
        </div>

    </form>
</div>

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

    CKEDITOR.replace('editor1', {
        customConfig: '{{ asset("/") }}admin_res/plugins/ckeditor/config.js'
    });

    var btn_submit = $('#btn_submit');
    btn_submit.click(function(e){
        e.preventDefault();
        CKEDITOR.instances.editor1.updateElement();
        KTApp.progress(btn_submit);
        $.ajax({
            url: '{{ route("sudo.apps.manage.update",$app->id_s_attributes) }}',
            method: 'post',
            data: $('#kt_form').serialize(),
            success: function(response){
                $('.invalid-feedback').text('');
                if($.isEmptyObject(response.error)){
                    
                }else{
                    for (let [key, value] of Object.entries(response.error)) {
                        var errors = $('#err_'+key);
                        // var field = key.toString().replace(/\s+/g, '_');
                        $(errors).text(value.toString());
                        // alert(field+'   '+key+'   '+value);
                    }
                    swal.fire({
                        "title": "@lang('courses.msg-error-title')",
                        "html": "@lang('courses.msg-error-content')",
                        "type": "warning",
                        "confirmButtonClass": "btn btn-secondary"
                    });
                }
            },
            error: function(xhr, status, error){
                console.log(xhr);
                console.log(status);
                console.log(error);
            }
        }).done(function(){
            swal.fire({
                "title": "Tersimpan",
                "html": "Perubahan berhasil disimpan",
                "type": "success",
                "confirmButtonClass": "btn btn-secondary"
            }).then((result) => {
                var url = "{{ route('sudo.apps.manage.list') }}";
                window.location.replace(url);
            });
        });
    });
    


    // var format = new Intl.NumberFormat('id-ID', { 
    //     style: 'currency', 
    //     currency: 'IDR', 
    //     minimumFractionDigits: 2, 
    // }); 

    // var prices = $('#price').val();
    // $('#price').val(prices.formatCurrency());

</script>
@endsection