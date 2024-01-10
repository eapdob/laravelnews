@extends('frontend.layouts.app')

@section('content')
    @include('frontend.home-components.breaking-news')
    @include('frontend.home-components.hero-slider')
    @if ($ad->home_top_bar_ad_status == 1)
        <div class="large_add_banner">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="large_add_banner_img">
                            <img src="{{ $ad->home_top_bar_ad }}" alt="adds">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @include('frontend.home-components.main-news')
@endsection
