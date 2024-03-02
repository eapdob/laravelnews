@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Categories') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.All categories') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.Create new') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                        <tr>
                            <th class="text-center">{{ __('admin.Id') }}</th>
                            <th>{{ __('admin.Name') }}</th>
                            <th>{{ __('admin.Slug') }}</th>
                            <th>{{ __('admin.In nav') }}</th>
                            <th>{{ __('admin.Status') }}</th>
                            <th>{{ __('admin.Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>
                                    @if ($category->show_at_nav == 1)
                                        <span class="badge badge-primary">{{ __('admin.Yes') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('admin.No') }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($category->status == 1)
                                        <span class="badge badge-success">{{ __('admin.Yes') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('admin.No') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin.category.destroy', $category->id) }}"
                                       class="btn btn-danger delete-item"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </section>
@endsection

@push('scripts')
    <script>
        $("#table").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [1, 2, 3]
            }]
        });
    </script>
@endpush
