@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.news') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.update_news') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">{{ __('admin.language') }}</label>
                        <select name="language"
                                id="language-select"
                                class="form-control select2">
                            <option value="">{{ __('admin.select') }}</option>
                            @foreach ($languages as $lang)
                                <option
                                    {{ $lang->lang === $news->language ? 'selected' : '' }} value="{{ $lang->lang }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.category') }}</label>
                        <select name="category" id="category" class="form-control select2">
                            <option value="">{{ __('admin.select') }}</option>
                            @foreach ($categories as $category)
                                <option
                                    {{ $category->id === $news->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image-preview">{{ __('admin.image') }}</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">{{ __('admin.choose_file') }}</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">{{ __('admin.title') }}</label>
                        <input name="title" value="{{ $news->title }}" type="text" class="form-control" id="title">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">{{ __('admin.slug') }}</label>
                        <input name="slug" value="{{ $news->slug }}" type="text" class="form-control" id="title">
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">{{ __('admin.content') }}</label>
                        <textarea name="content" class="summernote-simple" id="content">{{ $news->content }}</textarea>
                        @error('content')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tags">{{ __('admin.tags') }}</label>
                        <input name="tags" type="text" value="{{ formatTags($news->tags()->pluck('name')->toArray()) }}"
                               class="form-control inputtags">
                        @error('tags')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.meta_title') }}</label>
                        <input name="meta_title" value="{{ $news->meta_title }}" type="text" class="form-control"
                               id="name">
                        @error('meta_title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.meta_description') }}</label>
                        <textarea name="meta_description" class="form-control">{{ $news->meta_description }}</textarea>
                        @error('meta_description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('admin.status') }}</div>
                                <label class="custom-switch mt-2">
                                    <input {{ $news->status === 1 ? 'checked' : '' }} value="1" type="checkbox"
                                           name="status" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('admin.is_approved') }}</div>
                                <label class="custom-switch mt-2">
                                    <input {{ $news->is_approved === 1 ? 'checked' : '' }} value="1" type="checkbox"
                                           name="is_approved" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('admin.is_breaking_news') }}</div>
                                <label class="custom-switch mt-2">
                                    <input {{ $news->is_breaking_news == 1 ? 'checked' : '' }} value="1" type="checkbox"
                                           name="is_breaking_news" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('admin.show_at_slider') }}</div>
                                <label class="custom-switch mt-2">
                                    <input {{ $news->show_at_slider === 1 ? 'checked' : '' }} value="1" type="checkbox"
                                           name="show_at_slider" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">

                            <div class="form-group">
                                <div class="control-label">{{ __('admin.show_at_popular') }}</div>
                                <label class="custom-switch mt-2">
                                    <input {{ $news->show_at_popular === 1 ? 'checked' : '' }} value="1" type="checkbox"
                                           name="show_at_popular" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.update') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.image-preview').css({
                "background-image": "url({{ asset($news->image) }})",
                "background-size": "cover",
                "background-position": "center center"
            });
            $('#language-select').on('change', function () {
                let lang = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: '{{ route('admin.fetch-news-category') }}',
                    data: {lang: lang},
                    success: function (data) {
                        $('#category').html('');
                        $('#category').html(`<option value="">{{ __('admin.select') }}</option>`);
                        $.each(data, function (index, data) {
                            $('#category').append(`<option value="${data.id}">${data.name}</option>`)
                        })
                    },
                    error: function (error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush
