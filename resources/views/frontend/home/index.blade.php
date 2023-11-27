@extends('frontend.layouts.app')

@section('content')
    <!-- Tranding news section-->
    @include('frontend.home-components.breaking-news')
    <!-- End Tranding news section -->

    <!-- Hero news section -->
    @include('frontend.home-components.hero-slider')
    <!-- End Hero news section -->

    <div class="large_add_banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="large_add_banner_img">
                        <img src="images/placeholder_large.jpg" alt="adds">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main news category -->
    @include('frontend.home-components.main-news')
    <!-- End Main news category -->
@endsection
