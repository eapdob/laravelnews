@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.profile') }}</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">{{ __('admin.dashboard') }}</a></div>
                <div class="breadcrumb-item">{{ __('admin.profile') }}</div>
            </div>
        </div>
        <div class="section-body">
            <h2 class="section-title">{{ __('admin.hi') }}{{ $user->name }}!</h2>
            <p class="section-lead">
                {{ __('admin.change_some_information') }}
            </p>
            <form method="post" class="needs-validation" href="{{ route('admin.profile.store') }}" novalidate="">
                <div class="row mt-sm-4">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('admin.edit_profile') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-control">
                                    <div id="image-preview">
                                        <label for="image-upload" id="image-label">{{ __('admin.choose_file') }}</label>
                                        <input type="file" name="image" id="image-upload" />
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('admin.name') }}</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" required="" name="name">
                                    <div class="invalid-feedback">
                                        {{ __('admin.invalid_name') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('admin.email') }}</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" required="" name="email">
                                    <div class="invalid-feedback">
                                        {{ __('admin.invalid_email') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">{{ __('admin.save_changes') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4>{{ __('admin.update_password') }}</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('admin.old_password') }}</label>
                                    <input type="password" class="form-control" value="{{ $user->password }}" required="" name="old_password">
                                    <div class="invalid-feedback">
                                        {{ __('admin.invalid_old_password') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('admin.new_password') }}</label>
                                    <input type="password" class="form-control" value="" required="" name="password">
                                    <div class="invalid-feedback">
                                        {{ __('admin.invalid_new_password') }}
                                    </div>
                                </div>
                                <div class="form-group col-md-6 col-12">
                                    <label>{{ __('admin.confirm_password') }}</label>
                                    <input type="password" class="form-control" value="" required="" name="confirm_password">
                                    <div class="invalid-feedback">
                                        {{ __('admin.invalid_confirm_password') }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">{{ __('admin.save_changes') }}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
