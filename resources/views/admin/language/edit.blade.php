@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.language') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.edit_language') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.language.create') }}" class="btn btn-primary fa fa-plus">
                        {{ __('admin.create_new') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.language.update', $language->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('admin.language') }}</label>
                        <select name="lang" id="language-select" class="form-control select2">
                            <option value="">{{ __('admin.select') }}</option>
                            @foreach (config('language') as $key => $lang)
                                <option
                                    @if ($language->lang === $key)
                                        selected
                                    @endif
                                    value="{{ $key }}">{{ $lang['name'] }}</option>
                            @endforeach
                        </select>
                        @error('lang')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.name') }}</label>
                        <input readonly name="name" value="{{ $language->name }}" type="text" class="form-control"
                               id="name">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.slug') }}</label>
                        <input readonly name="slug" value="{{ $language->slug }}" type="text" class="form-control"
                               id="slug">
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.is_it_default') }}</label>
                        <select name="default" id="" class="form-control">
                            <option
                                {{ $language->default === 0 ? 'selected' : '' }} value="0">{{ __('admin.no') }}</option>
                            <option
                                {{ $language->default === 1 ? 'selected' : '' }} value="1">{{ __('admin.yes') }}</option>
                        </select>
                        @error('defalut')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option
                                {{ $language->status === 1 ? 'selected' : '' }} value="1">{{ __('admin.active') }}</option>
                            <option
                                {{ $language->status === 0 ? 'selected' : '' }} value="0">{{ __('admin.inactive') }}</option>
                        </select>
                        @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.update') }}</button>
                </form>
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
