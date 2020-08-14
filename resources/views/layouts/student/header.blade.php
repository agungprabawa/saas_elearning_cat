<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
	<div class="kt-container  kt-container--fluid ">

		<!-- begin:: Brand -->
		<div class="kt-header__brand " id="kt_header_brand">
			<div class="kt-header__brand-logo">
				<a href="index.html">
					{{-- <img alt="Logo" src="{{ asset('/') }}admin_res/media/logos/logo-11.png" /> --}}
					<img style="max-height:55px !important" src="{{ auth()->user()->company->logo_url }}" alt="" srcset="">
				</a>
			</div>
			<div class="kkt-header__brand-nav">
				<button class="btn " id="kt_aside_toggler_desktop">
					<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24"></polygon>
								<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "></path>
								<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "></path>
							</g>
						</svg></span>
					<span style="display:none"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24" />
								<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero" />
								<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) " />
							</g>
						</svg></span>
				</button>

				<!--
<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
-->
			</div>

		</div>

		<!-- end:: Brand -->

		<!-- begin:: Header Topbar -->
		<div class="kt-header__topbar">
            <div class="kt-header__topbar-item">
                <?php
                $status = ["Admin", "Staf", "Student"];
                $class = "dropdown-toggle";
                $dataTonggle = "dropdown";

                if (auth()->user()->companies()->isEmpty() && auth()->user()->availStatus()->isEmpty()) {
                    $class = "";
                    $dataTonggle = "";
                }
                ?>
                <div class="dropdown" style="margin: auto 0; vertical-align: middle;">
                    <button type="button" class="btn btn-default {{ $class }}" data-toggle="{{ $dataTonggle }}" aria-haspopup="true" aria-expanded="true">
                        {{ auth()->user()->company->company_name }} &nbsp;-&nbsp;{{ $status[auth()->user()->active_status - 1] }}
                    </button>
                    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md">
                        <ul class="kt-nav kt-nav--bold kt-nav--md-space ">

                            @foreach (auth()->user()->availStatus() as $item)
                                <li class="kt-nav__item">
                                    <a class="kt-nav__link " href="{{ route('switch.to',$item->status) }}">
                                        {{-- <span class="kt-nav__link-icon"><i class="flaticon-security"></i></span> --}}
                                        <span class="kt-nav__link-text">{{ $status[$item->status - 1] }}</span>
                                    </a>
                                </li>
                            @endforeach
                            @if(auth()->user()->availStatus() != null)
                                <li class="kt-nav__separator"></li>
                            @endif

                            @foreach (auth()->user()->companies() as $item)
                                <li class="kt-nav__item">
                                    <a class="kt-nav__link active" href="{{ route('switch.session',$item->uuid) }}">
                                        <span class="kt-nav__link-icon"><img style="border-radius: 4px; width: 22px;" src="{{ asset($item->logo_url) }}" alt="" /></span>
                                        <span class="kt-nav__link-text">{{ $item->company_name }}</span>
                                    </a>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
			<!--begin: Search -->
			<div style="display:none" class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
				<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
					<span class="kt-header__topbar-icon"><i class="flaticon2-search-1"></i></span>
				</div>
				<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">
					<div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact" id="kt_quick_search_dropdown">
						<form method="get" class="kt-quick-search__form">
							<div class="input-group">
								<div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
								<input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
								<div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
							</div>
						</form>
						<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="325" data-mobile-height="200">
						</div>
					</div>
				</div>
			</div>

			<!--end: Search -->

			<!--begin: Notifications -->
			<notification :current_user="{{ auth()->user() }}"></notification>

			<!--end: Notifications -->

			<!--begin: User bar -->
			<div class="kt-header__topbar-item kt-header__topbar-item--user">
				<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
					<span class="kt-header__topbar-welcome kt-visible-desktop">Hi,</span>
					<span class="kt-header__topbar-username kt-visible-desktop">{{ auth()->user()->username }}</span>
					<img alt="Pic" src="{{ auth()->user()->cover_img }}" />
					<span class="kt-header__topbar-icon kt-bg-brand kt-hidden"><b>S</b></span>
				</div>
				<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

					<!--begin: Head -->
					<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
						<div class="kt-user-card__avatar">
							<img class="kt-hidden-" alt="Pic" src="{{ auth()->user()->cover_img }}" />

							<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
							<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
						</div>
						<div class="kt-user-card__name">
							{{ auth()->user()->name }}
						</div>
{{--						@if(!empty(auth()->user()->ownerOf()->toArray()))--}}
{{--						<div class="kt-user-card__badge">--}}
{{--							<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">Saldo {{ rupiah(auth()->user()->balance()) }}</span>--}}
{{--						</div>--}}
{{--						@endif--}}
					</div>

					<!--end: Head -->

					<!--begin: Navigation -->
					<div class="kt-notification">
						<a href="{{ route('user.profile') }}" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-calendar-3 kt-font-success"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title kt-font-bold">
									Profil Saya
								</div>
								<div class="kt-notification__item-time">
									Kelola akun dan lainnya
								</div>
							</div>
						</a>
						<a href="{{ route('logout') }}" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="fal fa-sign-out kt-font-danger"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title kt-font-bold">
									Logout
								</div>
								<div class="kt-notification__item-time">
									Logout dari layanan
								</div>
							</div>
						</a>

					</div>

					<!--end: Navigation -->
				</div>
			</div>

			<!--end: User bar -->
		</div>

		<!-- end:: Header Topbar -->
	</div>
</div>
