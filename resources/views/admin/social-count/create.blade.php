@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.social_count') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.create_social_link') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.social-count.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="language">{{ __('admin.language') }}</label>
                        <select name="language" id="language" class="form-control select2">
                            <option value="">--{{ __('admin.select') }}--</option>
                            @foreach ($languages as $lang)
                                <option value="{{ $lang->lang }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="icon">{{ __('admin.icon') }}</label>
                        <br>
                        <button class="btn btn-primary" name="icon" id="icon" role="iconpicker"></button>
                        @error('icon')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="url">{{ __('admin.url') }}</label>
                        <input name="url" type="text" class="form-control" id="url">
                        @error('url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fan_count">{{ __('admin.fan_count') }}</label>
                        <input name="fan_count" type="text" class="form-control" id="fan_count">
                        @error('fan_count')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="fan_type">{{ __('admin.fan_type') }}</label>
                        <input name="fan_type" type="text" class="form-control" id="fan_type"
                               placeholder="ex: liks, fans, followers">
                        @error('fan_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="button_text">{{ __('admin.button_text') }}</label>
                        <input name="button_text" type="text" class="form-control" id="button_text">
                        @error('button_text')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="color">{{ __('admin.pick_your_color') }}</label>
                        <div class="input-group colorpickerinput">
                            <input name="color" id="color" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-fill-drip"></i>
                                </div>
                            </div>
                        </div>
                        @error('color')
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
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush
