@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Category') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Create category') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div>
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
                                            <label for="description-{{ $language->id }}">{{ __('admin.Name') }}</label>
                                            <input name="description[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="description[{{ $language->id }}][name]" type="text" class="form-control" id="description-{{ $language->id }}" value="{{ old('description.' . $language->id . '.name') }}">
                                            @error('description.*.name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @error('description.*.language_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="slug">{{ __('admin.Slug') }}</label>
                        <input name="slug" type="text" class="form-control" id="slug" value="{{ old('slug') }}">
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="show_at_nav">{{ __('admin.Show at nav') }} </label>
                        <select name="show_at_nav" id="show_at_nav" class="form-control">
                            <option value="0" {{ old('show_at_nav') == 0 ? 'selected' : '' }}>{{ __('admin.No') }}</option>
                            <option value="1" {{ old('show_at_nav') == 1 ? 'selected' : '' }}>{{ __('admin.Yes') }}</option>
                        </select>
                        @error('show_at_nav')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">{{ __('admin.Status') }}</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>{{ __('admin.Active') }}</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>{{ __('admin.Inactive') }}</option>
                        </select>
                        @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="parent_id">{{ __('admin.parent ID') }}</label>
                        <select name="parent_id" id="parent_id" class="form-control select2">
                            <option value="">--{{ __('admin.Select') }}--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('parent_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
