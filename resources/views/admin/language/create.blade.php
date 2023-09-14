@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Language</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>Create Language</h4>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.language.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="language">Language</label>
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
                        <label for="name">Name</label>
                        <input readonly name="name" type="text" id="name" class="form-control">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input readonly name="slug" type="text" id="slug" class="form-control">
                        @error('slug')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="default">Is it default?</label>
                        <select name="default" id="default" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                        @error('default')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
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
