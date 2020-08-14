<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item  {{ setActiveMenu($nav,'dashboard') }}" aria-haspopup="true"><a href="{{ route('srv_admin.dashboard') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Dashboard</span></a></li>
                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Applications</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                @if(auth()->user()->company_subs('1') === true)
                <li class="kt-menu__item  kt-menu__item--submenu {{ setActiveMenu($nav,'learning',1) }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-presentation-1"></i><span class="kt-menu__link-text">@lang('general.elearning')</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item {{ setActiveSubMenu($nav,'create') }}" aria-haspopup="true"><a href="{{ route('srv_admin.courses.create') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('menu.nav-el-create')</span></a></li>

                            <li class="kt-menu__item {{ setActiveSubMenu($nav,'manage') }}" aria-haspopup="true"><a href="{{ route('srv_admin.courses.show') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('menu.nav-el-manage')</span></a></li>

                        </ul>
                    </div>
                </li>
                @endif
                @if(auth()->user()->company_subs('2') === true)
                <li class="kt-menu__item  kt-menu__item--submenu {{ setActiveMenu($nav,'assisted_test',1) }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon
                    flaticon-list"></i><span class="kt-menu__link-text">@lang('general.at')</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item {{ setActiveSubMenu($nav,'create') }}" aria-haspopup="true"><a href="{{ route('srv_admin.assistedtest.create') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('menu.nav-at-create')</span></a></li>

                            <li class="kt-menu__item {{ setActiveSubMenu($nav,'manage') }}" aria-haspopup="true"><a href="{{ route('srv_admin.assistedtest.show') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('menu.nav-at-manage')</span></a></li>
                        </ul>
                    </div>
                </li>
                @endif
                <li class="kt-menu__item  kt-menu__item--submenu {{ setActiveMenu($nav,'announcement',1) }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-speaker"></i><span class="kt-menu__link-text">@lang('menu.nav-announcement')</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item {{ setActiveSubMenu($nav,'your-announ') }}" aria-haspopup="true">
                                <a href="{{ route('general.announcement.all') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span style="font-weight: 600" class="kt-menu__link-text">@lang('menu.nav-ann-for-you')</span>
                                </a>
                            </li>
                            <li class="kt-menu__item {{ setActiveSubMenu($nav,'create') }}" aria-haspopup="true">
                                <a href="{{ route('srv_admin.announcement.create') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">@lang('menu.nav-ann-create')</span>
                                </a>
                            </li>
                            <li class="kt-menu__item {{ setActiveSubMenu($nav,'list') }}" aria-haspopup="true"><a href="{{ route('srv_admin.announcement.list') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('menu.nav-ann-list')</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__section ">
                    <h4 class="kt-menu__section-text">Manage Data</h4>
                    <i class="kt-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu {{ setActiveMenu($nav,'users',1) }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon-users"></i><span class="kt-menu__link-text">@lang('menu.nav-users')</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item {{ setActiveSubMenu($nav,'ucreate') }}" aria-haspopup="true"><a href="{{ route('srv_admin.users.create') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('menu.nav-users-create')</span></a></li>
                            <li class="kt-menu__item {{ setActiveSubMenu($nav,'umanage') }}" aria-haspopup="true"><a href="{{ route('srv_admin.users.index') }}" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">@lang('menu.nav-users-list')</span></a></li>
                        </ul>
                    </div>
                </li>
                <li class="kt-menu__item  kt-menu__item--submenu {{ setActiveMenu($nav,'other-data',1) }}" aria-haspopup="true" data-ktmenu-submenu-toggle="hover">
                    <a href="javascript:;" class="kt-menu__link kt-menu__toggle">
                        <i class="kt-menu__link-icon flaticon-open-box"></i>
                        <span class="kt-menu__link-text">Data lainnya</span>
                        <i class="kt-menu__ver-arrow la la-angle-right"></i>
                    </a>
                    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                        <ul class="kt-menu__subnav">
                            <li class="kt-menu__item {{ setActiveSubMenu($nav,'category') }}" aria-haspopup="true">
                                <a href="{{ route('srv_admin.other_data.category.list') }}" class="kt-menu__link ">
                                    <i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                        <span></span>
                                    </i>
                                    <span class="kt-menu__link-text">Kategori</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </li>

                @if (auth()->user()->active_status == 1)
                    <li class="kt-menu__section ">
                        <h4 class="kt-menu__section-text">Services Settings</h4>
                        <i class="kt-menu__section-icon flaticon-more-v2"></i>
                    </li>

                    <li class="kt-menu__item {{ setActiveMenu($nav,'payment') }}" aria-haspopup="true"><a href="{{ route('srv_admin.payment.index') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-coins"></i><span class="kt-menu__link-text">@lang('menu.nav-more-payment')</span></a></li>
                    <li class="kt-menu__item {{ setActiveMenu($nav,'subscribtion') }}" aria-haspopup="true"><a href="{{ route('srv_admin.subscribtions.index') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-interface-1"></i><span class="kt-menu__link-text">@lang('menu.nav-more-subscribe')</span></a></li>
                @endif

            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->
</div>

<!-- end:: Aside -->
