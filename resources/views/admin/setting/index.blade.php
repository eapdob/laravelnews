@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Settings') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Setting') }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-2">
                        <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab4" data-toggle="tab" href="#home4" role="tab"
                                   aria-controls="home" aria-selected="true"
                                   style="min-width: 154px;">{{ __('admin.General settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab4" data-toggle="tab" href="#profile4" role="tab"
                                   aria-controls="profile" aria-selected="false">{{ __('admin.Seo settings') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact4" role="tab"
                                   aria-controls="contact" aria-selected="false">{{ __('admin.Appearance') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab4" data-toggle="tab" href="#contact5" role="tab"
                                   aria-controls="contact" aria-selected="false">
                                    {{ __('admin.Microsoft Api Settings') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-12 col-md-10">
                        <div class="tab-content no-padding" id="myTab2Content">
                            <div class="tab-pane fade show active" id="home4" role="tabpanel"
                                 aria-labelledby="home-tab4">
                                @include('admin.setting.cards.general-setting')
                            </div>
                            <div class="tab-pane fade" id="profile4" role="tabpanel" aria-labelledby="profile-tab4">
                                @include('admin.setting.cards.seo-setting')
                            </div>
                            <div class="tab-pane fade" id="contact4" role="tabpanel" aria-labelledby="contact-tab4">
                                @include('admin.setting.cards.appearance-setting')
                            </div>
                            <div class="tab-pane fade" id="contact5" role="tabpanel" aria-labelledby="contact-tab4">
                                @include('admin.setting.cards.microsoft-api-setting')
                            </div>
                        </div>
                    </div>
                </div>
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
            input_field: "#image-upload-site-logo",
            preview_box: "#image-preview-site-logo",
            label_field: "#image-label-site-logo",
            label_default: "{{ __('admin.Choose file') }}",
            label_selected: "{{ __('admin.Choose file') }}",
            no_label: false,
            success_callback: null
        });
        $(document).ready(function () {
            $('#image-preview-site-logo').css({
                "background-image": "url({{ asset($settingsApp['site_logo'] ?? '') }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
        $.uploadPreview({
            input_field: "#image-upload-site-favicon",
            preview_box: "#image-preview-site-favicon",
            label_field: "#image-label-site-favicon",
            label_default: "{{ __('admin.Choose file') }}",
            label_selected: "{{ __('admin.Choose file') }}",
            no_label: false,
            success_callback: null
        });
        $(document).ready(function () {
            $('#image-preview-site-favicon').css({
                "background-image": "url({{ asset($settingsApp['site_favicon'] ?? '') }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
    </script>
@endpush
