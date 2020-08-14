@extends('pages.srv_admin.assisted_test.manage-single')

@section('other-css')
<!--begin::Page Vendors Styles(used by this page) -->
<link href="{{ asset('/') }}admin_res/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />

<style>
    .optiontext {
        font-size: 1.3rem !important;
        font-weight: 500 !important;
        color: #48465b !important;
    }

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
        color: #fd397a !important;
    }

    .is-warning .kt-menu__link .kt-menu__link-text {
        color: #ffb822 !important;
    }

    .kt-aside-menu .kt-menu__nav>.kt-menu__item.kt-menu__item--active>.kt-menu__link .kt-menu__link-text {
        color: #5d78ff !important;
    }

    /*.kt-radio > input:checked ~ span:after {*/
    /*    display: block !important;*/
    /*}*/

    .kt-radio>.answered:after {
        border: solid #bfc7d7;
        background: #bfc7d7;
    }

    .kt-radio>.answeris:after {
        border: solid #1dc9b7;
        background: #1dc9b7;
    }

    .kt-radio>.answer:after {
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

    .active-bold>.kt-menu__link>.kt-menu__link-text {
        font-weight: bold !important;
    }
</style>
<!--end::Page Vendors Styles -->
@endsection

@section('manage')
<!--Begin:: App Content-->
<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
    <div class="row">
        <div class="col-xl-12">
            <form id="kt-form" class="kt-portlet" style="min-height: 50vh" id="form-wrapper">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">@lang('assisted_test.edt-score-title')
                            <small>{{ $participant->details->name }}</small></h3>
                    </div>

                </div>
                <?php $num = 1; ?>

                @foreach($questions as $item)
                <div id="question-{{ $num }}" data-score="{{ $item->sys_score }}" data-max-score="{{ $item->score }}" data-question-type="{{ $item->type }}" class="question kt-portlet__body">

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
                                            <label class="kt-radio kt-radio--bold {{ ($opt->randkeys == $item->key) ? 'kt-radio--success':'' }} optiontext">
                                                {!! $opt->optiontext !!}
                                                <div class="answer-field" type="radio"></div>
                                                @if($opt->randkeys == $item->key)
                                                <span class="answer answeris" style="margin-top: 3px"></span>
                                                @elseif($opt->randkeys != $item->key && $opt->randkeys == $item->panswer)
                                                <span class="answer answered" style="margin-top: 3px"></span>
                                                @else
                                                <span style="margin-top: 3px"></span>
                                                @endif
                                            </label>
                                            @endforeach
                                        </div>
                                        @elseif($item->type == 2)
                                        <div class="kt-radio-list">
                                            <label class="kt-radio kt-radio--bold {{ (1 == $item->key) ? 'kt-radio--success':'' }} optiontext">
                                                @lang('assisted_test.qtn-2-1')
                                                <div class="answer-field" type="radio"></div>
                                                @if(1 == $item->key)
                                                <span class="answer answeris" style="margin-top: 3px"></span>
                                                @elseif($opt->panswer != $item->key && 1 == $item->panswer)
                                                <span class="answer answered" style="margin-top: 3px"></span>
                                                @else
                                                <span style="margin-top: 3px"></span>
                                                @endif
                                            </label>

                                            <label class="kt-radio kt-radio--bold {{ (0 == $item->key) ? 'kt-radio--success':'' }} optiontext">
                                                @lang('assisted_test.qtn-2-0')
                                                <div class="answer-field" type="radio"></div>
                                                @if(0 == $item->key)
                                                <span class="answer answeris" style="margin-top: 3px"></span>
                                                @elseif($opt->panswer != $item->key && 0 == $item->panswer)
                                                <span class="answer answered" style="margin-top: 3px"></span>
                                                @else
                                                <span style="margin-top: 3px"></span>
                                                @endif
                                            </label>
                                        </div>
                                        @else
                                        <div class="form-group optiontext">
                                            <p style="font-weight: bold !important;">Dijawab</p>
                                            {!! $item->panswer !!}
                                        </div>

                                        <div class="form-group optiontext">
                                            <p style="font-weight: bold !important;">Jawaban Soal</p>
                                            {!! $item->key !!}
                                        </div>

                                        <div class="form-group optiontext" style="margin-bottom: 1rem">
                                            <p style="font-weight: bold !important;">{{ __('assisted_test.edt-score-field',['max_val'=>$item->score]) }} </p>
                                            {{-- {!! $item->sys_score !!}--}}
                                        </div>

                                        <div class="row">
                                            <div class="col-4">
                                                <input type="number" name="answer-{{ $item->id_answer }}" step="0.1" max="{{ $item->score }}" min="0" value="{{ $item->sys_score }}" class="numbers-{{ $num }} form-control">
                                            </div>
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

            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="kt-portlet__foot">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <button id="btn_back" class="btn btn-brand">
                            <i class="fa fa-angle-left"></i>
                            @lang('general.btn-back')
                        </button>
                        <button id="btn_next" class="btn btn-brand">
                            @lang('general.btn-next')
                            <i class="fa fa-angle-right"></i>
                        </button>
                        <div class="float-right">
                            <button id="btn_finish" class="btn btn-success">@lang('general.btn-save')</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--End:: App Content-->


@endsection
@section('other-script')
<script>
    (function($) {
        $.fn.restrict = function() {
            return this.each(function() {
                if (this.type && 'number' === this.type.toLowerCase()) {
                    $(this).on('change', function() {
                        var _self = this,
                            v = parseFloat(_self.value),
                            min = parseFloat(_self.min),
                            max = parseFloat(_self.max);
                        if (v >= min && v <= max) {
                            _self.value = v;
                        } else {
                            _self.value = v < min ? min : max;
                        }
                    });
                }
            });
        };
    })(jQuery);
</script>
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
    // let widget_nav = $('.nav-question');
    $(document).ready(function() {
        widget.not('#question-' + currentPage).hide();

        $('#nav-question-' + currentPage).addClass('active-bold');
        btn_back.hide();
        $('.numbers-' + currentPage).restrict();
        // btn_finish.hide();
        // alert(widget.length);

    });

    // navigation function
    btn_next.click(function() {
        toggleQ('next');
    });

    btn_back.click(function() {
        toggleQ('back');
    });

    btn_finish.click(function() {
        // console.log($('#kt-form').serialize());
        let update_url = "{{ route('srv_admin.assistedtest.result.update',$exam->uuid) }}?id={{ $participant->id_participant }}";
        let dataForm = $('#kt-form').serialize();
        KTApp.progress(btn_finish);
        $.ajax({
            url: update_url,
            method: 'post',
            data: dataForm,
            success: function(responses) {
                console.log(responses);
                let finish_content = "@lang('assisted_test.finish-edt-content')";
                finish_content = finish_content.replace(":scors", responses.newscore).replace(":style", "style='font-size:30px'");
                swal.fire({
                    "title": "@lang('assisted_test.finish-edt-title')",
                    "html": finish_content,
                    "type": "success",
                    "confirmButtonClass": "btn btn-primary",
                    allowOutsideClick: true,
                    confirmButtonText: "@lang('general.btn-back-2')",
                }).then((result) => {
                    if (result.value) {
                        window.location.replace("{{ route('srv_admin.assistedtest.participants',$exam->uuid) }}");
                    }
                });
                KTApp.unprogress(btn_finish);
            },
            error: function(xhr, status, error) {
                // var err = eval("(" + xhr.responseText + ")");
                console.log(xhr.responseText);
                console.log(status);
                console.log(error);
            }
        })
    });

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

        if (currentPage >= widget.length) {
            // btn_finish.show();
            btn_next.hide();
        } else {
            // btn_finish.hide();
            btn_next.show();
        }

        let nextPage = $('#question-' + currentPage);
        $('.numbers-' + currentPage).restrict();
        // widget_nav.not('#nav-question-' + currentPage).removeClass('active-bold');
        // $('#nav-question-' + currentPage).addClass('active-bold');
        await widget.not('#question-' + currentPage).fadeOut(200).promise();
        await nextPage.fadeIn(200).promise();
    }
</script>

@endsection