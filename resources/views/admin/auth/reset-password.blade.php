@extends('admin.layouts.auth')

@section('content')
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="{{ asset('admin/img/stisla-fill.svg') }}" alt="logo" width="100"
                             class="shadow-light rounded-circle">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>{{ __('admin.Reset password') }}</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.reset-password.send') }}"
                                  class="needs-validation"
                                  novalidate="">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <label for="email">{{ __('admin.Email') }}</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                           required autofocus value="{{ request()->email }}">
                                    @if(session('error'))
                                        <code>{{ session('error') }}</code>
                                        <div class="invalid-feedback">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    @error('email')
                                    <code>{{ $message }}</code>
                                    @enderror
                                    <div class="invalid-feedback">
                                        {{ __('admin.Invalid email') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password"
                                               class="control-label">{{ __('admin.New password') }}</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password"
                                           tabindex="2" required>
                                    @error('password')
                                    <code>{{ $message }}</code>
                                    @enderror
                                    <div class="invalid-feedback">
                                        {{ __('admin.Invalid password') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password"
                                               class="control-label">{{ __('admin.Confirm password') }}</label>
                                    </div>
                                    <input id="password" type="password" class="form-control"
                                           name="password_confirmation"
                                           tabindex="2" required>
                                    @error('password')
                                    <code>{{ $message }}</code>
                                    @enderror
                                    <div class="invalid-feedback">
                                        {{ __('admin.Invalid confirm password') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        {{ __('admin.Send link') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
