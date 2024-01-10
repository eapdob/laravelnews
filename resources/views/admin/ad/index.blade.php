@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.ads') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.update_ads') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.ad.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h5 class="text-primary">{{ __('admin.home_page_ads') }}</h5>
                    <div class="form-group">
                        <label for="">{{ __('admin.top_bar_ad') }}</label>
                        <input name="home_top_bar_ad" type="file" class="form-control">
                        @error('home_top_bar_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="home_top_bar_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.middle_ad') }}</label>
                        <input name="home_middle_ad" type="file" class="form-control">
                        @error('home_middle_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="home_middle_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <h5 class="text-primary">{{ __('admin.news_view_page_ads') }}</h5>
                    <div class="form-group">
                        <label for="">{{ __('admin.bottom_ad') }}</label>
                        <input name="view_page_ad" type="file" class="form-control">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="view_page_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <h5 class="text-primary">{{ __('admin.news_page_ads') }}</h5>
                    <div class="form-group">
                        <label for="">{{ __('admin.bottom_ad') }}</label>
                        <input name="news_page_ad" type="file" class="form-control">
                        @error('news_page_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="news_page_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <h5 class="text-primary">{{ __('admin.sidebar_ad') }}</h5>
                    <div class="form-group">
                        <label for="">{{ __('admin.sidebar_ad') }}</label>
                        <input name="side_bar_ad" type="file" class="form-control">
                        @error('side_bar_ad')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="side_bar_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
