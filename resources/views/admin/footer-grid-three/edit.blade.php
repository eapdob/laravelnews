@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.footer') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.footer_grid_three') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer-grid-three.update', $footerGridThree->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('admin.language') }}</label>
                        <select name="language" id="language-select" class="form-control select2">
                            <option value="">{{ __('admin.select') }}</option>
                            @foreach ($languages as $lang)
                                <option
                                    {{ $footerGridThree->language == $lang->lang ? 'selected' : '' }} value="{{ $lang->lang }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.name') }}</label>
                        <input name="name" type="text" class="form-control" id="name"
                               value="{{ $footerGridThree->name }}">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.url') }}</label>
                        <input name="url" value="{{ $footerGridThree->url }}" type="text" class="form-control">
                        @error('url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option
                                {{ $footerGridThree->status == 1 ? 'selected' : '' }} value="1">{{ __('admin.active') }}</option>
                            <option
                                {{ $footerGridThree->status == 0 ? 'selected' : '' }} value="0">{{ __('admin.inactive') }}</option>
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
