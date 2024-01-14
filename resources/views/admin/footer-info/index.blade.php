@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.footer_info') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.footer_info') }}</h4>
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
                        <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                             id="home-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-tab2">
                            <div class="card-body">
                                <form action="{{ route('admin.footer-info.store') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">{{ __('admin.logo') }}</label>
                                        <input type="file" name="logo" class="form-control">
                                        <input type="hidden" name="language" value="{{ $language->lang }}"
                                               class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.short_description') }}</label>
                                        <textarea name="description" class="form-control" id="" cols="30"
                                                  rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">{{ __('admin.copyright_text') }}</label>
                                        <input type="text" name="copyright" class="form-control">
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
