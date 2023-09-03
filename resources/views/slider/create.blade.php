@extends('layout.master')

@section('title')
    Motor
@endsection

@section('page_title')
    {{ __('words.dashboard') }}
@endsection
@section('sub_main')
    {{ __('words.home') }}
@endsection
@section('sub_title')
    Motor
@endsection

@section('css')
    <link href="{{ asset('assets/css/pages/wizard/wizard-3.rtl.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
    <!--begin::Container-->
    <div class=" container ">
        <div class="card card-custom">
            <div class="card-body p-0">
                <!--begin: Wizard-->
                <div class="wizard wizard-3" id="kt_wizard_v3" data-wizard-state="between" data-wizard-clickable="true">
                    <!--begin: Wizard Nav-->
                    <div class="wizard-nav">
                        <div class="wizard-steps px-8 py-8 px-lg-15 py-lg-3">
                            <!--begin::Wizard Step ar && en Nav-->
                            @foreach (config('app.language') as $key => $lang)
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="done">
                                    <div class="wizard-label">
                                        <h3 class="wizard-title">
                                            {{ $lang }}
                                        </h3>
                                        <div class="wizard-bar"></div>
                                    </div>
                                </div>
                            @endforeach

                            <!--end::Wizard Step ar && en Nav-->

                            <!--begin::Wizard Step details Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-label">
                                    <h3 class="wizard-title">
                                        {{ __('words.details') }}
                                    </h3>
                                    <div class="wizard-bar"></div>
                                </div>
                            </div>
                            <!--end::Wizard Step details Nav-->
                        </div>
                    </div>
                    <!--end: Wizard Nav-->

                    <!--begin: Wizard Body-->
                    <div class="row justify-content-center py-10 px-8 py-lg-12 px-lg-10">
                        <div class="col-xl-12 col-xxl-7">
                            <!--begin: Wizard Form-->
                            <form action="{{ route('slider.store') }}" id="kt_form" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <!--begin: Wizard Step ar && en-->
                                @foreach (config('app.language') as $key => $lang)
                                    <div class="pb-5 @if ($loop->index == 0) show active in @endif"
                                        data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">
                                            {{ __('words.Data in') }}-{{ $lang }}
                                        </h4>
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container has-success">
                                            <label>{{ __('words.main_title') }}</label>
                                            <input type="text" class="form-control"
                                                name="{{ $key }}[main_title]" id="main_title"
                                                placeholder="{{ __('words.main_title') }}">
                                        </div>
                                        <!--end::Input-->

                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container has-success">
                                            <label>{{ __('words.description') }}</label>
                                            <input type="text" class="form-control"
                                                name="{{ $key }}[description]"
                                                placeholder="{{ __('words.description') }}">
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container has-success">
                                            <label>{{ __('words.maintenance_button') }}</label>
                                            <input type="text" class="form-control"
                                                name="{{ $key }}[maintenance_button]"
                                                placeholder="{{ __('words.maintenance_button') }}">
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container has-success">
                                            <label>{{ __('words.materials_button') }}</label>
                                            <input type="text" class="form-control"
                                                name="{{ $key }}[materials_button]"
                                                placeholder="{{ __('words.materials_button') }}">
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container has-success">
                                            <label>{{ __('words.question') }}</label>
                                            <input type="text" class="form-control" name="{{ $key }}[question]"
                                                placeholder="{{ __('words.question') }}">
                                        </div>
                                        <!--end::Input-->


                                    </div>
                                @endforeach
                                <!--end: Wizard Step ar && en-->

                                <!--begin: Wizard Step details-->
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h4 class="mb-10 font-weight-bold text-dark">{{ __('words.details') }}</h4>
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.whatsapp_link') }}</label>
                                        <input type="text" class="form-control" name="whatsapp_link" id="whatsapp_link"
                                            placeholder="{{ __('words.whatsapp_link') }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.tiktok_link') }}</label>
                                        <input type="text" class="form-control" name="tiktok_link"
                                            placeholder="{{ __('words.tiktok_link') }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.snapcaht_link') }}</label>
                                        <input type="text" class="form-control" name="snapcaht_link"
                                            placeholder="{{ __('words.snapcaht_link') }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.instagram_link') }}</label>
                                        <input type="text" class="form-control" name="instagram_link"
                                            placeholder="{{ __('words.instagram_link') }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.youtube_link') }}</label>
                                        <input type="text" class="form-control" name="youtube_link"
                                            placeholder="{{ __('words.youtube_link') }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.background') }}</label>
                                        <input type="file" class="form-control" name="background"
                                            placeholder="{{ __('words.background') }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.logo') }}</label>
                                        <input type="file" class="form-control" name="logo"
                                            placeholder="{{ __('words.logo') }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.maintenance_link') }}</label>
                                        <input type="text" class="form-control" name="maintenance_link"
                                            placeholder="{{ __('words.maintenance_link') }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.materials_link') }}</label>
                                        <input type="text" class="form-control" name="materials_link"
                                            placeholder="{{ __('words.materials_link') }}">
                                    </div>
                                    <!--end::Input-->



                                </div>
                                <!--end: Wizard Step details-->

                                <!--begin: Wizard Actions-->
                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div class="mr-2">
                                        <button type="button"
                                            class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4"
                                            data-wizard-type="action-prev">
                                            {{ __('words.Previous') }}
                                        </button>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class="btn btn-success font-weight-bolder text-uppercase px-9 py-4"
                                            data-wizard-type="action-submit">
                                            {{ __('words.Submit') }}
                                        </button>
                                        <button type="button"
                                            class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4"
                                            data-wizard-type="action-next">
                                            {{ __('words.Next') }}
                                        </button>
                                    </div>
                                </div>
                                <!--end: Wizard Actions-->

                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </form>
                            <!--end: Wizard Form-->
                        </div>
                    </div>
                    <!--end: Wizard Body-->
                </div>
                <!--end: Wizard-->
            </div>
        </div>
    </div>
    <!--end::Container-->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/pages/custom/wizard/wizard-3.js') }}"></script>
@endsection