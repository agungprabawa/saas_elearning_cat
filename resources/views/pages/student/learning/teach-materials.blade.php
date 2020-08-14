@extends('layouts.student.master')

@section('css')
<!--begin::Page Custom Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/css/pages/support-center/faq-2.css" rel="stylesheet" type="text/css" />
<link href="{{ asset('/') }}plyr-master/dist/plyr.css" rel="stylesheet" type="text/css" />
<style>
    .kt-sc-faq-2 {
        display: none !important;
        margin-top: 30px !important;
        background-size: cover !important;
        background-repeat: no-repeat !important;
        background-position: center !important;
        background-attachment: fixed !important;
        background: url('{{ $courses->cover_img_url }}');
    }
</style>
@endsection


@section('content')
<!-- begin:: Content -->
<div class="kt-container  kt-grid__item kt-grid__item--fluid" style="margin-top:30px">

    <!-- begin:: Hero -->
    <div  class="kt-portlet kt-sc-faq-2">
        <div class="kt-portlet__body">

            <div class="kt-sc__top">
                <div class="kt-sc__content">
                    <h2 class="kt-sc__title " style="background:white; padding:10px">
                        {{ $courses->title }}
                    </h2>

                </div>
            </div>
        </div>
    </div>

    <!-- end:: Hero -->

    <!-- begin:: accordions -->
    <div class="row">
        <div class="col-lg-12">
            {{-- <div class="kt-portlet kt-portlet--height-fluid"> --}}
            <div class="kt-portlet">
                <div class="kt-portlet__body">
                    <div class="kt-infobox">
                        <div class="kt-infobox__header">
                            <h2 class="kt-infobox__title">{{ $courses_teach->title }}</h2>
                        </div>
                        <div class="kt-infobox__body">
                            <?php
                            $extension = '';
                            $fileType = '';
                            $mimeType  = '';
                            if ($courses_teach->main_file_path != null) {
                                $cleanUrl = str_replace('http://elcat.localhost/', '', $courses_teach->main_file_path);
                                $localingPath = str_replace('/', DIRECTORY_SEPARATOR, $cleanUrl); // use \\ on windows
                                $final = public_path($localingPath);
                                $extension = pathinfo($final)['extension'];

                                $mimeType = mime_content_type($final);
                                $fileType = explode('/',$mimeType)[0];

                            }
                            $noDownStr = 'controlsList=nodownload';
                            ?>
                            {{-- {{ mime_content_type($final) }} --}}
                            {{-- {{ var_dump(Config::get('lfm.folder_categories.file.valid_mime')) }} --}}

                            @if($fileType == 'video')
                            <video style="width:100%; margin-bottom:20px; object-fit: cover;" controls crossorigin playsinline  id="player">

                                <source src="{{ $courses_teach->main_file_path }}" type="{{ $mimeType }}" size="1080" />

                                <a href="{{ $courses_teach->main_file_path }}" download>Download</a>
                            </video>
                            @elseif($fileType == 'audio')
                            <audio style="width:100%; margin-bottom:20px;" id="player" controls >
                                <source src="{{ $courses_teach->main_file_path }}" type="{{ $mimeType }}" />
                                {{-- <source src="/path/to/audio.ogg" type="audio/ogg" /> --}}
                            </audio>
                            @elseif($mimeType == 'application/pdf')
                                    <a href="{{ $courses_teach->main_file_path }}"><strong>Download File</strong></a>
                            @else

                            @endif
                            {!! $courses_teach->description !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- end:: accordions -->


    @include('pages.student.learning.comment')

</div>

<!-- end:: Content -->
@endsection

@section('script-bottom')

<script src="{{ asset('/') }}plyr-master/dist/plyr.js"></script>
<script src="{{ asset('/') }}admin_res/plugins/timejs/timeme.js"></script>
<script type="text/javascript">
    // Initialize library and start tracking time
    TimeMe.initialize({
        currentPageName: "my-home-page", // current page
        idleTimeoutInSeconds: 0 // seconds
    });

    // ... Some time later ...

    // Retrieve time spent on current page
    var timeSpentOnPage = TimeMe.getTimeOnCurrentPageInSeconds();

</script>
<script>

    $(window).on('unload', function() {
        console.log(TimeMe.getTimeOnCurrentPageInSeconds());
        var url = "{{ route('log.courses') }}";
        var formData = new FormData();
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));
        formData.append('uuid', '{{ $log->uuid }}');
        formData.append('total_access_time', TimeMe.getTimeOnCurrentPageInSeconds());
        navigator.sendBeacon(url, formData);

    });
    // $(window).bind('beforeunload', function() {
    //     // myfun();
    //     // console.log(TimeMe.getTimeOnCurrentPageInSeconds());


    //     // $.ajaxSetup({
    //     //     headers: {
    //     //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     //     }
    //     // });

    //     // $.ajax({
    //     //     url: "{{ route('log.courses') }}",
    //     //     method: 'POST',
    //     //     data: {

    //     //         uuid: '{{ $log->uuid }}',
    //     //         total_access_time: TimeMe.getTimeOnCurrentPageInSeconds(),

    //     //     },success: function(response){
    //     //         console.log(response);
    //     //     },error: function(xhr, status, error){
    //     //         console.log(xhr.responseText);
    //     //         console.log(status);
    //     //         console.log(error);
    //     //     }
    //     // });

    //     // console.log(TimeMe.getTimeOnCurrentPageInSeconds());
    //     // return 'Are you sure you want to leave?';



    // });
</script>
@endsection
