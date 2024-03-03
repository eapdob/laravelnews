@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Social count') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Update social link') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.social-count.update', current($socialCount)->id) }}" method="POST">
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
                                            <label for="description-fan-count-{{ $language->id }}">{{ __('admin.Fan count') }}</label>
                                            <input name="description[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="description[{{ $language->id }}][fan_count]" type="text" class="form-control" id="description-fan-count-{{ $language->id }}" value="{{ old('description.' . $language->id . '.fan_count') ? old('description.' . $language->id . '.fan_count') : ($socialCount[$language->id]->fan_count ?? '') }}">
                                            @error('description.*.fan_count')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @error('description.*.language_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description-fan-type-{{ $language->id }}">{{ __('admin.Fan type') }}</label>
                                            <input name="description[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="description[{{ $language->id }}][fan_type]" type="text" class="form-control" id="description-fan-type-{{ $language->id }}" value="{{ old('description.' . $language->id . '.fan_type') ? old('description.' . $language->id . '.fan_type') : ($socialCount[$language->id]->fan_type ?? '') }}">
                                            @error('description.*.fan_type')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description-button-text-{{ $language->id }}">{{ __('admin.Button text') }}</label>
                                            <input name="description[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="description[{{ $language->id }}][button_text]" type="text" class="form-control" id="description--button-text-{{ $language->id }}" value="{{ old('description.' . $language->id . '.button_text') ? old('description.' . $language->id . '.button_text') : ($socialCount[$language->id]->button_text ?? '') }}">
                                            @error('description.*.button_text')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="icon">{{ __('admin.Icon') }}</label>
                        <br>
                        <button class="btn btn-primary" name="icon" id="icon" role="iconpicker" data-icon="{{ old('icon') ? old('icon') : (current($socialCount)->icon ?? '') }}"></button>
                        @error('icon')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="url">{{ __('admin.Url') }}</label>
                        <input name="url" type="text" class="form-control" id="url" value="{{ old('url') ? old('url') : (current($socialCount)->url ?? '') }}">
                        @error('url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="color">{{ __('admin.Pick your color') }}</label>
                        <div class="input-group colorpickerinput">
                            <input name="color" id="color" type="text" class="form-control" value="{{ old('color') ? old('color') : (current($socialCount)->color ?? '') }}">
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
                        <label for="status">{{ __('admin.Status') }}</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ old('status') === 1 ? 'selected' : (current($socialCount)->status === 1 ? 'selected' : '') }}>{{ __('admin.Active') }}</option>
                            <option value="0" {{ old('status') === 0 ? 'selected' : (current($socialCount)->status === 0 ? 'selected' : '') }}>{{ __('admin.Inactive') }}</option>
                        </select>
                        @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.Update') }}</button>
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
