@extends('homepage.layouts.master2')

@section('title')
    {{ __('words.goal') }}
@endsection

@section('css')
    <link href="{{ asset('assets/homepage/css/stylecommit.css') }}" rel="stylesheet">
@endsection

@section('content')
    <!-- ======= Commitments 6 ======= -->
    <div id="Commitments">
        <img src="{{ asset('assets/homepage/img/ddd.jpg') }}" alt="">
        <h1> {{ __('words.goal') }}</h1>
        <h3>{{ __('words.home') }} / {{ __('words.goal') }}</h3>
    </div>
    <!-- End #Commitments -->

    <!-- ======= main Section 4 ======= -->
    <main id="main">

        <!-- ======= About Section 4-1 ======= -->
        <section id="about" class="about">
            <div class="container-fluid" data-aos="fade-up">
                <div class="row">
                    @foreach ($goals as $goal)
                        <div class="col-lg-5 align-self-center content_img">
                            <img id="content_img1" src="{{ asset('fileimage1/' . $goal->image1) }}" alt="goal">
                        </div>
                        <div class="col-lg-7 pt-3 pt-lg-0 content">
                            <h6></h6>
                            <p id="me">{{ $goal->main_title }}</p>
                            <p>
                                {{ $goal->description }}
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
