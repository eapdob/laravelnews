<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <title>Top News HTML template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">
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

<script type="text/javascript" src="js/index.bundle.js"></script>
<script src="{{ asset('frontend/assets/js/index.bundle.js') }}"></script>
</body>

</html>