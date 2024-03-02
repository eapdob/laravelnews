@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.About page') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.About page') }}</h4>
            </div>
            <form action="{{ route('admin.about.update') }}" method="POST">
                @csrf
                @method('PUT')
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
                                            <label for="about-content-{{ $language->id }}">{{ __('admin.About content') }}</label>
                                            <input name="about[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="about[{{ $language->id }}][id]" type="hidden" value="{{ $abouts[$language->id]->id ?? '' }}">
                                            <textarea name="about[{{ $language->id }}][content]" class="summernote-{{ $language->lang }}" id="about-content-{{ $language->id }}"
                                                      cols="30" rows="10">{!! old('about.' . $language->id . '.content') ? old('about.' . $language->id . '.content') : ($abouts[$language->id]->content ?? '') !!}</textarea>
                                            @error('about.*.content')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @error('about.*.language_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        @if ($errors->any())
        @foreach ($errors->all() as $error)
        Toast.fire({
            icon: 'error',
            title: "{{ $error }}"
        });
        @endforeach
            @endif
        if (jQuery().summernote) {
            @foreach ($languages as $language)
            $(".summernote-{{ $language->lang }}").summernote({
                dialogsInBody: true,
                minHeight: 250,
            });
            @endforeach
        }
    </script>
@endpush
