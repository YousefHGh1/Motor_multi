@extends('layout.master')

@section('title')
    {{ __('words.Motor') }}
@endsection

@section('page_title')
    {{ __('words.dashboard') }}
@endsection
@section('sub_main')
    {{ __('words.home') }}
@endsection
@section('sub_title')
    {{ __('words.contactus') }}
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
                            <form action="{{ route('contactus.store') }}" id="kt_form" method="post"
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
                                            <label>{{ __('words.address1') }}</label>
                                            <input type="text" class="form-control" name="{{ $key }}[address1]"
                                                id="address1" placeholder="{{ __('words.address1') }}">
                                        </div>
                                        <!--end::Input-->

                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container has-success">
                                            <label>{{ __('words.address2') }}</label>
                                            <input type="text" class="form-control" name="{{ $key }}[address2]"
                                                placeholder="{{ __('words.address2') }}">
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
                                        <label>{{ __('words.phone1') }}</label>
                                        <input type="number" class="form-control" name="phone1"
                                            placeholder="{{ __('words.phone1') }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.phone2') }}</label>
                                        <input type="number" class="form-control" name="phone2"
                                            placeholder="{{ __('words.phone2') }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.email1') }}</label>
                                        <input type="email" class="form-control" name="email1"
                                            placeholder="{{ __('words.email1') }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.email2') }}</label>
                                        <input type="email" class="form-control" name="email2"
                                            placeholder="{{ __('words.email2') }}">
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
