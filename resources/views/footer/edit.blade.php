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
    {{ __('words.footer') }}
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

                            <form action="{{ route('footer.update', $footer->id) }}" id="kt_form" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!--begin: Wizard Step ar && en-->
                                @foreach (config('app.language') as $key => $lang)
                                    <div class="pb-5 @if ($loop->index == 0) show active in @endif"
                                        data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">
                                            {{ __('words.Data in') }}-{{ $lang }}
                                        </h4>

                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container has-success">
                                            <label>{{ __('words.description') }}</label>
                                            <input type="text" class="form-control"
                                                name="{{ $key }}[description]"
                                                value="{{ $footer->translate($key)->description }}"
                                                placeholder="{{ __('words.description') }}">
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container has-success">
                                            <label>{{ __('words.link_down') }}</label>
                                            <input type="text" class="form-control"
                                                name="{{ $key }}[link_down]" id="link_down"
                                                value="{{ $footer->translate($key)->link_down }}"
                                                placeholder="{{ __('words.link_down') }}">
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container has-success">
                                            <label>{{ __('words.link_contact') }}</label>
                                            <input type="text" class="form-control"
                                                name="{{ $key }}[link_contact]"
                                                value="{{ $footer->translate($key)->link_contact }}"
                                                placeholder="{{ __('words.link_contact') }}">
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container has-success">
                                            <label>{{ __('words.address') }}</label>
                                            <input type="text" class="form-control" name="{{ $key }}[address]"
                                                value="{{ $footer->translate($key)->address }}" id="address"
                                                placeholder="{{ __('words.address') }}">
                                        </div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container has-success">
                                            <label>{{ __('words.allsave') }}</label>
                                            <input type="text" class="form-control" name="{{ $key }}[allsave]"
                                                value="{{ $footer->translate($key)->allsave }}" id="allsave"
                                                placeholder="{{ __('words.allsave') }}">
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
                                        <label>{{ __('words.image1') }}</label>
                                        <input type="file" class="form-control" name="image1">
                                        @if ($footer->image1)
                                            <img src="{{ asset('fileimage1/' . $footer->image1) }}" alt="image1 Image"
                                                class="mt-3" style="max-width: 100px;">
                                        @endif
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.logo') }}</label>
                                        <input type="file" class="form-control" name="logo">
                                        @if ($footer->logo)
                                            <img src="{{ asset('filelogo/' . $footer->logo) }}" alt="logo Image"
                                                class="mt-3" style="max-width: 100px;">
                                        @endif
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.link1') }}</label>
                                        <input type="text" class="form-control" name="link1"
                                            value="{{ $footer->link1 }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.link2') }}</label>
                                        <input type="text" class="form-control" name="link2"
                                            value="{{ $footer->link2 }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.link3') }}</label>
                                        <input type="text" class="form-control" name="link3"
                                            value="{{ $footer->link3 }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.link4') }}</label>
                                        <input type="text" class="form-control" name="link4"
                                            value="{{ $footer->link4 }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.link5') }}</label>
                                        <input type="text" class="form-control" name="link5"
                                            value="{{ $footer->link5 }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.link6') }}</label>
                                        <input type="text" class="form-control" name="link6"
                                            value="{{ $footer->link6 }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.link7') }}</label>
                                        <input type="text" class="form-control" name="link7"
                                            value="{{ $footer->link7 }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.link8') }}</label>
                                        <input type="text" class="form-control" name="link8"
                                            value="{{ $footer->link8 }}">
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container has-success">
                                        <label>{{ __('words.link9') }}</label>
                                        <input type="text" class="form-control" name="link9"
                                            value="{{ $footer->link9 }}">
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
                                        <button type="submit"
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
