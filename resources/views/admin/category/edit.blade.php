@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.category') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.update_category') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('admin.language') }}</label>
                        <select name="language" id="language-select" class="form-control select2">
                            <option value="">--{{ __('admin.select') }}--</option>
                            @foreach ($languages as $lang)
                                <option
                                    {{ $lang->lang === $category->language ? 'selected' : '' }} value="{{ $lang->lang }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.name') }}</label>
                        <input name="name" value="{{ $category->name }}" type="text" class="form-control" id="name">
                        @error('name')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="">{{ __('admin.show_at_nav') }} </label>
                        <select name="show_at_nav" id="" class="form-control">
                            <option
                                {{ $category->show_at_nav === 0 ? 'selected' : '' }} value="0">{{ __('admin.no') }}</option>
                            <option
                                {{ $category->show_at_nav === 1 ? 'selected' : '' }} value="1">{{ __('admin.yes') }}</option>
                        </select>
                        @error('defalut')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option
                                {{ $category->status === 1 ? 'selected' : '' }} value="1">{{ __('admin.active') }}</option>
                            <option
                                {{ $category->status === 0 ? 'selected' : '' }} value="0">{{ __('admin.inactive') }}</option>
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
