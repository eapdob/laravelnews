@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Category') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Update category') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.update', current($category)->id) }}" method="POST">
                    @csrf
                    @method('PUT')
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
                                            <label for="description-name-{{ $language->id }}">{{ __('admin.Name') }}</label>
                                            <input name="description[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="description[{{ $language->id }}][name]" value="{{ old('description.' . $language->id . '.name') ? old('description.' . $language->id . '.name') : ($category[$language->id]->name ?? '') }}" type="text" class="form-control" id="description-name-{{ $language->id }}">
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
                        <input name="slug" type="text" class="form-control" id="slug" value="{{ old('slug') ? old('slug') : (current($category)->slug ?? '') }}">
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="show_at_nav">{{ __('admin.Show at nav') }} </label>
                        <select name="show_at_nav" id="show_at_nav" class="form-control">
                            <option
                                {{ old('show_at_nav') === 0 ? 'selected' : (current($category)->show_at_nav === 0 ? 'selected' : '') }} value="0">{{ __('admin.No') }}</option>
                            <option
                                {{ old('show_at_nav') === 1 ? 'selected' : (current($category)->show_at_nav === 1 ? 'selected' : '') }} value="1">{{ __('admin.Yes') }}</option>
                        </select>
                        @error('show_at_nav')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">{{ __('admin.Status') }}</label>
                        <select name="status" id="status" class="form-control">
                            <option
                                {{ old('status') === 1 ? 'selected' : (current($category)->status === 1 ? 'selected' : '') }} value="1">{{ __('admin.Active') }}</option>
                            <option
                                {{ old('status') === 0 ? 'selected' : (current($category)->status === 0 ? 'selected' : '') }} value="0">{{ __('admin.Inactive') }}</option>
                        </select>
                        @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="parent_id">{{ __('admin.parent ID') }}</label>
                        <select name="parent_id" id="parent_id" class="form-control select2">
                            <option value="">--{{ __('admin.Select') }}--</option>
                            @foreach ($categories as $categoryData)
                                <option value="{{ $categoryData->id }}" {{ old('parent_id') === $categoryData->id ? 'selected' : (current($category)->parent_id === $categoryData->id ? 'selected' : '') }}>{{ $categoryData->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.Update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
