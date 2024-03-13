<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>@hasSection('title')
            @yield('title')
        @else
            {{ $settingsApp['site_seo_title'] ?? '' }}
        @endif </title>
    <meta name="description"
          content="@hasSection('meta_description') @yield('meta_description') @else {{ $settingsApp['site_seo_description'] ?? '' }} @endif"/>
    <meta name="keywords" content="{{ $settingsApp['site_seo_keywords'] ?? '' }}"/>
    <meta name="og:title" content="@yield('meta_og_title')">
    <meta name="og:description" content="@yield('meta_og_description')">
    <meta name="og:image" content="@yield('meta_og_image')">
    <meta name="twitter:title" content="@yield('meta_tw_title')">
    <meta name="twitter:description" content="@yield('meta_tw_description')">
    <meta name="twitter:image" content="@yield('meta_tw_image')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{ $settingsApp['site_favicon'] ?? '' }}"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">
    <style>
        :root {
            --colorPrimary: {{ $settingsApp['site_color'] ?? '' }};
        }
    </style>
</head>
<body>
@php
    $socialLinksApp = \App\Models\SocialLink::where('status', 1)->get();
    $footerInfoApp = \App\Models\FooterInfo::withLocalize()->first();
    $footerGridOnesApp = \App\Models\FooterGridOne::activeEntries()->withLocalize()->get();
    $footerGridTwosApp = \App\Models\FooterGridTwo::activeEntries()->withLocalize()->get();
    $footerGridThreesApp = \App\Models\FooterGridThree::activeEntries()->withLocalize()->get();
    $footerGridOneTitleApp = \App\Models\FooterTitle::where(['footer_grid' => 'footer_grid_one', 'language_id' => getLanguageId()])->first();
    $footerGridTwoTitleApp = \App\Models\FooterTitle::where(['footer_grid' => 'footer_grid_two', 'language_id' => getLanguageId()])->first();
    $footerGridThreeTitleApp = \App\Models\FooterTitle::where(['footer_grid' => 'footer_grid_three', 'language_id' => getLanguageId()])->first();
    $languagesApp = \App\Models\Language::where('status', 1)->get();
    $featuredCategoriesApp = \App\Models\Category::where(['status' => 1, 'show_at_nav' => 1])->withLocalize()->get();
    $categoriesApp = \App\Models\Category::where(['status' => 1, 'show_at_nav' => 0])->withLocalize()->get();
@endphp
@include('frontend.layouts.header')
@yield('content')
@include('frontend.layouts.footer')
<a href="javascript:void(0);" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
@include('sweetalert::alert')
<script src="{{ asset('frontend/assets/js/index.bundle.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer);
            toast.addEventListener('mouseleave', Swal.resumeTimer);
        }
    });
    $(document).ready(function () {
        $('#site-language').on('change', function () {
            let languageId = $(this).val();
            $.ajax({
                method: 'GET',
                url: "{{ route('language') }}",
                data: {language_id: languageId},
                success: function (data) {
                    if (data.status === 'success') {
                        window.location.href = "{{ url('/') }}";
                    }
                },
                error: function (data) {
                    console.error(data);
                }
            });
        });
        $('.newsletter-form').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                method: 'POST',
                url: "{{ route('subscribe-newsletter') }}",
                data: $(this).serialize(),
                beforeSend: function () {
                    $('.newsletter-button').text('{{ __('frontend.Loading') }}');
                    $('.newsletter-button').attr('disabled', true);
                },
                success: function (data) {
                    if (data.status === 'success') {
                        Toast.fire({
                            icon: 'success',
                            title: data.message
                        })
                        $('.newsletter-form')[0].reset();
                        $('.newsletter-button').text('{{ __('frontend.Sign up') }}');
                        $('.newsletter-button').attr('disabled', false);
                    }
                },
                error: function (data) {
                    $('.newsletter-button').text('{{ __('frontend.Sign up') }}');
                    $('.newsletter-button').attr('disabled', false);
                    if (data.status === 422) {
                        let errors = data.responseJSON.errors;
                        $.each(errors, function (index, value) {
                            Toast.fire({
                                icon: 'error',
                                title: value[0]
                            })
                        });
                    }
                }
            });
        });
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@stack('scripts')
</body>
</html>
