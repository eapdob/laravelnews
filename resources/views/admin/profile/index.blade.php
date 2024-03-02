@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Profile') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a
                        href="{{ route('admin.dashboard') }}">{{ __('admin.Dashboard') }}</a></div>
                <div class="breadcrumb-item">{{ __('admin.Profile') }}</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ __('admin.Hi') }}, {{ Auth::guard('admin')->user()->name }}!</h2>
            <p class="section-lead">
                {{ __('admin.Change profile information') }}
            </p>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-6">
                    <div class="card">
                        <form method="POST"
                              action="{{ route('admin.profile.update', auth()->guard('admin')->user()->id) }}"
                              class="needs-validation" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>{{ __('admin.Edit profile') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <div id="image-preview">
                                        <label for="image-upload" id="image-label">{{ __('admin.Choose file') }}</label>
                                        <input type="file" name="image" id="image-upload"/>
                                        <input type="hidden" name="old_image" value="{{ $user->image }}"/>
                                    </div>
                                    @error('image')
                                    <p class="text-danger">
                                    {{ $message }}
                                    <p/>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('admin.Name') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" required=""
                                           name="name">
                                    <div class="invalid-feedback">
                                        {{ __('admin.Invalid name') }}
                                    </div>
                                    @error('name')
                                    <p class="invalid-feedback">
                                    {{ $message }}
                                    <p/>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('admin.Email') }}</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" required=""
                                           name="email">
                                    <div class="invalid-feedback">
                                        {{ __('admin.Invalid email') }}
                                    </div>
                                    @error('email')
                                    <p class="invalid-feedback">
                                    {{ $message }}
                                    <p/>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">{{ __('admin.Save changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="card">
                        <form method="post"
                              action="{{ route('admin.profile-password-update', auth()->guard('admin')->user()->id) }}"
                              class="needs-validation" novalidate="">
                            @csrf
                            @method('PUT')
                            <div class="card-header">
                                <h4>{{ __('admin.Update password') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('admin.Old password') }}</label>
                                    <input type="password" class="form-control" required="" name="current_password">
                                    <div class="invalid-feedback">
                                        {{ __('admin.Invalid old password') }}
                                    </div>
                                    @error('current_password')
                                    <p class="text-danger">
                                    {{ $message }}
                                    <p/>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('admin.New password') }}</label>
                                    <input type="password" class="form-control" value="" required="" name="password">
                                    <div class="invalid-feedback">
                                        {{ __('admin.Invalid new password') }}
                                    </div>
                                    @error('password')
                                    <p class="text-danger">
                                    {{ $message }}
                                    <p/>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('admin.Confirm password') }}</label>
                                    <input type="password" class="form-control" value="" required=""
                                           name="password_confirmation">
                                    <div class="invalid-feedback">
                                        {{ __('admin.Invalid confirm password') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">{{ __('admin.Save changes') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    "background-image": "url({{ asset($user->image) }})",
                    "background-size": "cover"
                });
            });
        </script>
    @endpush
@endsection
