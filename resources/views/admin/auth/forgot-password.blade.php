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
                            <h4>{{ __('admin.Forgot password') }}</h4>
                        </div>
                        <div class="card-body">
                            <p>{{ __('admin.Please enter your email to receive a password reset link') }}</p>
                            @if (session()->has('success'))
                                <br>
                                <i><b style="color:green;">{{ session()->get('success') }}</b></i>
                            @endif
                            <form method="POST" action="{{ route('admin.forgot-password.send') }}"
                                  class="needs-validation"
                                  novalidate="">
                                @csrf
                                <div class="form-group">
                                    <label for="email">{{ __('admin.Email') }}</label>
                                    <input id="email" type="email" class="form-control" name="email" tabindex="1"
                                           required autofocus>
                                    @error('email')
                                    <code>{{ $message }}</code>
                                    @enderror
                                    <div class="invalid-feedback">
                                        {{ __('admin.Invalid email') }}
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
