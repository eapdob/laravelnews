@extends('frontend.layouts.app')

@section('content')
    @include('frontend.home-components.breaking-news')
    @include('frontend.home-components.hero-slider')
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
    @include('frontend.home-components.main-news')
@endsection
