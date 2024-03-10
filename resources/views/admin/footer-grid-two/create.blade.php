@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Footer grid two') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Footer grid two') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.footer-grid-two.store') }}" method="POST">
                    @csrf
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
                                            <label for="description-name-{{ $language->id }}">{{ __('admin.Name') }}</label>
                                            <input name="description[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="description[{{ $language->id }}][name]" type="text" class="form-control" id="description-name-{{ $language->id }}" value="{{ old('description.' . $language->id . '.name') }}">
                                            @error('description.*.name')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @error('description.*.language_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Url') }}</label>
                        <input name="url" type="text" class="form-control" value="{{ old('url') }}">
                        @error('url')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>{{ __('admin.Active') }}</option>
                            <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>{{ __('admin.Inactive') }}</option>
                        </select>
                        @error('status')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.Create') }}</button>
                </form>
            </div>
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
    </script>
@endpush
