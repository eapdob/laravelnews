@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('Language') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Edit language') }}</h4>
                <div class="card-header-action">
                    <a href="{{ route('admin.language.create') }}" class="btn btn-primary fa fa-plus">
                        {{ __('Create new') }}
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.language.update', $language->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('Language') }}</label>
                        <select name="lang" id="language-select" class="form-control select2">
                            <option value="">--{{ __('Select') }}--</option>
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
                        <label for="">{{ __('Name') }}</label>
                        <input readonly name="name" value="{{ $language->name }}" type="text" class="form-control"
                               id="name">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Slug') }}</label>
                        <input readonly name="slug" value="{{ $language->slug }}" type="text" class="form-control"
                               id="slug">
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Is it default') }}</label>
                        <select name="default" id="" class="form-control">
                            <option
                                {{ $language->default === 0 ? 'selected' : '' }} value="0">{{ __('No') }}</option>
                            <option
                                {{ $language->default === 1 ? 'selected' : '' }} value="1">{{ __('Yes') }}</option>
                        </select>
                        @error('defalut')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option
                                {{ $language->status === 1 ? 'selected' : '' }} value="1">{{ __('Active') }}</option>
                            <option
                                {{ $language->status === 0 ? 'selected' : '' }} value="0">{{ __('Inactive') }}</option>
                        </select>
                        @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
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
