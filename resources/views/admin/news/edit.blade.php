@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.News') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Update news') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.news.update', current($news)->id) }}" method="POST" enctype="multipart/form-data">
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
                                            <label for="description-title-{{ $language->id }}">{{ __('admin.Title') }}</label>
                                            <input name="description[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="description[{{ $language->id }}][title]" type="text" class="form-control" id="description-title-{{ $language->id }}" value="{{ old('description.' . $language->id . '.title') ? old('description.' . $language->id . '.title') : ($news[$language->id]->title ?? '') }}">
                                            @error('description.*.title')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @error('description.*.language_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description-content-{{ $language->id }}">{{ __('admin.Content') }}</label>
                                            <input name="description[{{ $language->id }}][content]" type="text" class="form-control" id="description-content-{{ $language->id }}" value="{{ old('description.' . $language->id . '.content') ? old('description.' . $language->id . '.content') : ($news[$language->id]->content ?? '') }}">
                                            @error('description.*.content')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description-meta-title-{{ $language->id }}">{{ __('admin.Meta title') }}</label>
                                            <input name="description[{{ $language->id }}][meta_title]" type="text" class="form-control" id="description-meta-title-{{ $language->id }}" value="{{ old('description.' . $language->id . '.meta_title') ? old('description.' . $language->id . '.meta_title') : ($news[$language->id]->meta_title ?? '') }}">
                                            @error('description.*.meta_title')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description-meta-description-{{ $language->id }}">{{ __('admin.Meta description') }}</label>
                                            <input name="description[{{ $language->id }}][meta_description]" type="text" class="form-control" id="description-meta-description-{{ $language->id }}" value="{{ old('description.' . $language->id . '.meta_description') ? old('description.' . $language->id . '.meta_description') : ($news[$language->id]->meta_title ?? '') }}">
                                            @error('description.*.meta_description')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description-tags-{{ $language->id }}">{{ __('admin.Tags') }}</label>
                                            <input name="description[{{ $language->id }}][tags]" type="text" class="form-control inputtags" id="description-tags-{{ $language->id }}" value="{{ old('description.' . $language->id . '.tags') ? old('description.' . $language->id . '.tags') : (formatTags($news[$language->id]->tags()->where('language_id', $language->id)->pluck('name')->toArray())) }}">
                                            @error('description.*.tags')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Category') }}</label>
                        <select name="category_id" id="category" class="form-control select2">
                            <option value="">--{{ __('admin.Select') }}--</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') === $category->id ? 'selected' : (current($news)->category_id == $category->id ? 'selected' : '') }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div id="image-preview">
                            <label for="image-upload" id="image-label">{{ __('admin.Choose file') }}</label>
                            <input type="file" name="image" id="image-upload"/>
                            <input type="hidden" name="old_image" value="{{ old('image') ? old('image') : (current($news)->image ?? '') }}"/>
                        </div>
                        @error('image')
                        <p class="text-danger">{{ $message }}<p/>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">{{ __('admin.Slug') }}</label>
                        <input name="slug" type="text" class="form-control" id="slug" value="{{ old('slug') ? old('slug') : (current($news)->slug ?? '') }}">
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('admin.Status') }}</div>
                                <label class="custom-switch mt-2">
                                    <input value="1" type="checkbox" name="status" class="custom-switch-input" {{ old('status') === 1 ? 'selected' : (current($news)->status == 1 ? 'checked' : '') }}>
                                    <span class="custom-switch-indicator"></span>
                                </label>
                                @error('status')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        @if (canAccess(['news status', 'news all-access']))
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label">{{ __('admin.Is breaking news') }}</div>
                                    <label class="custom-switch mt-2">
                                        <input value="1" type="checkbox" name="is_breaking_news"
                                               class="custom-switch-input" {{ old('is_breaking_news') === 1 ? 'selected' : (current($news)->is_breaking_news == 1 ? 'checked' : '') }}>
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                    @error('is_breaking_news')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label">{{ __('admin.Show at slider') }}</div>
                                    <label class="custom-switch mt-2">
                                        <input value="1" type="checkbox" name="show_at_slider"
                                               class="custom-switch-input" {{ old('show_at_slider') === 1 ? 'selected' : (current($news)->show_at_slider == 1 ? 'checked' : '') }}>
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                    @error('show_at_slider')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label">{{ __('admin.Show at popular') }}</div>
                                    <label class="custom-switch mt-2">
                                        <input value="1" type="checkbox" name="show_at_popular"
                                               class="custom-switch-input" {{ old('show_at_popular') === 1 ? 'selected' : (current($news)->show_at_popular == 1 ? 'checked' : '') }}>
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                    @error('show_at_popular')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.Update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="{{ asset('admin/modules/upload-preview/assets/js/jquery.uploadPreview.js') }}"></script>
    <script>
        $.uploadPreview({
            input_field: "#image-upload",
            preview_box: "#image-preview",
            label_field: "#image-label",
            label_default: "{{ __('admin.Choose file') }}",
            label_selected: "{{ __('admin.Choose file') }}",
            no_label: false,
            success_callback: null
        });
        $(document).ready(function () {
            $('#image-preview').css({
                "background-image": "url({{ asset(current($news)->image) }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
    </script>
@endpush
