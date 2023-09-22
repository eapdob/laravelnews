<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ __('admin.dashboard_title') }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('admin/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/modules/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('admin/modules/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA --></head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        @include('admin.layouts.sidebar')

        <!-- Main Content -->
        <div class="main-content">
            @yield('content')
        </div>
    </div>
</div>

<!-- General JS Scripts -->
<script src="{{ asset('admin/modules/jquery.min.js') }}"></script>
<script src="{{ asset('admin/modules/popper.js') }}"></script>
<script src="{{ asset('admin/modules/tooltip.js') }}"></script>
<script src="{{ asset('admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('admin/modules/moment.min.js') }}"></script>
<script src="{{ asset('admin/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ asset('admin/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('admin/modules/select2/dist/js/select2.full.js') }}"></script>
<script src="{{ asset('admin/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>

@include('sweetalert::alert')

<!-- Template JS File -->
<script src="{{ asset('admin/js/scripts.js') }}"></script>
<script src="{{ asset('admin/js/custom.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // Add csrf token in ajax request
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    /** Handle Dynamic delete **/
    $(document).ready(function () {
        $('.delete-item').on('click', function (e) {
            e.preventDefault();
            Swal.fire({
                title: '{{ __('admin.are_you_sure') }}',
                text: '{{ __('admin.you_wont_be_able_to_revert_this') }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('admin.yes_delete_it') }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    let url = $(this).attr('href');
                    console.log(url);
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        success: function (data) {
                            if (data.status === 'success') {
                                Swal.fire(
                                    '{{ __('admin.deleted') }}',
                                    data.message,
                                    'success'
                                )
                                window.location.reload();
                            } else if (data.status === 'error') {
                                Swal.fire(
                                    '{{ __('admin.error') }}',
                                    data.message,
                                    'error'
                                )
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                        }
                    });
                }
            });
        });
    });
</script>

@stack('scripts')

</body>
</html>
