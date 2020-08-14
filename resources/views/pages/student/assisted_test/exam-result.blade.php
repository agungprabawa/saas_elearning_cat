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

        .is-wrong .kt-menu__link .kt-menu__link-text {
            /* color: #fd397a !important; */
        }

        .is-warning .kt-menu__link .kt-menu__link-text {
            color: #ffb822 !important;
        }

        .kt-aside-menu .kt-menu__nav > .kt-menu__item.kt-menu__item--active > .kt-menu__link .kt-menu__link-text {
            color: #5d78ff !important;
        }

        /*.kt-radio > input:checked ~ span:after {*/
        /*    display: block !important;*/
        /*}*/

        .kt-radio > .answered:after {
            border: solid #bfc7d7;
            background: #bfc7d7;
        }

        .kt-radio > .answeris:after {
            border: solid #1dc9b7;
            background: #1dc9b7;
        }

        .kt-radio > .answer:after {
            content: '';
            position: absolute;
            display: block !important;
            top: 50%;
            left: 50%;
            margin-left: -3px;
            margin-top: -3px;
            width: 6px;
            height: 6px;
            border-radius: 100% !important;
        }

        .active-bold > .kt-menu__link > .kt-menu__link-text {
            font-weight: bold !important;
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
                    {{ $exam->title }}
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
        <div class="row">

            <?php $num = 1 ?>
            <div class="col-md-12">
                <div class=" kt-portlet" style="min-height: 60vh">

                    @foreach($questions as $item)
                        <div id="question-{{ $num }}" data-question-type="{{ $item->type }}"
                             class="question kt-portlet__body">

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
                                                    <div class="kt-radio-list">
                                                        @foreach($item->options as $opt)
                                                            <label
                                                                class="kt-radio kt-radio--bold {{ ($opt->randkeys == $item->key) ? 'kt-radio--success':'' }} optiontext">
                                                                {!! $opt->optiontext !!}
                                                                <div class="answer-field" type="radio"></div>
                                                                @if($opt->randkeys == $item->key)
                                                                    <span class="answer answeris"
                                                                          style="margin-top: 3px"></span>
                                                                @elseif($opt->randkeys != $item->key && $opt->randkeys == $item->panswer)
                                                                    <span class="answer answered"
                                                                          style="margin-top: 3px"></span>
                                                                @else
                                                                    <span style="margin-top: 3px"></span>
                                                                @endif
                                                            </label>
                                                        @endforeach
                                                    </div>
                                                @elseif($item->type == 2)
                                                    <div class="kt-radio-list">
                                                        <label
                                                            class="kt-radio kt-radio--bold {{ (1 == $item->key) ? 'kt-radio--success':'' }} optiontext">
                                                            @lang('assisted_test.qtn-2-1')
                                                            <div class="answer-field" type="radio"></div>
                                                            @if(1 == $item->key)
                                                                <span class="answer answeris"
                                                                      style="margin-top: 3px"></span>
                                                            @elseif($item->panswer != $item->key && 1 == $item->panswer)
                                                                <span class="answer answered"
                                                                      style="margin-top: 3px"></span>
                                                            @else
                                                                <span style="margin-top: 3px"></span>
                                                            @endif
                                                        </label>

                                                        <label
                                                            class="kt-radio kt-radio--bold {{ (0 == $item->key) ? 'kt-radio--success':'' }} optiontext">
                                                            @lang('assisted_test.qtn-2-0')
                                                            <div class="answer-field" type="radio"></div>
                                                            @if(0 == $item->key)
                                                                <span class="answer answeris"
                                                                      style="margin-top: 3px"></span>
                                                            @elseif($item->panswer != $item->key && 0 == $item->panswer)
                                                                <span class="answer answered"
                                                                      style="margin-top: 3px"></span>
                                                            @else
                                                                <span style="margin-top: 3px"></span>
                                                            @endif
                                                        </label>
                                                    </div>
                                                @else
                                                    <strong>Jawaban anda:</strong>
                                                    <div class="form-group optiontext">

                                                        {!! $item->panswer !!}
                                                    </div>

                                                    <strong>Kunci jawaban:</strong>
                                                    <div class="form-group optiontext">
                                                        {!! $item->key !!}
                                                    </div>
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
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="kt-portlet__foot">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <button id="btn_back" class="btn btn-brand">Back</button>
                            <button id="btn_next" class="btn btn-brand">Next</button>
                            <!-- <button id="btn_finish" class="btn btn-success">Finish</button> -->
                        </div>
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

        var currentPage = 1;
        var widget = $('.question');
        var btn_back = $('#btn_back');
        var btn_next = $('#btn_next');
        var widget_nav = $('.nav-question');


        $(document).ready(function () {
            widget.not('#question-' + currentPage).hide();
            $('#nav-question-' + currentPage).addClass('active-bold');
            btn_back.hide();
            // alert(widget.length);

        });

        // navigation function
        btn_next.click(function () {
            toggleQ('next');
        });

        btn_back.click(function () {
            toggleQ('back');
        });


        widget_nav.on('click', function (e) {
            e.preventDefault();
            var to = $(this).attr('data-number');

            toggleQ('to', parseInt(to));
        });

        // navigation processor
        async function toggleQ(type, to = 0) {

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

            if (currentPage >= (widget.length)) {
                btn_next.hide();
            } else {
                btn_next.show();
            }


            widget_nav.not('#nav-question-' + currentPage).removeClass('active-bold');
            $('#nav-question-' + currentPage).addClass('active-bold');

            await widget.not('#question-' + currentPage).fadeOut(200).promise();
            await $('#question-' + currentPage).fadeIn(200).promise();
        }

    </script>
@endsection
