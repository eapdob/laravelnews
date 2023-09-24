@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.news') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.create_news') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.news.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('admin.language') }}</label>
                        <select name="language" id="language-select" class="form-control select2">
                            <option value="">{{ __('admin.select') }}</option>
                            @foreach ($languages as $lang)
                                <option value="{{ $lang->lang }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">{{ __('admin.category') }}</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">{{ __('Select') }}</option>
                            <option value=""></option>
                        </select>
                        @error('category')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.image') }}</label>
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
                        <input name="title" type="text" class="form-control" id="title">
                        @error('title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">{{ __('admin.content') }}</label>
                        <textarea name="content" class="summernote-simple" id="content"></textarea>
                        @error('content')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="meta_title">{{ __('admin.meta_title') }}</label>
                        <input name="meta_title" type="text" class="form-control" id="meta_title">
                        @error('meta_title')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.meta_description') }}</label>
                        <textarea name="meta_description" class="form-control"></textarea>
                        @error('meta_description')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('admin.status') }}</div>
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="status" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('admin.is_breaking_news') }}</div>
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="is_breaking_news" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('admin.show_at_slider') }}</div>
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="show_at_slider" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="control-label">{{ __('admin.show_at_popular') }}</div>
                                <label class="custom-switch mt-2">
                                    <input type="checkbox" name="show_at_popular" class="custom-switch-input">
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.create') }}</button>
                </form>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="{{ asset('admin/modules/upload-preview/assets/js/jquery.uploadPreview.js') }}"></script>
        <script>
            $.uploadPreview({
                input_field: "#image-upload",   // Default: .image-upload
                preview_box: "#image-preview",  // Default: .image-preview
                label_field: "#image-label",    // Default: .image-label
                label_default: "Choose File",   // Default: Choose File
                label_selected: "Change File",  // Default: Change File
                no_label: false,                // Default: false
                success_callback: null          // Default: null
            });
        </script>

        <script>
            $(document).ready(function () {
                $('#language-select').on('change', function () {
                    let lang = $(this).val();
                    $.ajax({
                        method: 'GET',
                        url: '{{ route('admin.fetch-news-category') }}',
                        data: {lang: lang},
                        success: function (data) {
                            $('#category').html('');
                            $('#category').html('<option value="">{{ __('admin.select') }}</option>');
                            $.each(data, function (index, data) {
                                $('#category').append(`<option value="${data.id}">${data.name}</option>`);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    })
                })
            })
        </script>
    @endpush
@endsection


