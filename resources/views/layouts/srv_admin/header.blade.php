<!-- begin:: Header -->
<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed " data-ktheader-minimize="on">
	<div class="kt-container  kt-container--fluid ">

		<!-- begin:: Brand -->
		<div class="kt-header__brand " id="kt_header_brand">
			<div class="kt-header__brand-logo">
				<a href="index.html">
					<img alt="Logo" src="{{ asset('/') }}admin_res/media/logos/logo-11.png" />
				</a>
			</div>
			<div class="kt-header__brand-nav">
				<div class="dropdown">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
						Dashboard
					</button>
					<div class="dropdown-menu dropdown-menu-fit dropdown-menu-md">
						<ul class="kt-nav kt-nav--bold kt-nav--md-space kt-margin-t-20 kt-margin-b-20">
							<li class="kt-nav__item">
								<a class="kt-nav__link active" href="#">
									<span class="kt-nav__link-icon"><i class="flaticon2-user"></i></span>
									<span class="kt-nav__link-text">Human Resources</span>
								</a>
							</li>
							<li class="kt-nav__item">
								<a class="kt-nav__link" href="#">
									<span class="kt-nav__link-icon"><i class="flaticon-feed"></i></span>
									<span class="kt-nav__link-text">Customer Relationship</span>
								</a>
							</li>
							<li class="kt-nav__item">
								<a class="kt-nav__link" href="#">
									<span class="kt-nav__link-icon"><i class="flaticon2-settings"></i></span>
									<span class="kt-nav__link-text">Order Processing</span>
								</a>
							</li>
							<li class="kt-nav__item">
								<a class="kt-nav__link" href="#">
									<span class="kt-nav__link-icon"><i class="flaticon2-chart2"></i></span>
									<span class="kt-nav__link-text">Accounting</span>
								</a>
							</li>
							<li class="kt-nav__separator"></li>
							<li class="kt-nav__item">
								<a class="kt-nav__link" href="#">
									<span class="kt-nav__link-icon"><i class="flaticon-security"></i></span>
									<span class="kt-nav__link-text">Finance</span>
								</a>
							</li>
							<li class="kt-nav__item">
								<a class="kt-nav__link" href="#">
									<span class="kt-nav__link-icon"><i class="flaticon2-cup"></i></span>
									<span class="kt-nav__link-text">Administration</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Brand -->

		<!-- begin:: Header Topbar -->
		<div class="kt-header__topbar">

			<!--begin: Search -->
			<div class="kt-header__topbar-item kt-header__topbar-item--search dropdown" id="kt_quick_search_toggle">
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

			<!--begin: Quick actions -->
			<div class="kt-header__topbar-item dropdown">
				<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
					<span class="kt-header__topbar-icon"><i class="flaticon2-gear"></i></span>
				</div>
				<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
					<form>

						<!--begin: Head -->
						<div class="kt-head kt-head--skin-light">
							<h3 class="kt-head__title">
								User Quick Actions
								<span class="kt-space-15"></span>
								<span class="btn btn-success btn-sm btn-bold btn-font-md">23 tasks pending</span>
							</h3>
						</div>

						<!--end: Head -->

						<!--begin: Grid Nav -->
						<div class="kt-grid-nav kt-grid-nav--skin-light">
							<div class="kt-grid-nav__row">
								<a href="#" class="kt-grid-nav__item">
									<span class="kt-grid-nav__icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M4.3618034,10.2763932 L4.8618034,9.2763932 C4.94649941,9.10700119 5.11963097,9 5.30901699,9 L15.190983,9 C15.4671254,9 15.690983,9.22385763 15.690983,9.5 C15.690983,9.57762255 15.6729105,9.65417908 15.6381966,9.7236068 L15.1381966,10.7236068 C15.0535006,10.8929988 14.880369,11 14.690983,11 L4.80901699,11 C4.53287462,11 4.30901699,10.7761424 4.30901699,10.5 C4.30901699,10.4223775 4.32708954,10.3458209 4.3618034,10.2763932 Z M14.6381966,13.7236068 L14.1381966,14.7236068 C14.0535006,14.8929988 13.880369,15 13.690983,15 L4.80901699,15 C4.53287462,15 4.30901699,14.7761424 4.30901699,14.5 C4.30901699,14.4223775 4.32708954,14.3458209 4.3618034,14.2763932 L4.8618034,13.2763932 C4.94649941,13.1070012 5.11963097,13 5.30901699,13 L14.190983,13 C14.4671254,13 14.690983,13.2238576 14.690983,13.5 C14.690983,13.5776225 14.6729105,13.6541791 14.6381966,13.7236068 Z" fill="#000000" opacity="0.3" />
												<path d="M17.369,7.618 C16.976998,7.08599734 16.4660031,6.69750122 15.836,6.4525 C15.2059968,6.20749878 14.590003,6.085 13.988,6.085 C13.2179962,6.085 12.5180032,6.2249986 11.888,6.505 C11.2579969,6.7850014 10.7155023,7.16999755 10.2605,7.66 C9.80549773,8.15000245 9.45550123,8.72399671 9.2105,9.382 C8.96549878,10.0400033 8.843,10.7539961 8.843,11.524 C8.843,12.3360041 8.96199881,13.0779966 9.2,13.75 C9.43800119,14.4220034 9.7774978,14.9994976 10.2185,15.4825 C10.6595022,15.9655024 11.1879969,16.3399987 11.804,16.606 C12.4200031,16.8720013 13.1129962,17.005 13.883,17.005 C14.681004,17.005 15.3879969,16.8475016 16.004,16.5325 C16.6200031,16.2174984 17.1169981,15.8010026 17.495,15.283 L19.616,16.774 C18.9579967,17.6000041 18.1530048,18.2404977 17.201,18.6955 C16.2489952,19.1505023 15.1360064,19.378 13.862,19.378 C12.6999942,19.378 11.6325049,19.1855019 10.6595,18.8005 C9.68649514,18.4154981 8.8500035,17.8765035 8.15,17.1835 C7.4499965,16.4904965 6.90400196,15.6645048 6.512,14.7055 C6.11999804,13.7464952 5.924,12.6860058 5.924,11.524 C5.924,10.333994 6.13049794,9.25950479 6.5435,8.3005 C6.95650207,7.34149521 7.5234964,6.52600336 8.2445,5.854 C8.96550361,5.18199664 9.8159951,4.66400182 10.796,4.3 C11.7760049,3.93599818 12.8399943,3.754 13.988,3.754 C14.4640024,3.754 14.9609974,3.79949954 15.479,3.8905 C15.9970026,3.98150045 16.4939976,4.12149906 16.97,4.3105 C17.4460024,4.49950095 17.8939979,4.7339986 18.314,5.014 C18.7340021,5.2940014 19.0909985,5.62999804 19.385,6.022 L17.369,7.618 Z" fill="#000000" />
											</g>
										</svg> </span>
									<span class="kt-grid-nav__title">Accounting</span>
									<span class="kt-grid-nav__desc">eCommerce</span>
								</a>
								<a href="#" class="kt-grid-nav__item">
									<span class="kt-grid-nav__icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M14.8571499,13 C14.9499122,12.7223297 15,12.4263059 15,12.1190476 L15,6.88095238 C15,5.28984632 13.6568542,4 12,4 L11.7272727,4 C10.2210416,4 9,5.17258756 9,6.61904762 L10.0909091,6.61904762 C10.0909091,5.75117158 10.823534,5.04761905 11.7272727,5.04761905 L12,5.04761905 C13.0543618,5.04761905 13.9090909,5.86843034 13.9090909,6.88095238 L13.9090909,12.1190476 C13.9090909,12.4383379 13.8240964,12.7385644 13.6746497,13 L10.3253503,13 C10.1759036,12.7385644 10.0909091,12.4383379 10.0909091,12.1190476 L10.0909091,9.5 C10.0909091,9.06606198 10.4572216,8.71428571 10.9090909,8.71428571 C11.3609602,8.71428571 11.7272727,9.06606198 11.7272727,9.5 L11.7272727,11.3333333 L12.8181818,11.3333333 L12.8181818,9.5 C12.8181818,8.48747796 11.9634527,7.66666667 10.9090909,7.66666667 C9.85472911,7.66666667 9,8.48747796 9,9.5 L9,12.1190476 C9,12.4263059 9.0500878,12.7223297 9.14285008,13 L6,13 C5.44771525,13 5,12.5522847 5,12 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,12 C19,12.5522847 18.5522847,13 18,13 L14.8571499,13 Z" fill="#000000" opacity="0.3" />
												<path d="M9,10.3333333 L9,12.1190476 C9,13.7101537 10.3431458,15 12,15 C13.6568542,15 15,13.7101537 15,12.1190476 L15,10.3333333 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9,10.3333333 Z M10.0909091,11.1212121 L12,12.5 L13.9090909,11.1212121 L13.9090909,12.1190476 C13.9090909,13.1315697 13.0543618,13.952381 12,13.952381 C10.9456382,13.952381 10.0909091,13.1315697 10.0909091,12.1190476 L10.0909091,11.1212121 Z" fill="#000000" />
											</g>
										</svg> </span>
									<span class="kt-grid-nav__title">Administration</span>
									<span class="kt-grid-nav__desc">Console</span>
								</a>
							</div>
							<div class="kt-grid-nav__row">
								<a href="#" class="kt-grid-nav__item">
									<span class="kt-grid-nav__icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24" />
												<path d="M4,9.67471899 L10.880262,13.6470401 C10.9543486,13.689814 11.0320333,13.7207107 11.1111111,13.740321 L11.1111111,21.4444444 L4.49070127,17.526473 C4.18655139,17.3464765 4,17.0193034 4,16.6658832 L4,9.67471899 Z M20,9.56911707 L20,16.6658832 C20,17.0193034 19.8134486,17.3464765 19.5092987,17.526473 L12.8888889,21.4444444 L12.8888889,13.6728275 C12.9050191,13.6647696 12.9210067,13.6561758 12.9368301,13.6470401 L20,9.56911707 Z" fill="#000000" />
												<path d="M4.21611835,7.74669402 C4.30015839,7.64056877 4.40623188,7.55087574 4.5299008,7.48500698 L11.5299008,3.75665466 C11.8237589,3.60013944 12.1762411,3.60013944 12.4700992,3.75665466 L19.4700992,7.48500698 C19.5654307,7.53578262 19.6503066,7.60071528 19.7226939,7.67641889 L12.0479413,12.1074394 C11.9974761,12.1365754 11.9509488,12.1699127 11.9085461,12.2067543 C11.8661433,12.1699127 11.819616,12.1365754 11.7691509,12.1074394 L4.21611835,7.74669402 Z" fill="#000000" opacity="0.3" />
											</g>
										</svg> </span>
									<span class="kt-grid-nav__title">Projects</span>
									<span class="kt-grid-nav__desc">Pending Tasks</span>
								</a>
								<a href="#" class="kt-grid-nav__item">
									<span class="kt-grid-nav__icon">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon kt-svg-icon--success kt-svg-icon--lg">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<polygon points="0 0 24 0 24 24 0 24" />
												<path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
												<path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
											</g>
										</svg> </span>
									<span class="kt-grid-nav__title">Customers</span>
									<span class="kt-grid-nav__desc">Latest cases</span>
								</a>
							</div>
						</div>

						<!--end: Grid Nav -->
					</form>
				</div>
			</div>

			<!--end: Quick actions -->

			<!--begin: Cart -->
			<div class="kt-header__topbar-item dropdown">
				<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
					<span class="kt-header__topbar-icon"><i class="flaticon2-shopping-cart-1"></i></span>
				</div>
				<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
					<form>

						<!-- begin:: Mycart -->
						<div class="kt-mycart">
							<div class="kt-mycart__head kt-head" style="background-image: url(assets/media/misc/bg-1.jpg);">
								<div class="kt-mycart__info">
									<span class="kt-mycart__icon"><i class="flaticon2-shopping-cart-1 kt-font-success"></i></span>
									<h3 class="kt-mycart__title">My Cart</h3>
								</div>
								<div class="kt-mycart__button">
									<button type="button" class="btn btn-success btn-sm" style=" ">2 Items</button>
								</div>
							</div>
							<div class="kt-mycart__body kt-scroll" data-scroll="true" data-height="245" data-mobile-height="200">
								<div class="kt-mycart__item">
									<div class="kt-mycart__container">
										<div class="kt-mycart__info">
											<a href="#" class="kt-mycart__title">
												Samsung
											</a>
											<span class="kt-mycart__desc">
												Profile info, Timeline etc
											</span>
											<div class="kt-mycart__action">
												<span class="kt-mycart__price">$ 450</span>
												<span class="kt-mycart__text">for</span>
												<span class="kt-mycart__quantity">7</span>
												<a href="#" class="btn btn-label-success btn-icon">&minus;</a>
												<a href="#" class="btn btn-label-success btn-icon">&plus;</a>
											</div>
										</div>
										<a href="#" class="kt-mycart__pic">
											<img src="{{ asset('/') }}admin_res/media/products/product9.jpg" title="">
										</a>
									</div>
								</div>
								<div class="kt-mycart__item">
									<div class="kt-mycart__container">
										<div class="kt-mycart__info">
											<a href="#" class="kt-mycart__title">
												Panasonic
											</a>
											<span class="kt-mycart__desc">
												For PHoto & Others
											</span>
											<div class="kt-mycart__action">
												<span class="kt-mycart__price">$ 329</span>
												<span class="kt-mycart__text">for</span>
												<span class="kt-mycart__quantity">1</span>
												<a href="#" class="btn btn-label-success btn-icon">&minus;</a>
												<a href="#" class="btn btn-label-success btn-icon">&plus;</a>
											</div>
										</div>
										<a href="#" class="kt-mycart__pic">
											<img src="{{ asset('/') }}admin_res/media/products/product13.jpg" title="">
										</a>
									</div>
								</div>
								<div class="kt-mycart__item">
									<div class="kt-mycart__container">
										<div class="kt-mycart__info">
											<a href="#" class="kt-mycart__title">
												Fujifilm
											</a>
											<span class="kt-mycart__desc">
												Profile info, Timeline etc
											</span>
											<div class="kt-mycart__action">
												<span class="kt-mycart__price">$ 520</span>
												<span class="kt-mycart__text">for</span>
												<span class="kt-mycart__quantity">6</span>
												<a href="#" class="btn btn-label-success btn-icon">&minus;</a>
												<a href="#" class="btn btn-label-success btn-icon">&plus;</a>
											</div>
										</div>
										<a href="#" class="kt-mycart__pic">
											<img src="{{ asset('/') }}admin_res/media/products/product16.jpg" title="">
										</a>
									</div>
								</div>
								<div class="kt-mycart__item">
									<div class="kt-mycart__container">
										<div class="kt-mycart__info">
											<a href="#" class="kt-mycart__title">
												Candy Machine
											</a>
											<span class="kt-mycart__desc">
												For PHoto & Others
											</span>
											<div class="kt-mycart__action">
												<span class="kt-mycart__price">$ 784</span>
												<span class="kt-mycart__text">for</span>
												<span class="kt-mycart__quantity">4</span>
												<a href="#" class="btn btn-label-success btn-icon">&minus;</a>
												<a href="#" class="btn btn-label-success btn-icon">&plus;</a>
											</div>
										</div>
										<a href="#" class="kt-mycart__pic">
											<img src="{{ asset('/') }}admin_res/media/products/product15.jpg" title="" alt="">
										</a>
									</div>
								</div>
							</div>
							<div class="kt-mycart__footer">
								<div class="kt-mycart__section">
									<div class="kt-mycart__subtitel">
										<span>Sub Total</span>
										<span>Taxes</span>
										<span>Total</span>
									</div>
									<div class="kt-mycart__prices">
										<span>$ 840.00</span>
										<span>$ 72.00</span>
										<span class="kt-font-brand">$ 912.00</span>
									</div>
								</div>
								<div class="kt-mycart__button kt-align-right">
									<button type="button" class="btn btn-primary btn-sm">Place Order</button>
								</div>
							</div>
						</div>

						<!-- end:: Mycart -->
					</form>
				</div>
			</div>

			<!--end: Cart-->

			<!--begin: Quick panel toggler -->
			<div class="kt-header__topbar-item" data-toggle="kt-tooltip" title="Quick panel" data-placement="top">
				<div class="kt-header__topbar-wrapper">
					<span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn"><i class="flaticon2-menu-2"></i></span>
				</div>
			</div>

			<!--end: Quick panel toggler -->

			<!--begin: Language bar -->
			<div class="kt-header__topbar-item kt-header__topbar-item--langs">
				<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
					<span class="kt-header__topbar-icon">
						<img class="" src="{{ asset('/') }}admin_res/media/flags/260-united-kingdom.svg" alt="" />
					</span>
				</div>
				<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim">
					<ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
						<li class="kt-nav__item kt-nav__item--active">
							<a href="#" class="kt-nav__link">
								<span class="kt-nav__link-icon"><img src="{{ asset('/') }}admin_res/media/flags/226-united-states.svg" alt="" /></span>
								<span class="kt-nav__link-text">English</span>
							</a>
						</li>
						<li class="kt-nav__item">
							<a href="#" class="kt-nav__link">
								<span class="kt-nav__link-icon"><img src="{{ asset('/') }}admin_res/media/flags/128-spain.svg" alt="" /></span>
								<span class="kt-nav__link-text">Spanish</span>
							</a>
						</li>
						<li class="kt-nav__item">
							<a href="#" class="kt-nav__link">
								<span class="kt-nav__link-icon"><img src="{{ asset('/') }}admin_res/media/flags/162-germany.svg" alt="" /></span>
								<span class="kt-nav__link-text">German</span>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<!--end: Language bar -->

			<!--begin: User bar -->
			<div class="kt-header__topbar-item kt-header__topbar-item--user">
				<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
					<span class="kt-header__topbar-welcome kt-visible-desktop">Hi,</span>
					<span class="kt-header__topbar-username kt-visible-desktop">Nick</span>
					<img alt="Pic" src="{{ asset('/') }}admin_res/media/users/300_21.jpg" />
					<span class="kt-header__topbar-icon kt-bg-brand kt-hidden"><b>S</b></span>
				</div>
				<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

					<!--begin: Head -->
					<div class="kt-user-card kt-user-card--skin-light kt-notification-item-padding-x">
						<div class="kt-user-card__avatar">
							<img class="kt-hidden-" alt="Pic" src="{{ asset('/') }}admin_res/media/users/300_25.jpg" />

							<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
							<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold kt-hidden">S</span>
						</div>
						<div class="kt-user-card__name">
							Sean Stone
						</div>
						<div class="kt-user-card__badge">
							<span class="btn btn-label-primary btn-sm btn-bold btn-font-md">23 messages</span>
						</div>
					</div>

					<!--end: Head -->

					<!--begin: Navigation -->
					<div class="kt-notification">
						<a href="custom/apps/user/profile-1/personal-information.html" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-calendar-3 kt-font-success"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title kt-font-bold">
									My Profile
								</div>
								<div class="kt-notification__item-time">
									Account settings and more
								</div>
							</div>
						</a>
						<a href="custom/apps/user/profile-3.html" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-mail kt-font-warning"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title kt-font-bold">
									My Messages
								</div>
								<div class="kt-notification__item-time">
									Inbox and tasks
								</div>
							</div>
						</a>
						<a href="custom/apps/user/profile-2.html" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-rocket-1 kt-font-danger"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title kt-font-bold">
									My Activities
								</div>
								<div class="kt-notification__item-time">
									Logs and notifications
								</div>
							</div>
						</a>
						<a href="custom/apps/user/profile-3.html" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-hourglass kt-font-brand"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title kt-font-bold">
									My Tasks
								</div>
								<div class="kt-notification__item-time">
									latest tasks and projects
								</div>
							</div>
						</a>
						<a href="custom/apps/user/profile-1/overview.html" class="kt-notification__item">
							<div class="kt-notification__item-icon">
								<i class="flaticon2-cardiogram kt-font-warning"></i>
							</div>
							<div class="kt-notification__item-details">
								<div class="kt-notification__item-title kt-font-bold">
									Billing
								</div>
								<div class="kt-notification__item-time">
									billing & statements <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill kt-badge--rounded">2 pending</span>
								</div>
							</div>
						</a>
						<div class="kt-notification__custom kt-space-between">
							<a href="custom/user/login-v2.html" target="_blank" class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>
							<a href="custom/user/login-v2.html" target="_blank" class="btn btn-clean btn-sm btn-bold">Upgrade Plan</a>
						</div>
					</div>

					<!--end: Navigation -->
				</div>
			</div>

			<!--end: User bar -->
		</div>

		<!-- end:: Header Topbar -->
	</div>
</div>