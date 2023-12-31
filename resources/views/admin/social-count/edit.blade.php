@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.social_count') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.update_social_link') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.social-count.update', $socialCount->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="language">{{ __('admin.language') }}</label>
                        <select name="language" id="language" class="form-control select2">
                            <option value="">{{ __('admin.select') }}</option>
                            @foreach ($languages as $lang)
                                <option {{ $lang->lang === $socialCount->language ?
                                'selected': '' }} value="{{ $lang->lang }}">{{ $lang->name }}</option>
                            @endforeach
                        </select>
                        @error('language')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.icon') }}</label>
                        <br>
                        <button class="btn btn-primary" data-icon="{{ $socialCount->icon }}" name="icon"
                                role="iconpicker"></button>
                        @error('icon')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.url') }}</label>
                        <input name="url" value="{{ $socialCount->url }}" type="text" class="form-control" id="name">
                        @error('url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.fan_count') }}</label>
                        <input name="fan_count" value="{{ $socialCount->fan_count }}" type="text" class="form-control"
                               id="name">
                        @error('fan_count')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.fan_type') }}</label>
                        <input name="fan_type" value="{{ $socialCount->fan_type }}" type="text" class="form-control"
                               id="name"
                               placeholder="ex: liks, fans, followers">
                        @error('fan_type')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.button_text') }}</label>
                        <input name="button_text" value="{{ $socialCount->button_text }}" type="text"
                               class="form-control" id="name">
                        @error('button_text')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>{{ __('admin.pick_your_color') }}</label>
                        <div class="input-group colorpickerinput">
                            <input name="color" value="{{ $socialCount->color }}" type="text" class="form-control">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-fill-drip"></i>
                                </div>
                            </div>
                            @error('color')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option
                                {{ $socialCount->status === 1 ? 'selected' : '' }} value="1">{{ __('admin.active') }}</option>
                            <option
                                {{ $socialCount->status === 0 ? 'selected' : '' }} value="0">{{ __('admin.inactive') }}</option>
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

@push('scripts')
    <script>
        $(".colorpickerinput").colorpicker({
            format: 'hex',
            component: '.input-group-append',
        });
    </script>
@endpush
