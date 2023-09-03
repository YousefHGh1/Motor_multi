<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <!--begin::Header Menu Wrapper-->
        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
            <!--begin::Header Menu-->
            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                <!--begin::Header Nav-->
                <a href="{{ route('homepage.index') }}" class="brand-logo">
                    <h4 style="margin-top: 20%">موقع العرض</h4>
                </a>

                <!--end::Header Nav-->
            </div>
            <!--end::Header Menu-->
        </div>
        <!--end::Header Menu Wrapper-->
        <!--begin::Topbar-->
        <div class="topbar">
            <!--begin::Languages-->
            {{-- <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                    <div class="mr-1 btn btn-icon btn-clean btn-dropdown btn-lg">
                        @php
                            $flagIcon = config('app.locale') === 'ar' ? '008-saudi-arabia.svg' : '226-united-states.svg';
                        @endphp
                        <img class="rounded-sm h-20px w-20px"
                            src="{{ asset('assets/media/svg/flags/' . ($flagIcon ? '008-saudi-arabia.svg' : '226-united-states.svg')) }}"
                            alt="" />
                    </div>
                </div>
                <!--end::Toggle-->
                <!--begin::Dropdown-->
                <div class="p-0 m-0 dropdown-menu dropdown-menu-anim-up dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Nav-->
                    <ul class="py-4 navi navi-hover">
                        <!--begin::Item-->
                        @foreach (config('app.language') as $key => $lang)
                            <li class="navi-item ">
                                <a href="#{{ $key }}"
                                    class="navi-link @if ($loop->index == 0) active @endif">
                                    <span class="mr-3 symbol symbol-20">
                                        <img src="{{ asset('assets/media/svg/flags/' . ($key === 'ar' ? '008-saudi-arabia.svg' : '226-united-states.svg')) }}"
                                            alt="{{ $lang }}" />
                                    </span>
                                    <span class="navi-text">{{ $lang }}</span>
                                </a>
                            </li>
                        @endforeach
                        <!--end::Item-->
                    </ul>
                    <!--end::Nav-->
                </div>
                <!--end::Dropdown-->
            </div> --}}
            <!--end::Languages-->
            <!--begin::User-->
            <div class="topbar-item">
                <div class="w-auto px-2 btn btn-icon btn-icon-mobile btn-clean d-flex align-items-center btn-lg"
                    id="kt_quick_user_toggle">
                    <span class="mr-1 text-muted font-weight-bold font-size-base d-none d-md-inline">Hi,</span>
                    <span
                        class="mr-3 text-dark-50 font-weight-bolder font-size-base d-none d-md-inline">{{ Auth::user()->name }}</span>
                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                        <span class="symbol-label font-size-h5 font-weight-bold">{{ Auth::user()->id }}</span>
                    </span>
                </div>
            </div>
            <!--end::User-->
        </div>
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
