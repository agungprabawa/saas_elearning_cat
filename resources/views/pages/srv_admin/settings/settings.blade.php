@extends('layouts.srv_admin.master')

@section('css')

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('/') }}admin_res/css/pages/wizard/wizard-2.css" rel="stylesheet" type="text/css"/>

    <!--end::Page Custom Styles -->
@endsection


@section('content')
    <!-- begin:: Subheader -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Kelola Informasi Layanan </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs kt-hidden">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Pages </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Wizard </a>
                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="" class="kt-subheader__breadcrumbs-link">
                        Wizard 2 </a>

                    <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                </div>
            </div>
            <div class="kt-subheader__toolbar kt-hidden">
                <div class="kt-subheader__wrapper">
                    <a href="#" class="btn kt-subheader__btn-primary">
                        Actions &nbsp;

                        <!--<i class="flaticon2-calendar-1"></i>-->
                    </a>
                    <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions"
                         data-placement="left">
                        <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 width="24px"
                                 height="24px" viewBox="0 0 24 24" version="1.1"
                                 class="kt-svg-icon kt-svg-icon--success kt-svg-icon--md">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                          fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                                          fill="#000000"/>
                                </g>
                            </svg>

                            <!--<i class="flaticon2-plus"></i>-->
                        </a>
                        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">

                            <!--begin::Nav-->
                            <ul class="kt-nav">
                                <li class="kt-nav__head">
                                    Add anything or jump to:
                                    <i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right"
                                       title="Click to learn more..."></i>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-drop"></i>
                                        <span class="kt-nav__link-text">Order</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-calendar-8"></i>
                                        <span class="kt-nav__link-text">Ticket</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-telegram-logo"></i>
                                        <span class="kt-nav__link-text">Goal</span>
                                    </a>
                                </li>
                                <li class="kt-nav__item">
                                    <a href="#" class="kt-nav__link">
                                        <i class="kt-nav__link-icon flaticon2-new-email"></i>
                                        <span class="kt-nav__link-text">Support Case</span>
                                        <span class="kt-nav__link-badge">
																		<span class="kt-badge kt-badge--success">5</span>
																	</span>
                                    </a>
                                </li>
                                <li class="kt-nav__separator"></li>
                                <li class="kt-nav__foot">
                                    <a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade plan</a>
                                    <a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip"
                                       data-placement="right" title="Click to learn more...">Learn more</a>
                                </li>
                            </ul>

                            <!--end::Nav-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        <div class="kt-portlet">
            <div class="kt-portlet__body kt-portlet__body--fit">
                <div class="kt-grid  kt-wizard-v2 kt-wizard-v2--white" id="kt_wizard_v2"
                     data-ktwizard-state="step-first">
                    <div class="kt-grid__item kt-wizard-v2__aside">

                        <!--begin: Form Wizard Nav -->
                        <div class="kt-wizard-v2__nav">

                            <!--doc: Remove "kt-wizard-v2__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
                            <div class="kt-wizard-v2__nav-items kt-wizard-v2__nav-items--clickable">
                                <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step"
                                     data-ktwizard-state="current">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-icon">
                                            <i class="flaticon-globe"></i>
                                        </div>
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                @lang('settings.tb-info-title')
                                            </div>
                                            <div class="kt-wizard-v2__nav-label-desc">
                                                @lang('settings.tb-info-title-sub')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-wizard-v2__nav-item" data-ktwizard-type="step">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-icon">
                                            <i class="flaticon-bus-stop"></i>
                                        </div>
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                @lang('settings.tb-contact-title')
                                            </div>
                                            <div class="kt-wizard-v2__nav-label-desc">
                                                @lang('settings.tb-contact-title-sub')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-wizard-v2__nav-item" href="#" data-ktwizard-type="step">
                                    <div class="kt-wizard-v2__nav-body">
                                        <div class="kt-wizard-v2__nav-icon">
                                            <i class="flaticon2-shield"></i>
                                        </div>
                                        <div class="kt-wizard-v2__nav-label">
                                            <div class="kt-wizard-v2__nav-label-title">
                                                @lang('settings.tb-privasi')
                                            </div>
                                            <div class="kt-wizard-v2__nav-label-desc">
                                               @lang('settings.tb-privasi-sub')
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!--end: Form Wizard Nav -->
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v2__wrapper">

                        <!--begin: Form Wizard Form-->
                        <form class="kt-form" id="kt_form" enctype="multipart/form-data">
                        @csrf
                        <!--begin: Form Wizard Step 1-->
                            <div class="kt-wizard-v2__content" data-ktwizard-type="step-content"
                                 data-ktwizard-state="current">
                                <div class="kt-heading kt-heading--md">@lang('settings.fm-info-title')</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="form-group">
                                            <label>@lang('settings.fm-info-name')</label>
                                            <input type="text" class="form-control" name="company_name"
                                                   placeholder="@lang('settings.fm-info-name')"
                                                   value="{{ $company->company_name }}">
                                            <div id="company_name" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            {{--                                 <span class="form-text text-muted">Please enter your first name.</span>--}}
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label>@lang('settings.fm-info-category')
                                                        <button type="button"
                                                                class="btn btn-light btn-secondary btn-circle btn-sm btn-icon"
                                                                data-toggle="kt-popover" data-trigger="focus"
                                                                title="@lang('general.ket')" data-html="true"
                                                                data-content="@lang('settings.po-1')">
                                                            <i class="fal fa-question-circle"></i>
                                                        </button>
                                                    </label>
                                                    <select class="form-control kt-select2" id="kt_select2_4"
                                                            name="company_type">
                                                        @foreach($company_type as $item)
                                                            <option
                                                                value="{{ $item->id_type }}"
                                                                {{ ($item->id_type == $company->company_type) ? 'selected':'' }}
                                                            >
                                                                {{ $item->label }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    {{--                                 <span class="form-text text-muted">Please enter your last name.</span>--}}
                                                    <div id="company_type" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label>@lang('settings.fm-info-descriptions')</label>
                                            <textarea style="height: 130px" name="descriptions" id="" cols="20" rows="10"
                                                      class="form-control">{{ $company->descriptions }}</textarea>
                                            <div class="invalid-feedback" style="display:block; font-size:14px"></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-8">
                                                <div class="form-group">
                                                    <label>@lang('settings.fm-logo')</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="logo" class="custom-file-input"
                                                               id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                    </div>
                                                    <div id="logo" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 1-->

                            <!--begin: Form Wizard Step 2-->
                            <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">@lang('settings.fm-title')</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>@lang('settings.fm-email')</label>
                                                    <input type="email" class="form-control" name="emails"
                                                           placeholder="@lang('settings.fm-email')"
                                                           value="{{ $company->emails }}">
                                                    <div id="emails" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                    {{--                                       <span class="form-text text-muted">Please enter your Address.</span>--}}
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>@lang('settings.fm-notelp')</label>
                                                    <input type="text" class="form-control" name="phones"
                                                           placeholder="@lang('settings.fm-notelp')"
                                                           value="{{ $company->phones }}">
                                                    <div id="phones" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                    {{--                                       <span class="form-text text-muted">Please enter your Address.</span>--}}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label>@lang('settings.fm-country'):</label>
                                                    <select style="width:100%" name="country"
                                                            class="form-control select2" id="sel-country">
                                                        <option value="">Select</option>
                                                        <option value="AF">Afghanistan</option>
                                                        <option value="AX">Åland Islands</option>
                                                        <option value="AL">Albania</option>
                                                        <option value="DZ">Algeria</option>
                                                        <option value="AS">American Samoa</option>
                                                        <option value="AD">Andorra</option>
                                                        <option value="AO">Angola</option>
                                                        <option value="AI">Anguilla</option>
                                                        <option value="AQ">Antarctica</option>
                                                        <option value="AG">Antigua and Barbuda</option>
                                                        <option value="AR">Argentina</option>
                                                        <option value="AM">Armenia</option>
                                                        <option value="AW">Aruba</option>
                                                        <option value="AU" selected>Australia</option>
                                                        <option value="AT">Austria</option>
                                                        <option value="AZ">Azerbaijan</option>
                                                        <option value="BS">Bahamas</option>
                                                        <option value="BH">Bahrain</option>
                                                        <option value="BD">Bangladesh</option>
                                                        <option value="BB">Barbados</option>
                                                        <option value="BY">Belarus</option>
                                                        <option value="BE">Belgium</option>
                                                        <option value="BZ">Belize</option>
                                                        <option value="BJ">Benin</option>
                                                        <option value="BM">Bermuda</option>
                                                        <option value="BT">Bhutan</option>
                                                        <option value="BO">Bolivia, Plurinational State of</option>
                                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                                        <option value="BA">Bosnia and Herzegovina</option>
                                                        <option value="BW">Botswana</option>
                                                        <option value="BV">Bouvet Island</option>
                                                        <option value="BR">Brazil</option>
                                                        <option value="IO">British Indian Ocean Territory</option>
                                                        <option value="BN">Brunei Darussalam</option>
                                                        <option value="BG">Bulgaria</option>
                                                        <option value="BF">Burkina Faso</option>
                                                        <option value="BI">Burundi</option>
                                                        <option value="KH">Cambodia</option>
                                                        <option value="CM">Cameroon</option>
                                                        <option value="CA">Canada</option>
                                                        <option value="CV">Cape Verde</option>
                                                        <option value="KY">Cayman Islands</option>
                                                        <option value="CF">Central African Republic</option>
                                                        <option value="TD">Chad</option>
                                                        <option value="CL">Chile</option>
                                                        <option value="CN">China</option>
                                                        <option value="CX">Christmas Island</option>
                                                        <option value="CC">Cocos (Keeling) Islands</option>
                                                        <option value="CO">Colombia</option>
                                                        <option value="KM">Comoros</option>
                                                        <option value="CG">Congo</option>
                                                        <option value="CD">Congo, the Democratic Republic of the
                                                        </option>
                                                        <option value="CK">Cook Islands</option>
                                                        <option value="CR">Costa Rica</option>
                                                        <option value="CI">Côte d'Ivoire</option>
                                                        <option value="HR">Croatia</option>
                                                        <option value="CU">Cuba</option>
                                                        <option value="CW">Curaçao</option>
                                                        <option value="CY">Cyprus</option>
                                                        <option value="CZ">Czech Republic</option>
                                                        <option value="DK">Denmark</option>
                                                        <option value="DJ">Djibouti</option>
                                                        <option value="DM">Dominica</option>
                                                        <option value="DO">Dominican Republic</option>
                                                        <option value="EC">Ecuador</option>
                                                        <option value="EG">Egypt</option>
                                                        <option value="SV">El Salvador</option>
                                                        <option value="GQ">Equatorial Guinea</option>
                                                        <option value="ER">Eritrea</option>
                                                        <option value="EE">Estonia</option>
                                                        <option value="ET">Ethiopia</option>
                                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                                        <option value="FO">Faroe Islands</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finland</option>
                                                        <option value="FR">France</option>
                                                        <option value="GF">French Guiana</option>
                                                        <option value="PF">French Polynesia</option>
                                                        <option value="TF">French Southern Territories</option>
                                                        <option value="GA">Gabon</option>
                                                        <option value="GM">Gambia</option>
                                                        <option value="GE">Georgia</option>
                                                        <option value="DE">Germany</option>
                                                        <option value="GH">Ghana</option>
                                                        <option value="GI">Gibraltar</option>
                                                        <option value="GR">Greece</option>
                                                        <option value="GL">Greenland</option>
                                                        <option value="GD">Grenada</option>
                                                        <option value="GP">Guadeloupe</option>
                                                        <option value="GU">Guam</option>
                                                        <option value="GT">Guatemala</option>
                                                        <option value="GG">Guernsey</option>
                                                        <option value="GN">Guinea</option>
                                                        <option value="GW">Guinea-Bissau</option>
                                                        <option value="GY">Guyana</option>
                                                        <option value="HT">Haiti</option>
                                                        <option value="HM">Heard Island and McDonald Islands</option>
                                                        <option value="VA">Holy See (Vatican City State)</option>
                                                        <option value="HN">Honduras</option>
                                                        <option value="HK">Hong Kong</option>
                                                        <option value="HU">Hungary</option>
                                                        <option value="IS">Iceland</option>
                                                        <option value="IN">India</option>
                                                        <option value="ID">Indonesia</option>
                                                        <option value="IR">Iran, Islamic Republic of</option>
                                                        <option value="IQ">Iraq</option>
                                                        <option value="IE">Ireland</option>
                                                        <option value="IM">Isle of Man</option>
                                                        <option value="IL">Israel</option>
                                                        <option value="IT">Italy</option>
                                                        <option value="JM">Jamaica</option>
                                                        <option value="JP">Japan</option>
                                                        <option value="JE">Jersey</option>
                                                        <option value="JO">Jordan</option>
                                                        <option value="KZ">Kazakhstan</option>
                                                        <option value="KE">Kenya</option>
                                                        <option value="KI">Kiribati</option>
                                                        <option value="KP">Korea, Democratic People's Republic of
                                                        </option>
                                                        <option value="KR">Korea, Republic of</option>
                                                        <option value="KW">Kuwait</option>
                                                        <option value="KG">Kyrgyzstan</option>
                                                        <option value="LA">Lao People's Democratic Republic</option>
                                                        <option value="LV">Latvia</option>
                                                        <option value="LB">Lebanon</option>
                                                        <option value="LS">Lesotho</option>
                                                        <option value="LR">Liberia</option>
                                                        <option value="LY">Libya</option>
                                                        <option value="LI">Liechtenstein</option>
                                                        <option value="LT">Lithuania</option>
                                                        <option value="LU">Luxembourg</option>
                                                        <option value="MO">Macao</option>
                                                        <option value="MK">Macedonia, the former Yugoslav Republic of
                                                        </option>
                                                        <option value="MG">Madagascar</option>
                                                        <option value="MW">Malawi</option>
                                                        <option value="MY">Malaysia</option>
                                                        <option value="MV">Maldives</option>
                                                        <option value="ML">Mali</option>
                                                        <option value="MT">Malta</option>
                                                        <option value="MH">Marshall Islands</option>
                                                        <option value="MQ">Martinique</option>
                                                        <option value="MR">Mauritania</option>
                                                        <option value="MU">Mauritius</option>
                                                        <option value="YT">Mayotte</option>
                                                        <option value="MX">Mexico</option>
                                                        <option value="FM">Micronesia, Federated States of</option>
                                                        <option value="MD">Moldova, Republic of</option>
                                                        <option value="MC">Monaco</option>
                                                        <option value="MN">Mongolia</option>
                                                        <option value="ME">Montenegro</option>
                                                        <option value="MS">Montserrat</option>
                                                        <option value="MA">Morocco</option>
                                                        <option value="MZ">Mozambique</option>
                                                        <option value="MM">Myanmar</option>
                                                        <option value="NA">Namibia</option>
                                                        <option value="NR">Nauru</option>
                                                        <option value="NP">Nepal</option>
                                                        <option value="NL">Netherlands</option>
                                                        <option value="NC">New Caledonia</option>
                                                        <option value="NZ">New Zealand</option>
                                                        <option value="NI">Nicaragua</option>
                                                        <option value="NE">Niger</option>
                                                        <option value="NG">Nigeria</option>
                                                        <option value="NU">Niue</option>
                                                        <option value="NF">Norfolk Island</option>
                                                        <option value="MP">Northern Mariana Islands</option>
                                                        <option value="NO">Norway</option>
                                                        <option value="OM">Oman</option>
                                                        <option value="PK">Pakistan</option>
                                                        <option value="PW">Palau</option>
                                                        <option value="PS">Palestinian Territory, Occupied</option>
                                                        <option value="PA">Panama</option>
                                                        <option value="PG">Papua New Guinea</option>
                                                        <option value="PY">Paraguay</option>
                                                        <option value="PE">Peru</option>
                                                        <option value="PH">Philippines</option>
                                                        <option value="PN">Pitcairn</option>
                                                        <option value="PL">Poland</option>
                                                        <option value="PT">Portugal</option>
                                                        <option value="PR">Puerto Rico</option>
                                                        <option value="QA">Qatar</option>
                                                        <option value="RE">Réunion</option>
                                                        <option value="RO">Romania</option>
                                                        <option value="RU">Russian Federation</option>
                                                        <option value="RW">Rwanda</option>
                                                        <option value="BL">Saint Barthélemy</option>
                                                        <option value="SH">Saint Helena, Ascension and Tristan da
                                                            Cunha
                                                        </option>
                                                        <option value="KN">Saint Kitts and Nevis</option>
                                                        <option value="LC">Saint Lucia</option>
                                                        <option value="MF">Saint Martin (French part)</option>
                                                        <option value="PM">Saint Pierre and Miquelon</option>
                                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                                        <option value="WS">Samoa</option>
                                                        <option value="SM">San Marino</option>
                                                        <option value="ST">Sao Tome and Principe</option>
                                                        <option value="SA">Saudi Arabia</option>
                                                        <option value="SN">Senegal</option>
                                                        <option value="RS">Serbia</option>
                                                        <option value="SC">Seychelles</option>
                                                        <option value="SL">Sierra Leone</option>
                                                        <option value="SG">Singapore</option>
                                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                                        <option value="SK">Slovakia</option>
                                                        <option value="SI">Slovenia</option>
                                                        <option value="SB">Solomon Islands</option>
                                                        <option value="SO">Somalia</option>
                                                        <option value="ZA">South Africa</option>
                                                        <option value="GS">South Georgia and the South Sandwich
                                                            Islands
                                                        </option>
                                                        <option value="SS">South Sudan</option>
                                                        <option value="ES">Spain</option>
                                                        <option value="LK">Sri Lanka</option>
                                                        <option value="SD">Sudan</option>
                                                        <option value="SR">Suriname</option>
                                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                                        <option value="SZ">Swaziland</option>
                                                        <option value="SE">Sweden</option>
                                                        <option value="CH">Switzerland</option>
                                                        <option value="SY">Syrian Arab Republic</option>
                                                        <option value="TW">Taiwan, Province of China</option>
                                                        <option value="TJ">Tajikistan</option>
                                                        <option value="TZ">Tanzania, United Republic of</option>
                                                        <option value="TH">Thailand</option>
                                                        <option value="TL">Timor-Leste</option>
                                                        <option value="TG">Togo</option>
                                                        <option value="TK">Tokelau</option>
                                                        <option value="TO">Tonga</option>
                                                        <option value="TT">Trinidad and Tobago</option>
                                                        <option value="TN">Tunisia</option>
                                                        <option value="TR">Turkey</option>
                                                        <option value="TM">Turkmenistan</option>
                                                        <option value="TC">Turks and Caicos Islands</option>
                                                        <option value="TV">Tuvalu</option>
                                                        <option value="UG">Uganda</option>
                                                        <option value="UA">Ukraine</option>
                                                        <option value="AE">United Arab Emirates</option>
                                                        <option value="GB">United Kingdom</option>
                                                        <option value="US">United States</option>
                                                        <option value="UM">United States Minor Outlying Islands</option>
                                                        <option value="UY">Uruguay</option>
                                                        <option value="UZ">Uzbekistan</option>
                                                        <option value="VU">Vanuatu</option>
                                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                                        <option value="VN">Viet Nam</option>
                                                        <option value="VG">Virgin Islands, British</option>
                                                        <option value="VI">Virgin Islands, U.S.</option>
                                                        <option value="WF">Wallis and Futuna</option>
                                                        <option value="EH">Western Sahara</option>
                                                        <option value="YE">Yemen</option>
                                                        <option value="ZM">Zambia</option>
                                                        <option value="ZW">Zimbabwe</option>
                                                    </select>
                                                    <div id="country" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>@lang('settings.fm-address')</label>
                                            <textarea type="text" class="form-control" name="address"
                                                      placeholder="@lang('settings.fm-address')">{{ $company->address }}</textarea>
                                            <div class="invalid-feedback" style="display:block; font-size:14px"></div>
                                            <span id="address" class="form-text text-muted">@lang('settings.fm-address-sub')</span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 2-->

                            <!--begin: Form Wizard Step 3-->
                            <div class="kt-wizard-v2__content" data-ktwizard-type="step-content">
                                <div class="kt-heading kt-heading--md">@lang('settings.tb-privasi-sub')</div>
                                <div class="kt-form__section kt-form__section--first">
                                    <div class="kt-wizard-v2__form">
                                        <div class="form-group">
                                            <?php
                                                $is_allowed = 'checked';
                                                if($company->allow_external_register == 0){
                                                    $is_allowed = '';
                                                }
                                            ?>

                                            <label style="display: block">@lang('settings.fm-allow-external-reg')</label>
                                            <input name="allow_external_register" data-switch="true" {{ $is_allowed }} type="checkbox" data-on-text="Ya" data-handle-width="70" data-off-text="Tidak" data-on-color="success" value="1" class="form-control">
                                            <div id="allow_external_register" class="invalid-feedback" style="display:block; font-size:14px"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end: Form Wizard Step 3-->


                            <!--begin: Form Actions -->
                            <div class="kt-form__actions float-right">
                                <button type="submit" id="btn_save"
                                        class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u "
                                >
                                    @lang('general.btn-save')
                                </button>
                            </div>

                            <!--end: Form Actions -->
                        </form>

                        <!--end: Form Wizard Form-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Content -->
@endsection


@section('script-bottom')
    <script type="text/javascript"
            src="{{ URL::asset('admin_res/js/pages/crud/forms/widgets/bootstrap-touchspin.js') }}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{ asset('/') }}admin_res/js/pages/crud/forms/widgets/bootstrap-switch.js" type="text/javascript"></script>
    <script>
        $(document).ready(function () {
            $('.custom-file-input').on('change', function (e) {
                var fileName = e.target.files[0].name;
                $(this).next('.custom-file-label').addClass("selected").html(fileName);
            });
        });

        // $('#btn_save').click(function () {
        //     console.log(new FormData($('#kt_form')));
        // });
        var btn_save = $('#btn_save');
        $('#kt_form').on('submit', function (e) {
            e.preventDefault();
            KTApp.progress(btn_save);
            // console.log(new FormData(this));
            var dataForm = new FormData(this);
            $('.invalid-feedback').html('').text();
            $.ajax({
                url: "{{ route('srv_admin.settings.update') }}",
                method: 'POST',
                data: dataForm,
                contentType: false,
                cache: false,
                processData: false,
                success: function (responses) {
                    console.log(responses);
                    if($.isEmptyObject(responses.error)){
                        swal.fire({
                            "title": "@lang('general.msg-success-title')",
                            "html": "@lang('general.msg-success-content')",
                            "type": "success",
                            "confirmButtonClass": "btn btn-primary",
                            cancelButtonClass: "btn btn-secondary",
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonText: "OK",
                            cancelButtonText: "@lang('general.msg-success-ok-btn')",
                        }).then((result) => {
                            if (result.value) {
                                // var next_loc = "{{ route('srv_admin.assistedtest.overview',':uuid') }}"
                                // next_loc = next_loc.replace(":uuid", response.uuid);
                                // window.location.replace(next_loc);
                                location.reload(true);
                            }
                        });
                        KTApp.unprogress(btn_save);
                    }else{
                        KTApp.unprogress(btn_save);

                        var error_data = {};

                        for (let [key, value] of Object.entries(responses.error)) {
                            // error_data[key] = value;

                            // $('<div class="invalid-feedback" style="display:block; font-size:14px">'+value.toString().replace(key,'Informasi ')+'</div>').insertAfter($('input[name="'+ key +'"]'));
                            var key_replace = key;
                            key_replace = key_replace.replace('_',' ');

                            // $('input[name="' + key + '"]').siblings('.invalid-feedback').text(value.toString().replace(key_replace, 'Informasi '));

                            $('#'+key).text(value.toString().replace(key_replace, 'Informasi '));
                        }
                        swal.fire({
                            "title": "@lang('assisted_test.msg-error-title')",
                            "html": "@lang('assisted_test.msg-error-content')",
                            "type": "warning",
                            "confirmButtonClass": "btn btn-secondary"
                        });
                    }

                },
                error: function(xhr, status, error) {
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
        });
    </script>
    @if(session('status') == 1)
        <script>
            Swal.fire({
                title: 'Info',
                text: 'Berhasil',
                icon: 'success'
            });
        </script>
    @endif
    <script>
        var company_type = $('#kt_select2_4').select2({
            // placeholder: "Select a state",
            allowClear: true
        });

        // set value first load
        company_type.val("{{ $company->company_type }}").trigger('change');

        var sel_country = $('#sel-country').select2();
        @if($company->country != '')
         sel_country.val("{{ $company->country }}").trigger('change');
        @endif


    </script>
    <!--begin::Page Scripts(used by this page) -->
    <script src="{{ asset('/') }}admin_res/js/pages/custom/wizard/wizard-2.js" type="text/javascript"></script>
    <script>
        "use strict";

        // Class definition
        var KTWizard2 = function () {
            // Base elements
            var wizardEl;
            var wizard;

            // Private functions
            var initWizard = function () {
                // Initialize form wizard
                wizard = new KTWizard('kt_wizard_v2', {
                    startStep: 1, // initial active step number
                    clickableSteps: true  // allow step clicking
                });

                // Validation before going to next page
                // wizard.on('beforeNext', function(wizardObj) {
                //     if (validator.form() !== true) {
                //         wizardObj.stop();  // don't go to the next step
                //     }
                // });
                //
                // wizard.on('beforePrev', function(wizardObj) {
                //     if (validator.form() !== true) {
                //         wizardObj.stop();  // don't go to the next step
                //     }
                // });

                // Change event
                wizard.on('change', function (wizard) {
                    KTUtil.scrollTop();
                });
            };

            return {
                // public functions
                init: function () {
                    wizardEl = KTUtil.get('kt_wizard_v2');
                    initWizard();

                }
            };
        }();

        jQuery(document).ready(function () {
            KTWizard2.init();
        });
    </script>
    <!--end::Page Scripts -->
@endsection
