@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Footer grid one') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-body">
                <form action="{{ route('admin.footer-grid-one-title') }}" method="POST">
                    <ul class="nav nav-tabs" role="tablist">
                        @foreach ($languages as $language)
                            <li class="nav-item">
                                <a class="nav-link {{ $loop->index === 0 ? 'active' : '' }}" id="home-tab2"
                                   data-toggle="tab"
                                   href="#home-{{ $language->lang }}" role="tab" aria-controls="home"
                                   aria-selected="true">{{ $language->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content tab-bordered">
                        @foreach ($languages as $language)
                            <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                                 id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="footer-title-{{ $language->id }}">{{ __('admin.Footer title') }}</label>
                                            <input name="footerTitles[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="footerTitles[{{ $language->id }}][id]" type="hidden" value="{{ $footerTitles[$language->id]->id ?? '' }}">
                                            <input name="footerTitles[{{ $language->id }}][footer_grid]" type="hidden" value="{{ $footerTitles[$language->id]->footer_grid ?? '' }}">
                                            <input name="footerTitles[{{ $language->id }}][title]" class="form-control" id="footer-title-{{ $language->id }}" value="{{ $footerTitles[$language->id]->title ?? '' }}">
                                            @error('footerTitles.*.title')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @error('footerTitles.*.language_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </form>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.All footer grid one links') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.footer-grid-one.create') }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> {{ __('admin.Create new') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table">
                        <thead>
                        <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>{{ __('admin.Name') }}</th>
                            <th>{{ __('admin.Language code') }}</th>
                            <th>{{ __('admin.Status') }}</th>
                            <th>{{ __('admin.Action') }}</th>
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
                                        <span class="badge badge-success">{{ __('admin.Yes') }}</span>
                                    @else
                                        <span class="badge badge-danger">{{ __('admin.No') }}</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.footer-grid-one.edit', $footerGridOne->id) }}"
                                       class="btn btn-primary"><i
                                            class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin.footer-grid-one.destroy', $footerGridOne->id) }}"
                                       class="btn btn-danger delete-item"><i
                                            class="fas fa-trash-alt"></i></a>
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
