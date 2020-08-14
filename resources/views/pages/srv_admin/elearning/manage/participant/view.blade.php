@extends('pages.srv_admin.elearning.manage-single')

@section('other-css')
<style>
    .custom-file-label {
        background-color: transparent !important;
    }
    .font-white {
        color: white;
    }
</style>
@endsection

@section('manage')
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet" id="form-wrapper">
                {{-- <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">{{ $user->name }}
                            <small>{{ $user->email }}</small></h3>
                    </div>
                </div> --}}
               
                <div class="kt-portlet__body kt-wizard-v4__content">
                    <div class="kt-section kt-section--first" style="margin-bottom: 0px">
                        <div class="kt-section__body">
                            <div class="kt-widget kt-widget--user-profile-3">
                                <div class="kt-widget__top">
                                    <div class="kt-widget__media kt-hidden-">
                                        <img src="{{ $user->cover_img }}" alt="image">
                                    </div>
                                    <div class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest kt-font-light kt-hidden">
                                        JM
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__head">
                                            <a href="#" class="kt-widget__username">
                                                {{ $user->name }}
                                                <i class="flaticon2-correct kt-font-success"></i>
                                            </a>
                                            <div class="kt-widget__action kt-hidden">
                                                <button type="button" class="btn btn-label-success btn-sm btn-upper">ask</button>&nbsp;
                                                <button type="button" class="btn btn-brand btn-sm btn-upper">hire</button>
                                            </div>
                                        </div>
                                        <div class="kt-widget__subhead">
                                            <a href="#"><i class="flaticon2-new-email"></i>{{ $user->email }}</a>
                                            
                                        </div>
                                        <div class="kt-widget__info">
                                            <div class="kt-widget__desc">
                                                {!! $user->bio !!}
                                            </div>
                                            <div class="kt-widget__progress">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget__bottom" style="margin-bottom:2rem">
                                    <div class="kt-widget__item">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon-clock-1"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">Total waktu pada kursus</span>
                                            <span class="kt-widget__value">{{ hoursandmins($user->total_time, '%02d Jam, %02d Menit') }}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__item">
                                        <div class="kt-widget__icon">
                                            <i class="flaticon-calendar-with-a-clock-time-tools"></i>
                                        </div>
                                        <div class="kt-widget__details">
                                            <span class="kt-widget__title">Terakhir diakses</span>
                                            <span class="kt-widget__value">{{ formatDateTime($user->last_access) }}</span>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <div class="row justify-content-end">
                                    <?php 
                                        $nextClass = 'btn-brand';
                                        $prevClass = 'btn-brand';
                                        if(empty($navigate['previous'])){
                                            $prevClass = 'btn-secondary';
                                        }

                                        if(empty($navigate['next'])){
                                            $nextClass = 'btn-secondary';
                                        }

                                    ?>

                                    <a href="{{ $navigate['previous'] }}" class="btn {{ $prevClass }}">
                                        <i class="fas fa-chevron-left"></i>
                                        Sebelumnya
                                    </a>
                                    &nbsp;
                                    <a href="{{ $navigate['next'] }}" class="btn {{ $nextClass }}">Selanjutnya
                                        <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </div>

    @foreach ($task as $item)
    <div class="row">
        <div class="col-xl-12">
            <div class="kt-portlet" id="form-wrapper">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Tugas: {{ $item->title }}
                        </h3>
                    </div>
                </div>
            
                <div class="kt-portlet__body">
                    <div class="kt-section">
                        <div class="kt-section__body">
                            <div>
                                {!! $item->content !!}
                            </div>
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
                            <div class="row">
                                <!--begin::Portlet-->
                                <div class="col-md-12">
                                    <br>
                                    <label><strong>Jawaban yang dikumpul</strong></label>
                                    <br>
                                    <?php $num = 1 ?>
                                    
                                    @empty($item->submited->where('created_by','',$user->id)->toArray())
                                        Belum mengumpulkan jawaban
                                    @endempty
                                    @foreach($item->submited->where('created_by','',$user->id) as $submited)
                                    <?php
                                        setlocale(LC_TIME, 'Indonesia');
                                        \Carbon\Carbon::setLocale('id');
            
                                        $submit_at = \Carbon\Carbon::parse($submited->created_at)->formatLocalized('%A, %d %h, %y %H:%M');
        
                                    ?>
                                    <div class="kt-portlet kt-portlet--collapsed" data-ktportlet="true" id="">
                                        <div class="kt-portlet__head">
                                            <div class="kt-portlet__head-label">
                                                <h3 class="kt-portlet__head-title">
                                                    Jawaban {{ $num }}
                                                    <?php $num++ ?>
                                                    <small>
                                                    {{ $submit_at }}
                                                    </small>
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
                                                @if(!empty($submited->content))
                                                    <label><strong>Jawaban teks</strong></label>
                                                    <div>
                                                        {!! $submited->content !!}
                                                    </div>
                                                @endif
                                                @if (!empty($submited->file_url))
                                                    <label><strong>Jawaban File</strong></label>
                                                    <div>
                                                        <a href="{{ $submited->file_url }}">Download</a>
                                                    </div>
                                                @endif
                                                
                                            </div>
                                            <div class="form-group">
                                                
                                                <label><strong>Waktu Pengumpulan</strong></label>
                                                <div>
                                                    Disubmit pada : {{ $submit_at }} <br> 
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

                
            </div>
        </div>
    </div>
    @endforeach
</div>

<!--End:: App Content-->


@endsection
@section('other-script')

@endsection