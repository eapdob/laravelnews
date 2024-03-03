@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Footer info') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Footer info') }}</h4>
            </div>
            <form action="{{ route('admin.footer-info.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $footerInfo->id ?? '' }}">
                <div class="card-body">
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
                                        <div class="form-group">
                                            <label for="description-description-{{ $language->id }}">{{ __('admin.Short description') }}</label>
                                            <input name="description[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="description[{{ $language->id }}][id]" type="hidden" value="{{ $contacts[$language->id]->id ?? '' }}">
                                            <input name="description[{{ $language->id }}][description]" class="form-control" id="description-description-{{ $language->id }}" value="{{ old('description.*.description') ? old('description.*.description') : ($footerInfos[$language->id]->description ?? '') }}">
                                            @error('description.*.description')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @error('description.*.language_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description-copyright-{{ $language->id }}">{{ __('admin.Copyright text') }}</label>
                                            <input name="description[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="description[{{ $language->id }}][id]" type="hidden" value="{{ $contacts[$language->id]->id ?? '' }}">
                                            <input name="description[{{ $language->id }}][copyright]" class="form-control" id="description-copyright-{{ $language->id }}" value="{{ old('description.*.copyright') ? old('description.*.copyright') : ($footerInfos[$language->id]->copyright ?? '') }}">
                                            @error('description.*.copyright')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="cart-body">
                    <div class="form-group">
                        <label for="">{{ __('admin.Footer Logo') }}</label>
                    </div>
                    <div class="form-group">
                        <div id="image-preview">
                            <label for="image-upload" id="image-label">{{ __('admin.Choose file') }}</label>
                            <input type="file" name="logo" id="image-upload"/>
                            <input type="hidden" name="old_logo" value="{{ old('logo') ? old('logo') : (isset($footerInfo->logo) ? $footerInfo->logo : '') }}"/>
                        </div>
                        @error('image')
                        <p class="text-danger">{{ $message }}<p/>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>
            </form>
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
                "background-image": "url({{ (isset($footerInfo->logo) ? asset($footerInfo->logo) : '') }})",
                "background-size": "cover",
                "background-position": "center center"
            });
        });
    </script>
    <script>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
            Toast.fire({
                icon: 'error',
                title: "{{ $error }}"
            });
        @endforeach
        @endif
    </script>
@endpush
