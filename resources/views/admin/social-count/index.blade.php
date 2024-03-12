@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Social count') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.All social count') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.social-count.create') }}" class="btn btn-primary">
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
                            <th>{{ __('admin.Icon') }}</th>
                            <th>{{ __('admin.Link') }}</th>
                            <th>{{ __('admin.Status') }}</th>
                            <th>{{ __('admin.Action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($socialCounts as $socialCount)
                            <tr>
                                <td>{{ $socialCount->id }}</td>
                                <td><i style="font-size:16px" class="{{ $socialCount->icon }}"></i></td>
                                <td>{{ $socialCount->url }}</td>
                                <td>
                                    @if ($socialCount->status == 1)
                                        <span class="badge badge-success">{{ __('admin.Yes') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('admin.No') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.social-count.edit', $socialCount->id) }}"
                                       class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin.social-count.destroy', $socialCount->id) }}"
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
                "targets": [2, 3]
            }]
        });
    </script>
@endpush
