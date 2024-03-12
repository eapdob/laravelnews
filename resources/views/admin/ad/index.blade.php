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
                        <div id="image-preview-top-bar-ad">
                            <label for="image-upload-top-bar-ad" id="image-label-top-bar-ad">{{ __('admin.Choose file') }}</label>
                            <input type="file" name="home_top_bar_ad" id="image-upload-top-bar-ad">
                            <input type="hidden" name="old_home_top_bar_ad" value="{{ old('home_top_bar_ad') ? old('home_top_bar_ad') : asset($ad->home_top_bar_ad ?? '') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="home_top_bar_ad_url" class="mt-3">{{ __('admin.Top bar ad url') }}</label>
                        <input name="home_top_bar_ad_url" value="{{ old('home_top_bar_ad_url') ? old('home_top_bar_ad_url') : ($ad->home_top_bar_ad_url ?? '') }}" type="text"
                               class="form-control" id="home_top_bar_ad_url">
                        @error('home_top_bar_ad_url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="home_top_bar_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status" {{ old('home_top_bar_ad_status') === 1 ? 'selected' : ((isset($ad->home_top_bar_ad_status) && $ad->home_top_bar_ad_status == 1) ? 'checked' : '') }}>
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Middle ad') }}</label>
                        <div id="image-preview-middle-ad">
                            <label for="image-upload-middle-ad" id="image-label-middle-ad">{{ __('admin.Choose file') }}</label>
                            <input type="file" name="home_middle_ad" id="image-upload-middle-ad">
                            <input type="hidden" name="old_home_middle_ad" value="{{ old('home_middle_ad') ? old('home_middle_ad') : asset($ad->home_middle_ad ?? '') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="home_middle_ad_url" class="mt-3">{{ __('admin.Middle ad url') }}</label>
                        <input name="home_middle_ad_url" value="{{ old('home_middle_ad_url') ? old('home_middle_ad_url') : ($ad->home_middle_ad_url ?? '') }}" type="text"
                               class="form-control" id="home_middle_ad_url">
                        @error('home_middle_ad_url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="home_middle_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status" {{ old('home_middle_ad_status') === 1 ? 'selected' : ((isset($ad->home_middle_ad_status) && $ad->home_middle_ad_status == 1) ? 'checked' : '') }}>
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <h5 class="text-primary">{{ __('admin.News view page ads') }}</h5>
                    <div class="form-group">
                        <label>{{ __('admin.Bottom ad') }}</label>
                        <div id="image-preview-view-page-ad">
                            <label for="image-upload-view-page-ad" id="image-label-view-page-ad">{{ __('admin.Choose file') }}</label>
                            <input type="file" name="view_page_ad" id="image-upload-view-page-ad">
                            <input type="hidden" name="old_view_page_ad" value="{{ old('view_page_ad') ? old('view_page_ad') : asset($ad->view_page_ad ?? '') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="view_page_ad_url" class="mt-3">{{ __('admin.Bottom ad url') }}</label>
                        <input name="view_page_ad_url" value="{{ old('view_page_ad_url') ? old('view_page_ad_url') : ($ad->view_page_ad_url ?? '') }}" type="text"
                               class="form-control" id="view_page_ad_url">
                        @error('view_page_ad_url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="home_view_page_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status" {{ old('view_page_ad_status') === 1 ? 'selected' : ((isset($ad->view_page_ad_status) && $ad->view_page_ad_status == 1) ? 'checked' : '') }}>
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <h5 class="text-primary">{{ __('admin.News page ads') }}</h5>
                    <div class="form-group">
                        <label>{{ __('admin.Bottom ad') }}</label>
                        <div id="image-preview-news-page-ad">
                            <label for="image-upload-news-page-ad" id="image-label-news-page-ad">{{ __('admin.Choose file') }}</label>
                            <input type="file" name="news_page_ad" id="image-upload-news-page-ad">
                            <input type="hidden" name="old_news_page_ad" value="{{ old('news_page_ad') ? old('news_page_ad') : asset($ad->news_page_ad ?? '') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="news_page_ad_url" class="mt-3">{{ __('admin.Bottom ad url') }}</label>
                        <input name="news_page_ad_url" value="{{ old('news_page_ad_url') ? old('news_page_ad_url') : ($ad->news_page_ad_url ?? '') }}" type="text"
                               class="form-control" id="news_page_ad_url">
                        @error('news_page_ad_url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="news_page_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status" {{ old('news_page_ad_status') === 1 ? 'selected' : ((isset($ad->news_page_ad_status) && $ad->news_page_ad_status == 1) ? 'checked' : '') }}>
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <h5 class="text-primary">{{ __('admin.Sidebar ad') }}</h5>
                    <div class="form-group">
                        <label>{{ __('admin.Sidebar ad') }}</label>
                        <div id="image-preview-side-bar-ad">
                            <label for="image-upload-side-bar-ad" id="image-label-side-bar-ad">{{ __('admin.Choose file') }}</label>
                            <input type="file" name="side_bar_ad" id="image-upload-side-bar-ad">
                            <input type="hidden" name="old_side_bar_ad" value="{{ old('side_bar_ad') ? old('side_bar_ad') : asset($ad->side_bar_ad ?? '') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="side_bar_ad_url" class="mt-3">{{ __('admin.Sidebar ad url') }}</label>
                        <input name="side_bar_ad_url" value="{{ old('side_bar_ad_url') ? old('side_bar_ad_url') : ($ad->side_bar_ad_url ?? '') }}" type="text"
                               class="form-control" id="side_bar_ad_url">
                        @error('side_bar_ad_url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <label class="custom-switch mt-2">
                            <input
                                name="side_bar_ad_status"
                                value="1" type="checkbox" class="custom-switch-input toggle-status" {{ old('side_bar_ad_status') === 1 ? 'selected' : ((isset($ad->side_bar_ad_status) && $ad->side_bar_ad_status == 1) ? 'checked' : '') }}>
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.Update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        Toast.fire({
            icon: 'error',
            title: "{{ $error }}"
        });
        @endforeach
        @endif
    </script>
    <script src="{{ asset('admin/modules/upload-preview/assets/js/jquery.uploadPreview.js') }}"></script>
    <script>
        $.uploadPreview({
            input_field: "#image-upload-top-bar-ad",
            preview_box: "#image-preview-top-bar-ad",
            label_field: "#image-label-top-bar-ad",
            label_default: "{{ __('admin.Choose file') }}",
            label_selected: "{{ __('admin.Choose file') }}",
            no_label: false,
            success_callback: null
        });
        $(document).ready(function () {
            $('#image-preview-top-bar-ad').css({
                "background-image": "url({{ asset($ad->home_top_bar_ad ?? '') }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
        $.uploadPreview({
            input_field: "#image-upload-middle-ad",
            preview_box: "#image-preview-middle-ad",
            label_field: "#image-label-middle-ad",
            label_default: "{{ __('admin.Choose file') }}",
            label_selected: "{{ __('admin.Choose file') }}",
            no_label: false,
            success_callback: null
        });
        $(document).ready(function () {
            $('#image-preview-middle-ad').css({
                "background-image": "url({{ asset($ad->home_middle_ad ?? '') }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
        $.uploadPreview({
            input_field: "#image-upload-news-page-ad",
            preview_box: "#image-preview-news-page-ad",
            label_field: "#image-label-news-page-ad",
            label_default: "{{ __('admin.Choose file') }}",
            label_selected: "{{ __('admin.Choose file') }}",
            no_label: false,
            success_callback: null
        });
        $(document).ready(function () {
            $('#image-preview-news-page-ad').css({
                "background-image": "url({{ asset($ad->news_page_ad ?? '') }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
        $.uploadPreview({
            input_field: "#image-upload-view-page-ad",
            preview_box: "#image-preview-view-page-ad",
            label_field: "#image-label-view-page-ad",
            label_default: "{{ __('admin.Choose file') }}",
            label_selected: "{{ __('admin.Choose file') }}",
            no_label: false,
            success_callback: null
        });
        $(document).ready(function () {
            $('#image-preview-view-page-ad').css({
                "background-image": "url({{ asset($ad->view_page_ad ?? '') }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
        $.uploadPreview({
            input_field: "#image-upload-side-bar-ad",
            preview_box: "#image-preview-side-bar-ad",
            label_field: "#image-label-side-bar-ad",
            label_default: "{{ __('admin.Choose file') }}",
            label_selected: "{{ __('admin.Choose file') }}",
            no_label: false,
            success_callback: null
        });
        $(document).ready(function () {
            $('#image-preview-side-bar-ad').css({
                "background-image": "url({{ asset($ad->side_bar_ad ?? '') }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
    </script>
@endpush
