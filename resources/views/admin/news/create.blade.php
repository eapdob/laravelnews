@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('News') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Create news') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('Language') }}</label>
                        <select name="language" id="language-select" class="form-control select2">
                            <option value="">--{{ __('Select') }}--</option>
                            @foreach ($languages as $lang)
                                <option value="{{ $lang->lang }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Category') }}</label>
                        <select name="category" id="category" class="form-control select2">
                            <option value="">--{{ __('Select') }}--</option>
                        </select>
                        @error('category')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('Image') }}</label>
                        <div id="image-preview" class="image-preview">
                            <label for="image-upload" id="image-label">{{ __('Choose file') }}</label>
                            <input type="file" name="image" id="image-upload">
                        </div>
                        @error('image')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input name="title" type="text" class="form-control" id="title">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">{{ __('Slug') }}</label>
                        <input name="slug" type="text" class="form-control" id="slug">
                        @error('slug')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">{{ __('Content') }}</label>
                        <textarea name="content" class="summernote-simple" id="content"></textarea>
                        @error('content')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="tags">{{ __('Tags') }}</label>
                        <input name="tags" type="text" class="form-control inputtags" id="tags">
                        @error('tags')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_title">{{ __('Meta title') }}</label>
                        <input name="meta_title" type="text" class="form-control" id="meta_title">
                        @error('meta_title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_description">{{ __('Meta description') }}</label>
                        <textarea name="meta_description" class="form-control" id="meta_description"></textarea>
                        @error('meta_description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('Status') }}</div>
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input" value="1" checked>
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        @if (canAccess(['news status', 'news all-access']))
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label">{{ __('Is breaking news') }}</div>
                                    <label class="custom-switch mt-2">
                                        <input value="1" type="checkbox" name="is_breaking_news"
                                               class="custom-switch-input" checked>
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label">{{ __('Show at slider') }}</div>
                                    <label class="custom-switch mt-2">
                                        <input value="1" type="checkbox" name="show_at_slider"
                                               class="custom-switch-input" checked>
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="control-label">{{ __('Show at popular') }}</div>
                                    <label class="custom-switch mt-2">
                                        <input value="1" type="checkbox" name="show_at_popular"
                                               class="custom-switch-input" checked>
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </div>
                            </div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#language-select').on('change', function () {
                let lang = $(this).val();
                $.ajax({
                    method: 'GET',
                    url: "{{ route('admin.fetch-news-category') }}",
                    data: {
                        lang: lang
                    },
                    success: function (data) {
                        $('#category').html("");
                        $('#category').html(
                            `<option value="">--{{ __('Select') }}--</option>`);

                        $.each(data, function (index, data) {
                            $('#category').append(
                                `<option value="${data.id}">${data.name}</option>`)
                        });
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
