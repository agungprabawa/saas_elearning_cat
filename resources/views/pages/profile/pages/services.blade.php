@extends('pages.profile.profile')
@section('pages')
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet kt-portlet--height-fluid" data-ktportlet="true" >
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Lembaga yang Dikelola<small></small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-group">
                            <a href="{{ route('user.add.service') }}" class="btn btn-info btn-sm btn-bold">
                                <i class="fad fa-layer-plus"></i>
                                Tambah Layanan
                            </a>
                            <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-clean btn-icon-md"><i class="la la-angle-down"></i></a>
                            
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    @foreach ($ownerOf as $item)
                    <div id="con_{{ $item->id_company }}" class="kt-portlet kt-portlet--collapsed" data-ktportlet="true">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    {{ $item->company_name }}
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-group">
                                    <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-clean btn-icon-md"><i class="la la-angle-down"></i></a>

                                    <a href="{{ route('switch.manage',$item->uuid) }}" class="btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="kt-tooltip" data-placement="top" title="Kelola" data-original-title="Kelola" data-offset="0px 5px"><i class="fal fa-cogs"></i></a>

                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <label><strong>Deskripsi lembaga</strong></label>
                                <div>
                                    {!! $item->descriptions !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <?php 
                                    setlocale(LC_TIME, 'Indonesia');
                                    \Carbon\Carbon::setLocale('id');

                                    $start_date = \Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %h, %Y');    

                                    $end_date = 'Belum melakukan pembayaran';
                                    if($item->subscribe_until != ''){
                                        $end_date = \Carbon\Carbon::parse($item->subscribe_until)->formatLocalized('%d %h, %Y'); 
                                    }
                                    
                                    
                                     
                                ?>
                                <label><strong>Keterangan</strong></label>
                                <div>
                                    Dibuat pada : {{ $start_date }} <br>
                                    Masa pakai hingga : {{ $end_date }}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    @if($otherCompany->isNotEmpty())
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet kt-portlet--height-fluid" data-ktportlet="true" >
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Lembaga Lainnya<small>Daftar lembaga / layanan yang anda terdaftar di dalamnya</small></h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-portlet__head-group">
                            <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-clean btn-icon-md"><i class="la la-angle-down"></i></a>

                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    @foreach ($otherCompany as $item)
                    <div id="con_{{ $item->id_company }}" class="kt-portlet kt-portlet--collapsed" data-ktportlet="true">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    {{ $item->company_name }}
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="kt-portlet__head-group">
                                    <a href="#" data-ktportlet-tool="toggle" class="btn btn-sm btn-icon btn-clean btn-icon-md"><i class="la la-angle-down"></i></a>

                                    <a href="" class="btn btn-sm btn-icon btn-clean btn-icon-md" data-toggle="kt-tooltip" data-placement="top" title="Edit" data-original-title="Edit" data-offset="0px 5px"><i class="la la-edit"></i></a>

                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                <label><strong>Deskripsi lembaga</strong></label>
                                <div>
                                    {!! $item->descriptions !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <?php 
                                    setlocale(LC_TIME, 'Indonesia');
                                    \Carbon\Carbon::setLocale('id');

                                    $start_date = \Carbon\Carbon::parse($item->created_at)->formatLocalized('%d %h, %Y');    

                                    $end_date = 'Tidak ditentukan';
                                    
                                    $end_date = \Carbon\Carbon::parse($item->subscribe_until)->formatLocalized('%d %h, %Y'); 
                                    
                                     
                                ?>
                                <label><strong>Keterangan</strong></label>
                                <div>
                                    Dibuat pada : {{ $start_date }} <br>
                                    Masa pakai hingga : {{ $end_date }}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<!--End:: App Content-->
@endsection
@section('page-script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var btn_submit = $('#btn_submit');
    $('#kt_form').on('submit', function(e) {
        e.preventDefault();
        // alert($('input[name="profile_avatar"]').val());
        var dataForm = new FormData(this);
        $.ajax({
            url: '{{ route("user.change.password.do") }}',
            method: 'post',
            data: dataForm,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                KTApp.progress(btn_submit);
                KTApp.progress($(this));
                $('.invalid-feedback').text('');
            },
            success: function(response) {
                console.log(response);
                if ($.isEmptyObject(response.error)) {

                    swal.fire({
                        "title": "Profil Update",
                        "html": "Informasi profil berhasil diperbaharui",
                        "type": "success",
                        "confirmButtonClass": "btn btn-primary",
                        cancelButtonClass: "btn btn-secondary",
                        showCancelButton: false,
                        allowOutsideClick: true,
                        confirmButtonText: "Oke",
                        cancelButtonText: "@lang('courses.teach-create-btn-2')",
                    }).then((result) => {
                        if (result.value) {
                            
                        } 
                    });
                } else {
                    if($.isPlainObject(response.error)){
                        for (let [key, value] of Object.entries(response.error)) {
                            var errors = $('#err_'+key);
                            $(errors).text(value.toString());
                            // alert(field+'   '+key+'   '+value);
                        }
                        swal.fire({
                            "title": "@lang('courses.msg-error-title')",
                            "html": "@lang('courses.msg-error-content')",
                            "type": "warning",
                            "confirmButtonClass": "btn btn-secondary"
                        });
                    }else{
                        swal.fire({
                            "title": "Password",
                            "html": "Password anda tidak sesuai",
                            "type": "warning",
                            "confirmButtonClass": "btn btn-secondary"
                        });
                    }
                    console.log(response);
                }
            },
            complete: function() {
                KTApp.unprogress(btn_submit);
                KTApp.unprogress($(this));

                $('input[name="password"]').val("");
                $('input[name="new_password"]').val("");
                $('input[name="re_password"]').val("");
            },
            error: function(xhr, status, error) {
                // var err = eval("(" + xhr.responseText + ")");
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        });
    });


    "use strict";

    // Class definition
    var KTUserProfile = function() {
        // Base elements
        var avatar;
        var offcanvas;

        // Private functions
        var initAside = function() {
            // Mobile offcanvas for mobile mode
            offcanvas = new KTOffcanvas('kt_user_profile_aside', {
                overlay: true,
                baseClass: 'kt-app__aside',
                closeBy: 'kt_user_profile_aside_close',
                toggleBy: 'kt_subheader_mobile_toggle'
            });
        }

        var initUserForm = function() {
            avatar = new KTAvatar('kt_user_avatar');
        }

        return {
            // public functions
            init: function() {
                initAside();
                initUserForm();
            }
        };
    }();

    KTUtil.ready(function() {
        KTUserProfile.init();
    });
</script>
@endsection