@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Footer') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    @foreach ($languages as $language)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->index === 0 ? 'active' : '' }}" id="home-tab2" data-toggle="tab"
                               href="#home-{{ $language->lang }}" role="tab" aria-controls="home"
                               aria-selected="true">
                                {{ $language->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                    @foreach ($languages as $language)
                        @php
                            $footerTitle = \App\Models\FooterTitle::where(['language' => $language->lang, 'key' => 'grid_one_title'])->first();
                        @endphp
                        <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                             id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="card-body">
                                <form action="{{ route('admin.footer-grid-one-title') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">{{ __('Footer title') }}</label>
                                        <input type="text" class="form-control" name="title" value="{{ $footerTitle->value ?? '' }}">
                                        <input type="hidden" value="{{ $language->lang }}" class="form-control" name="language">
                                        @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('All footer grid one links') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.footer-grid-one.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('Create new') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    @foreach ($languages as $language)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->index === 0 ? 'active' : '' }}" id="home-tab2" data-toggle="tab"
                               href="#home-{{ $language->lang }}" role="tab" aria-controls="home"
                               aria-selected="true">
                                {{ $language->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                    @foreach ($languages as $language)
                        @php
                            $footerGridOnes = \App\Models\FooterGridOne::where('language', $language->lang)->get();
                        @endphp
                        <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                             id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-{{ $language->lang }}">
                                        <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>{{ __('Name') }}</th>
                                            <th>{{ __('Language code') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($footerGridOnes as $footerGridOne)
                                            <tr>
                                                <td>{{ $footerGridOne->id }}</td>
                                                <td>{{ $footerGridOne->name }}</td>
                                                <td>{{ $footerGridOne->language }}</td>
                                                <td>
                                                    @if ($footerGridOne->status == 1)
                                                        <span class="badge badge-success">{{ __('Yes') }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ __('No') }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.footer-grid-one.edit', $footerGridOne->id) }}" class="btn btn-primary"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="{{ route('admin.footer-grid-one.destroy', $footerGridOne->id) }}" class="btn btn-danger delete-item"><i
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
