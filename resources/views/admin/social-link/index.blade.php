@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.social_links') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.all_links') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.social-link.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i>{{ __('admin.create_new') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-sub">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>{{ __('admin.email') }}</th>
                                <th>{{ __('admin.action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $("#table-sub").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [1]
            }]
        });
    </script>
@endpush
