<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="description" content="@yield('meta_description')">
    <meta name="og:title" content="@yield('meta_og_title')">
    <meta name="og:description" content="@yield('meta_og_description')">
    <meta name="og:image" content="@yield('meta_og_image')">
    <meta name="twitter:title" content="@yield('meta_tw_title')">
    <meta name="twitter:description" content="@yield('meta_tw_description')">
    <meta name="twitter:image" content="@yield('meta_tw_image')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
</head>

<body>

<!-- Header section -->
@include('frontend.layouts.header')
<!-- End Header section -->

@yield('content')

<!-- Footer section -->
@include('frontend.layouts.footer')
<!-- End Footer section -->

<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

@include('sweetalert::alert')

<script src="{{ asset('frontend/assets/js/index.bundle.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Handle language
    $(document).ready(function () {
        $('#site-language').on('change', function () {
            let languageCode = $(this).val();
            $.ajax({
                method: 'GET',
                url: "{{ route('language') }}",
                data: {language_code: languageCode},
                success: function (data) {
                    if (data.status === 'success') {
                        window.location.reload();
                    }
                },
                error: function (data) {
                    console.error(data);
                }
            });
        });
    });

    // Add csrf token in ajax request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@stack('scripts')

</body>

</html>
