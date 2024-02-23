@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Ads') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Update ads') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.ad.update', 1) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h5 class="text-primary">{{ __('admin.Home page ads') }}</h5>
                    <div class="form-group">
                        <label for="">{{ __('admin.Top bar ad') }}</label>
                        <input name="home_top_bar_ad" type="file" class="form-control">
                        @error('home_top_bar_ad')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="home_top_bar_ad_url" class="mt-3">{{ __('admin.Top bar ad url') }}</label>
                        <input name="home_top_bar_ad_url" value="{{ $ad->home_top_bar_ad_url }}" type="text"
                               class="form-control" id="home_top_bar_ad_url">
                        @error('home_top_bar_ad_url')
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
                        <label for="">{{ __('admin.Middle ad') }}</label>
                        <input name="home_middle_ad" type="file" class="form-control">
                        @error('home_middle_ad')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="home_middle_ad_url" class="mt-3">{{ __('admin.Middle ad url') }}</label>
                        <input name="home_middle_ad_url" value="{{ $ad->home_middle_ad_url }}" type="text"
                               class="form-control" id="home_middle_ad_url">
                        @error('home_middle_ad_url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="home_middle_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <h5 class="text-primary">{{ __('admin.News view page ads') }}</h5>
                    <div class="form-group">
                        <label for="">{{ __('admin.Bottom ad') }}</label>
                        <input name="view_page_ad" type="file" class="form-control">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="view_page_ad_url" class="mt-3">{{ __('admin.Bottom ad url') }}</label>
                        <input name="view_page_ad_url" value="{{ $ad->view_page_ad_url }}" type="text"
                               class="form-control" id="view_page_ad_url">
                        @error('view_page_ad_url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="view_page_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <h5 class="text-primary">{{ __('admin.News page ads') }}</h5>
                    <div class="form-group">
                        <label for="">{{ __('admin.Bottom ad') }}</label>
                        <input name="news_page_ad" type="file" class="form-control">
                        @error('news_page_ad')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="news_page_ad_url" class="mt-3">{{ __('admin.Bottom ad url') }}</label>
                        <input name="news_page_ad_url" value="{{ $ad->news_page_ad_url }}" type="text"
                               class="form-control" id="news_page_ad_url">
                        @error('news_page_ad_url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="news_page_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <h5 class="text-primary">{{ __('admin.Sidebar ad') }}</h5>
                    <div class="form-group">
                        <label for="">{{ __('admin.Sidebar ad') }}</label>
                        <input name="side_bar_ad" type="file" class="form-control">
                        @error('side_bar_ad')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label for="side_bar_ad_url" class="mt-3">{{ __('admin.Sidebar ad url') }}</label>
                        <input name="side_bar_ad_url" value="{{ $ad->side_bar_ad_url }}" type="text"
                               class="form-control" id="side_bar_ad_url">
                        @error('side_bar_ad_url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="side_bar_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.Update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
