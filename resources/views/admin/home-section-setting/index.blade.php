@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.home_section_setting') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.home_section_setting') }}</h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab2" role="tablist">
                    @foreach ($languages as $language)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->index === 0 ? 'active' : '' }}" id="home-tab2"
                               data-toggle="tab"
                               href="#home-{{ $language->lang }}" role="tab" aria-controls="home"
                               aria-selected="true">{{ $language->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content tab-bordered" id="myTab3Content">
                    @foreach ($languages as $language)
                        @php
                            $categories = \App\Models\Category::where('language', $language->lang)->orderByDesc('id')->get();
                        @endphp
                        <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                             id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="card-body">
                                <form action="{{ route('admin.home-section-setting') }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="">{{ __('admin.category_section_one') }}</label>
                                        <input type="hidden" name="language" value="{{ $language->lang }}">
                                        <select name="category_section_one" id="" class="form-control select2">
                                            <option value="">{{ __('admin.select') }}</option>
                                            @foreach ( $categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_section_one')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.category_section_two') }}</label>
                                        <select name="category_section_two" id="" class="form-control select2">
                                            <option value="">{{ __('admin.select') }}</option>
                                            @foreach ( $categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_section_two')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.category_section_three') }}</label>
                                        <select name="category_section_three" id="" class="form-control select2">
                                            <option value="">{{ __('admin.select') }}</option>
                                            @foreach ( $categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_section_three')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.category_section_four') }}</label>
                                        <select name="category_section_four" id="" class="form-control select2">
                                            <option value="">{{ __('admin.select') }}</option>
                                            @foreach ( $categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_section_four')
                                        <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
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
