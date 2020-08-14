<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1">
            <ul class="kt-menu__nav ">

                <li class="kt-menu__item  {{ setActiveMenu($nav,'dashboard') }}" aria-haspopup="true"><a href="{{ route('sudo.dashboard') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Dashboard</span></a></li>

                @if(isset($managed['id_company']))
                    <li class="kt-menu__section ">
                        <h4 class="kt-menu__section-text"><i class="kt-menu__section-icon flaticon-presentation-1"></i>Opsi Monitor</h4>
                    </li>

                    <li class="kt-menu__item  {{ setActiveMenu($nav,'m-elearning') }}" aria-haspopup="true">
                        <a href="{{ route('sudo.customers.monitor.courses.list',$managed['id_company']) }}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon flaticon-presentation-1"></i>
                            <span class="kt-menu__link-text">@lang('general.elearning')</span>
                        </a>
                    </li>
                    <li class="kt-menu__item  {{ setActiveMenu($nav,'m-exams') }}" aria-haspopup="true">
                        <a href="{{ route('sudo.customers.monitor.exams.list',$managed['id_company']) }}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon flaticon-list"></i>
                            <span class="kt-menu__link-text">Assisted Test</span>
                        </a>
                    </li>

                    <li class="kt-menu__item  {{ setActiveMenu($nav,'m-announcement') }}" aria-haspopup="true">
                        <a href="{{ route('sudo.customers.monitor.announ.list',$managed['id_company']) }}" class="kt-menu__link ">
                            <i class="kt-menu__link-icon flaticon2-speaker"></i>
                            <span class="kt-menu__link-text">Pengumuman</span>
                        </a>
                    </li>
                @endif

                @if(Request::route()->getName() == 'student.learning.learning' || Request::route()->getName() == 'student.learning.materials')

                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text"><i class="kt-menu__section-icon flaticon-presentation-1"></i>@lang('courses.stdn-learning-curent-learn')</h4>

                </li>

                    <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--active kt-menu__item--open" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon
                        flaticon-list"></i><span class="kt-menu__link-text">{{ $courses->title }}</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                            <ul class="kt-menu__subnav">
                                @foreach ($courses->teachMaterials as $item)
                                    <?php
                                        $is_active = '';
                                        if(isset($courses_teach->location)){
                                            if($item->location == $courses_teach->location){
                                                $is_active = 'kt-menu__item--active';
                                            }
                                        }

                                    ?>
                                    <li class="kt-menu__item {{ $is_active }}" aria-haspopup="true">
                                        <a href="{{ route('student.learning.materials',[$courses->uuid,$item->location]) }}" class="kt-menu__link ">
                                            <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text">{{ $item->title }}</span>
                                        </a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </li>

                @endif


                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text"><i class="kt-menu__section-icon flaticon-presentation-1"></i>Applications</h4>

                </li>

                <li class="kt-menu__item  {{ setActiveMenu($nav,'applications') }}" aria-haspopup="true"><a href="{{ route('sudo.apps.manage.list') }}" class="kt-menu__link "><i class="kt-menu__link-icon fal fa-computer-speaker"></i><span class="kt-menu__link-text">Kelola Aplikasi</span></a></li>


                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text"><i class="kt-menu__section-icon flaticon-presentation-1"></i>Pengguna</h4>

                </li>
                <li class="kt-menu__item  {{ setActiveMenu($nav,'overview') }}" aria-haspopup="true"><a href="{{ route('sudo.customers.monitor.list') }}" class="kt-menu__link "><i class="kt-menu__link-icon fal fa-monitor-heart-rate"></i><span class="kt-menu__link-text">Overview Layanan Pengguna</span></a></li>
                <li class="kt-menu__item  {{ setActiveMenu($nav,'transactions') }}" aria-haspopup="true"><a href="{{ route('sudo.transactions.list') }}" class="kt-menu__link "><i class="kt-menu__link-icon fal fa-money-check-alt"></i><span class="kt-menu__link-text">Riwayat Transaksi</span></a></li>


            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->
</div>

<!-- end:: Aside -->
