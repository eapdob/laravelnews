@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.categories') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.all_categories') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.create_new') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    @foreach ($languages as $language)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->index === 0 ? 'active' : ''}}"
                               data-toggle="tab"
                               href="#home-{{ $language->lang }}" role="tab"
                               aria-controls="home" aria-selected="true">
                                {{ $language->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content tab-bordered">
                    @foreach ($languages as $language)
                        @php
                            $categories = \App\Models\Category::where('language',$language->lang)->get();
                        @endphp
                        <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : ''}}"
                             id="home-{{ $language->lang }}"
                             role="tabpanel"
                             aria-labelledby="home-{{ $language->lang }}">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-{{ $language->lang }}">
                                        <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>{{ __('admin.name') }}</th>
                                            <th>{{ __('admin.code') }}</th>
                                            <th>{{ __('admin.in_nav') }}</th>
                                            <th>{{ __('admin.status') }}</th>
                                            <th>{{ __('admin.action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->language }}</td>
                                                <td>
                                                    @if ($category->show_at_nav == 1)
                                                        <span class="badge badge-primary">{{ __('admin.yes') }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ __('admin.no') }}</span>
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($category->status == 1)
                                                        <span class="badge badge-success">{{ __('admin.yes') }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ __('admin.no') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                    <a href="" class="btn btn-danger delete-item"><i
                                                            class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </section>
@endsection

@push('scripts')
    <script>
        @foreach ($languages as $language)
        $("#table-{{ $language->lang }}").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
        @endforeach
    </script>
@endpush
