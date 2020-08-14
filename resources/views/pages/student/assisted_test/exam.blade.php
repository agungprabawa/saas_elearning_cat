@extends('layouts.student.master')

@section('css')
    <style>
        .d-flex {
            display: -webkit-box !important;
            display: -ms-flexbox !important;
            /* display: flex !important; */
        }

        .kt-section__title table tr td p {
            margin: 0 !important;
        }

        .optiontext {
            font-size: 1.3rem !important;
            font-weight: 500 !important;
            color: #48465b !important;
        }
        .is-success .kt-menu__link .kt-menu__link-text {
            color: #1dc9b7 !important;
        }

        .kt-aside-menu .kt-menu__nav > .kt-menu__item.kt-menu__item--active > .kt-menu__link .kt-menu__link-text {
            color: #5d78ff !important;
        }
    </style>

@endsection

@section('content')

    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    @lang('assisted_test.stdn-title') </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a id="demo" href="" class="kt-subheader__breadcrumbs-link">
                         </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>

                    <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                </div>
            </div>

        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- end:: Subheader -->

    <!-- begin:: Content -->

    <!--begin::Portlet-->

    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <!--Begin::Section-->
        <div class="row" style="min-height: 60vh">
            <?php $num = 1 ?>

            <div class=" kt-portlet">
                @foreach($questions as $item)
                    <div id="question-{{ $num }}" data-question-id="{{ $item->id_question }}" data-question-type="{{ $item->type }}" class="question kt-portlet__body">

                        <!--begin::Section-->
                        <div class="kt-section">
                            <div class="kt-section__title">
                                <table style="width: 100%">
                                    <tr>
                                        <td valign="top" style="width: 2%">
                                            {{ $num }}.
                                        </td>
                                        <td style="width: 98%">
                                            {!! $item->question !!}
                                        </td>
                                    </tr>
                                </table>

                            </div>
                            <div class="kt-section__desc">
                                <table style="width: 100%">
                                    <tr>
                                        <td valign="top" style="width: 2%">

                                        </td>
                                        <td style="width: 98%">
                                            @if($item->type == 1)
                                                @if($exam->random_q == 1)
                                                <?php
                                                $shuffledOpt = $item->options->shuffle();
                                                ?>
                                                @else
                                                    <?php
                                                    $shuffledOpt = $item->options;
                                                    ?>
                                                @endif
                                                <div class="kt-radio-list">
                                                    @foreach($shuffledOpt as $opt)
                                                        <label class="kt-radio kt-radio--bold optiontext">
                                                            {!! $opt->optiontext !!}
                                                            <input data-question-id="{{ $item->id_question }}" {{ ($item->answer == $opt->randkeys) ? 'checked':'' }} class="answer-field" type="radio" value="{{ $opt->randkeys }}"
                                                                   name="answer-{{ $item->id_question }}">
                                                            <span style="margin-top: 3px"></span>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            @elseif($item->type == 2)
                                                <div class="kt-radio-list">
                                                    <label class="kt-radio kt-radio--bold optiontext">
                                                        @lang('assisted_test.qtn-2-1')
                                                        <input data-question-id="{{ $item->id_question }}" {{ ($item->answer == '1') ? 'checked':'' }} class="answer-field" type="radio" value="1"
                                                               name="answer-{{ $item->id_question }}">
                                                        <span style="margin-top: 3px"></span>
                                                    </label>

                                                    <label class="kt-radio kt-radio--bold optiontext">
                                                        @lang('assisted_test.qtn-2-0')
                                                        <input data-question-id="{{ $item->id_question }}" {{ ($item->answer == '0') ? 'checked':'' }} class="answer-field" type="radio" value="0"
                                                               name="answer-{{ $item->id_question }}">
                                                        <span style="margin-top: 3px"></span>
                                                    </label>
                                                </div>
                                            @else
                                                <textarea data-question-id="{{ $item->id_question }}"  class="essay-field" name="answer-{{ $item->id_question }}" id="editor-{{ $num }}" cols="30" rows="10">
                                                    {!! $item->answer !!}
                                                </textarea>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>

                        </div>
                        <!--end::Section-->
                    </div>
                    <?php $num += 1 ?>
                @endforeach

            </div>

        </div>
        <div class="row">
            <div class="kt-portlet__foot">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <button id="btn_back" class="btn btn-brand">Back</button>
                        <button id="btn_next" class="btn btn-brand">Next</button>
                        <button id="btn_finish" class="btn btn-success">Finish</button>
                    </div>
                </div>
            </div>
        </div>
        <!--End::Section-->
    </div>
    <!--end::Portlet-->


@endsection

@section('script-bottom')
    <script src="{{ asset('/') }}admin_res/plugins/ckeditor/ckeditor.js"></script>
    <script src="{{ asset('/') }}admin_res/plugins/timejs/timeme.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let currentPage = 1;
        let widget = $('.question');
        let btn_back = $('#btn_back');
        let btn_finish = $('#btn_finish');
        let btn_next = $('#btn_next');
        let widget_nav = $('.nav-question');

        // initialization
        TimeMe.initialize({
            currentPageName: 'pages',
            idleTimeoutInSeconds: 0 // seconds
        });

        $(document).ready(function () {
            widget.not('#question-' + currentPage).hide();
            $('#nav-question-' + currentPage).addClass('kt-menu__item--active');
            btn_back.hide();
            btn_finish.hide();
            // alert(widget.length);

            let shouldEnd = "{{ session('exam-sdone-'.$exam->uuid) }}";
            timeCounter(shouldEnd);
        });

        // navigation function
        btn_next.click(function () {
            toggleQ('next');
        });

        btn_back.click(function () {
            toggleQ('back');
        });

        btn_finish.click(function () {
            KTApp.progress(btn_finish);
            let url = '{{ route("student.assistedtest.finish","$exam->uuid") }}';

            let timeId = $('#question-'+currentPage).attr('data-question-id');
            saveTimeSpent(timeId);

            if($('#question-'+currentPage).attr('data-question-type') == '3'){
                // CKEDITOR.instances.editor2.updateElement();
                
                let answer = CKEDITOR.instances['editor-'+currentPage].getData();
                let answerOn = $('#editor-'+currentPage).attr('data-question-id');
                saveAnswer(answerOn,answer);
            }

            $.ajax({
                url: url,
                type: 'post',
                data: {},
                success: function (response) {
                    // console.log(response);
                    if($.isEmptyObject(response.error)){
                        console.log(response);
                        let finish_content = "@lang('assisted_test.finish-content')";
                        finish_content = finish_content.replace(":scors",response.final).replace(":style","style='font-size:30px'");
                        swal.fire({
                            "title": "@lang('assisted_test.finish-title')",
                            "html": finish_content,
                            "type": "success",
                            "confirmButtonClass": "btn btn-primary",
                            allowOutsideClick: false,
                            confirmButtonText: "@lang('assisted_test.finish-btn')",
                        }).then((result) => {
                            if (result.value) {
                                location.reload(true);
                            }
                        });
                    }else{
                        // console.log(response.data);
                        let number = '';
                        let tmp = '<strong>:number</strong>';
                        for (let [key, value] of Object.entries(response.data)){
                            let select = $('div[data-question-id="'+ value['id_question'] +'"]');
                            let num = String(select.attr("id"));
                            num = num.replace("question-",'');
                            number += num+', ';

                        }
                        number = number.slice(0,-2); // remove space and last coma
                        number = tmp.replace(':number',number);

                        swal.fire({
                            "title": "@lang('assisted_test.inc-title')",
                            "html": "@lang('assisted_test.inc-content')"+number,
                            "type": "warning",
                            "confirmButtonClass": "btn btn-secondary"
                        });
                    }
                    KTApp.unprogress(btn_finish);
                }
            })
        });

        // navigation toggle
        widget_nav.on('click', function (e) {
            e.preventDefault();
            let to = $(this).attr('data-number');

            toggleQ('to', parseInt(to));
        });

        // navigation processor
        async function toggleQ(type, to = 0) {
            let timeId = $('#question-'+currentPage).attr('data-question-id');
            saveTimeSpent(timeId);
            
            // IF type esai, then save on next / back
            if($('#question-'+currentPage).attr('data-question-type') == '3'){
                // CKEDITOR.instances.editor2.updateElement();
                
                let answer = CKEDITOR.instances['editor-'+currentPage].getData();
                let answerOn = $('#editor-'+currentPage).attr('data-question-id');
                saveAnswer(answerOn,answer);
            }

            if (type === 'next') {
                currentPage += 1;
            } else if (type === 'back') {
                currentPage -= 1;
            } else if (type === 'to') {
                currentPage = to;
            }

            if (currentPage > 1) {
                btn_back.show();
            } else {
                btn_back.hide();
            }

            if (currentPage >= widget.length) {
                btn_finish.show();
                btn_next.hide();
            } else {
                btn_finish.hide();
                btn_next.show();
            }

            if($('#question-'+currentPage).attr('data-question-type') == '3'){
                idleSave(currentPage);
            }


            widget_nav.not('#nav-question-' + currentPage).removeClass('kt-menu__item--active');
            $('#nav-question-' + currentPage).addClass('kt-menu__item--active');

            await widget.not('#question-' + currentPage).fadeOut(200).promise();
            await $('#question-' + currentPage).fadeIn(200).promise();
        }

        // Opsi ABCDETF
        $('.answer-field').on('change',function () {
            let answer = $(this).val();
            // let answerOn = this.name;
            let answerOn = $(this).attr('data-question-id');

            saveAnswer(answerOn,answer);

        });

        // OPSI ESAI
        let answer_field = CKEDITOR.replaceAll(function (textarea,config) {
            if(textarea.className === 'essay-field'){
                config.toolbarGroups = [
                    { name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
                    { name: 'links', groups: [ 'links' ] },
                    { name: 'insert', groups: [ 'insert' ] },
                    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
                    { name: 'forms', groups: [ 'forms' ] },
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
                    { name: 'colors', groups: [ 'colors' ] },
                    { name: 'tools', groups: [ 'tools' ] },
                    { name: 'styles', groups: [ 'styles' ] },
                    { name: 'others', groups: [ 'others' ] },
                    { name: 'about', groups: [ 'about' ] }
                ];
                config.fontSize_defaultLabel = ''
                config.removeButtons = 'Source,Save,NewPage,Preview,Print,Templates,Cut,Copy,Paste,PasteText,PasteFromWord,Find,SelectAll,Scayt,Form,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,Replace,Strike,Subscript,Superscript,CopyFormatting,RemoveFormat,CreateDiv,Language,Anchor,Flash,SpecialChar,PageBreak,Iframe,ShowBlocks,About,Font,Checkbox,Unlink,BidiRtl,BidiLtr,Underline,Styles,Link,Image,Table,HorizontalRule,Smiley,Blockquote,JustifyLeft,JustifyCenter,JustifyRight,JustifyBlock,TextColor,Format,FontSize';
                return true;
            }else{
                return false
            }
        });

        function idleSave(page) {
            let editor = CKEDITOR.instances['editor-'+page];
            let x_timer;

            editor.document.on('keyup',function (e) {
                clearTimeout(x_timer);
                x_timer = setTimeout(function () {
                    let answer = CKEDITOR.instances['editor-'+page].getData();
                    let answerOn = $('#editor-'+page).attr('data-question-id');
                    saveAnswer(answerOn,answer);
                },5000);
            });
        }

       
        function saveAnswer(answerOn,answer) {
            let url = '{{ route("student.assistedtest.answer","$exam->uuid") }}';
            $.ajax({
                url: url,
                async: false,
                type: 'post',
                data: {
                    'answer':answer,
                    'answerOn': answerOn,
                },
                success: function (response) {
                    // alert('#nav-question-'+currentPage);
                    console.log(response);
                    if(response.data.answer == null){
                        $('#nav-question-'+currentPage).removeClass('is-success');
                    }else{
                        $('#nav-question-'+currentPage).addClass('is-success');
                    }
                    
                },
                error: function (xhr, status, error) {
                    // var err = eval("(" + xhr.responseText + ")");
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);

                    swal.fire({
                        "title": "@lang('general.msg-error-title')",
                        "html": "@lang('general.msg-error-content')",
                        "type": "error",
                        "confirmButtonClass": "btn btn-secondary",
                        confirmButtonText: "@lang('general.msg-error-reload-btn')",
                    }).then((result) => {
                        if (result.value) {
                            location.reload(true);
                        }
                    });
                }
            });
        }

        function saveTimeSpent(id) {
            // TimeMe.initialize({
            //     currentPageName: "pages", // current page
            //     idleTimeoutInSeconds: 0 // seconds
            // });
            let time_used = TimeMe.getTimeOnPageInSeconds("pages");
            console.log(time_used);
            let url = '{{ route("student.assistedtest.answer","$exam->uuid") }}';
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    'usedOn': id,
                    'timeUsed':time_used,
                },
                success: function (response) {
                    // console.log(response);
                },
                error: function (xhr, status, error) {
                    // var err = eval("(" + xhr.responseText + ")");
                    console.log(xhr.responseText);
                    console.log(status);
                    console.log(error);
                }
            });
            TimeMe.resetRecordedPageTime("pages");
            TimeMe.startTimer();
        }

        // from https://www.w3schools.com/howto/howto_js_countdown.asp
        // Set the date we're counting down to
        function timeCounter(endDate){
            let countDownDate = new Date(endDate).getTime();

            // Update the count down every 1 second
            let x = setInterval(function() {

                // Get today's date and time
                let now = new Date().getTime();

                // Find the distance between now and the count down date
                let distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Display the result in the element with id="demo"
                let strdays = function(){
                    if(days !== 0){
                        return days + " @lang('assisted_test.str-days')";
                    }
                    return '';
                };

                let strhours = function(){
                    if(hours !== 0){
                        return hours + " @lang('assisted_test.str-hours')";
                    }
                    return '';
                };

                let strminutes = function(){
                    if(minutes !== 0){
                        return minutes + " @lang('assisted_test.str-minutes')";
                    }
                    return '';
                };

                let strseconds = function(){
                    if(seconds !== 0){
                        return seconds + " @lang('assisted_test.str-seconds')";
                    }
                    return '';
                };
                document.getElementById("demo").innerHTML = strdays()+' '+strhours()+' '+strminutes()+' '+strseconds();

                // If the count down is finished, write some text
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);
        }
    </script>
@endsection
