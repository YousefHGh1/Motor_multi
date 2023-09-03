@extends('homepage.layouts.master2')

@section('title')
    {{ __('words.commitment') }}
@endsection

@section('css')
    <link href="{{ asset('assets/homepage/css/stylecommit.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- ======= Commitments 6 ======= -->
    <div id="Commitments">

        <img src="{{ asset('assets/homepage/img/ddd.jpg') }}" alt="">
        <h1>{{ __('words.commitment') }}</h1>
        <h3>{{ __('words.home') }} / {{ __('words.commitment') }}</h3>
    </div>
    <!-- End #Commitments -->

    <!-- ======= main Section 4 ======= -->
    <main id="main">

        <!-- ======= About Section 4-1 ======= -->
        <section id="about" class="about">
            <div class="container-fluid" data-aos="fade-up">
                <div class="row">


                    @foreach ($commitment as $commit)
                        <div class="col-lg-5 align-self-center content_img">
                            <img id="content_img1" src="{{ asset('fileimage1/' . $commit->image1) }}" alt="commitment">
                        </div>
                        <div class="col-lg-7 pt-3 pt-lg-0 content">
                            <h6></h6>
                            <p id="me">{{ $commit->main_title }}</p>
                            <p>
                                {{ $commit->description }}
                            </p>

                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- End About Section -->

    </main>
    <!-- End #main -->
@endsection

@section('scripts')
@endsection
