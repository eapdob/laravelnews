@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.language') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.all_languages') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.language.create') }}" class="btn btn-primary fa fa-plus">
                        {{ __('admin.create_new') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>
                        <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>{{ __('admin.name') }}</th>
                            <th>{{ __('admin.code') }}</th>
                            <th>{{ __('admin.default') }}</th>
                            <th>{{ __('admin.status') }}</th>
                            <th>{{ __('admin.action') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($languages as $language)
                            <tr>
                                <td>
                                    {{ $language->id }}
                                </td>
                                <td>{{ $language->name }}</td>
                                <td>{{ $language->lang }}</td>

                                <td>
                                    @if ($language->default == 1)
                                        <span class="badge badge-primary">{{ __('admin.default') }}</span>
                                    @else
                                        <span class="badge badge-warning">{{ __('admin.no') }}</span>
                                    @endif

                                </td>
                                <td>
                                    @if ($language->status == 1)
                                        <span class="badge badge-success">{{ __('admin.active') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('admin.inactive') }}</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.language.edit', $language->id) }}" class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin.language.destroy', $language->id) }}"
                                       class="btn btn-danger delete-item"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $("#table-1").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
    </script>
@endpush
