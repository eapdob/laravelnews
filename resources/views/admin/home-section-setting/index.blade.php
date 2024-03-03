@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Home section setting') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Home section setting') }}</h4>
            </div>
            <form action="{{ route('admin.home-section-setting') }}" method="POST">
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
                                            <label for="home-section-setting-one-{{ $language->id }}">{{ __('admin.Category section one') }}</label>
                                            <input name="homeSectionSetting[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="homeSectionSetting[{{ $language->id }}][id]" type="hidden" value="{{ $homeSectionSettings[$language->id]->id ?? '' }}">
                                            <select name="homeSectionSetting[{{ $language->id }}][category_section_one]" id="home-section-setting-one-{{ $language->id }}" class="form-control">
                                                <option value="">--{{ __('admin.Select') }}--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('homeSectionSetting.*.category_section_one') == $category->id ? 'selected' : (isset($homeSectionSettings[$language->id]->category_section_one) ? ($homeSectionSettings[$language->id]->category_section_one == $category->id ? 'selected' : '') : '') }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('homeSectionSetting.*.category_section_one')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @error('homeSectionSetting.*.language_id')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="home-section-setting-two-{{ $language->id }}">{{ __('admin.Category section two') }}</label>
                                            <input name="homeSectionSetting[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="homeSectionSetting[{{ $language->id }}][id]" type="hidden" value="{{ $homeSectionSettings[$language->id]->id ?? '' }}">
                                            <select name="homeSectionSetting[{{ $language->id }}][category_section_two]" id="home-section-setting-two-{{ $language->id }}" class="form-control">
                                                <option value="">--{{ __('admin.Select') }}--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('homeSectionSetting.*.category_section_two') == $category->id ? 'selected' : (isset($homeSectionSettings[$language->id]->category_section_two) ? ($homeSectionSettings[$language->id]->category_section_two == $category->id ? 'selected' : '') : '') }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('homeSectionSetting.*.category_section_two')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="home-section-setting-three-{{ $language->id }}">{{ __('admin.Category section three') }}</label>
                                            <input name="homeSectionSetting[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="homeSectionSetting[{{ $language->id }}][id]" type="hidden" value="{{ $homeSectionSettings[$language->id]->id ?? '' }}">
                                            <select name="homeSectionSetting[{{ $language->id }}][category_section_three]" id="home-section-setting-three-{{ $language->id }}" class="form-control">
                                                <option value="">--{{ __('admin.Select') }}--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('homeSectionSetting.*.category_section_three') == $category->id ? 'selected' : (isset($homeSectionSettings[$language->id]->category_section_three) ? ($homeSectionSettings[$language->id]->category_section_three == $category->id ? 'selected' : '') : '') }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('homeSectionSetting.*.category_section_three')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="home-section-setting-four-{{ $language->id }}">{{ __('admin.Category section four') }}</label>
                                            <input name="homeSectionSetting[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="homeSectionSetting[{{ $language->id }}][id]" type="hidden" value="{{ $homeSectionSettings[$language->id]->id ?? '' }}">
                                            <select name="homeSectionSetting[{{ $language->id }}][category_section_four]" id="home-section-setting-four-{{ $language->id }}" class="form-control">
                                                <option value="">--{{ __('admin.Select') }}--</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('homeSectionSetting.*.category_section_four') == $category->id ? 'selected' : (isset($homeSectionSettings[$language->id]->category_section_four) ? ($homeSectionSettings[$language->id]->category_section_four == $category->id ? 'selected' : '') : '') }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('homeSectionSetting.*.category_section_four')
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
    </script>
@endpush
