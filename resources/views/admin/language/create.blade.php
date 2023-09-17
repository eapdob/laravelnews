@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.language') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.create_language') }}</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.language.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="language">{{ __('admin.language') }}</label>
                        <select name="lang" id="lang" class="form-control select2">
                            @foreach(config('language') as $key => $lang)
                                <option value="{{ $key }}">{{ $lang['name'] }}</option>
                            @endforeach
                        </select>
                        @error('lang')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">{{ __('admin.name') }}</label>
                        <input readonly name="name" type="text" id="name" class="form-control">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">{{ __('admin.slug') }}</label>
                        <input readonly name="slug" type="text" id="slug" class="form-control">
                        @error('slug')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="default">{{ __('admin.is_it_default') }}</label>
                        <select name="default" id="default" class="form-control">
                            <option value="0">{{ __('admin.no') }}</option>
                            <option value="1">{{ __('admin.yes') }}</option>
                        </select>
                        @error('default')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">{{ __('admin.status') }}</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">{{ __('admin.active') }}</option>
                            <option value="0">{{ __('admin.inactive') }}</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#lang').on('change', function () {
                let slug = $(this).val();
                let name = $(this).children(':selected').text();
                $('#slug').val(slug);
                $('#name').val(name);
            });
        });
    </script>

@endpush
