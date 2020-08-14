<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1">
            <ul class="kt-menu__nav ">

                <li class="kt-menu__item active" aria-haspopup="true">
                    <a href="{{ route('student.assistedtest.overview', $exam->uuid) }}" class="kt-menu__link ">
                        <i class="kt-menu__link-icon far fa-chevron-left"></i>
                        <span class="kt-menu__link-text">Kembali</span>
                    </a>
                </li>

                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text"><i class="kt-menu__section-icon flaticon-presentation-1"></i>Soal</h4>

                </li>

                @if(\Request::route()->getName() == "student.assistedtest.do.exam")
                <?php $i = 1 ?>
                @foreach($questions as $question)
                <li id="nav-question-{{ $i }}" data-number="{{ $i }}" class="nav-question kt-menu__item  {{ ($question->answer != null) ? 'is-success':'' }}">
                    <div class="kt-menu__link ">
                        <span class="kt-menu__link-text">
                            {{ $i }}. &nbsp; {{ substr(strip_tags($question->question),0,40) }}...
                        </span>
                    </div>
                </li>
                <?php $i += 1 ?>
                @endforeach
                @else
                    <?php $i = 1 ?>

                    @foreach($questions as $question)

                        <?php
                            $setColor = '';
                            if($question->key == $question->panswer){
                                $setColor = 'is-success';
                            }else if($question->key != $question->panswer && $question->panswer != ''){
//                                $setColor = 'is-wrong';
                                $setColor = 'is-warning';
                            }else{
                                $setColor = 'is-wrong';
                            }

                            if($question->type == 3){
                                $setColor = 'is-warning';
                            }
                        ?>

                        <li id="nav-question-{{ $i }}" data-number="{{ $i }}" class="nav-question kt-menu__item  {{  $setColor }}">
                            <div class="kt-menu__link ">
                        <span class="kt-menu__link-text">
                            {{ $i }}. &nbsp; {{ substr(strip_tags($question->question),0,40) }}...
                        </span>
                            </div>
                        </li>
                        <?php $i += 1 ?>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->
</div>

<!-- end:: Aside -->
