@extends('frontend.layouts.app')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumbs bg-light mb-4">
                        <li class="breadcrumbs__item">
                            <a href="{{ url('/') }}" class="breadcrumbs__url">
                                <i class="fa fa-home"></i> {{ __('frontend.Home') }}
                            </a>
                        </li>
                        <li class="breadcrumbs__item breadcrumbs__item--current">
                            {{ __('frontend.Contact') }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="wrap__contact-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h5>{{ __('frontend.Contact us') }}</h5>
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group form-group-name">
                                    <label for="email">{{ __('frontend.Your email') }} <span
                                            class="required"></span></label>
                                    <input type="email" id="email" class="form-control" name="email" required="">
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-group-name">
                                    <label for="subject">{{ __('frontend.Subject') }} <span
                                            class="required"></span></label>
                                    <input type="text" id="subject" class="form-control" name="subject" required="">
                                    @error('subject')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">{{ __('frontend.Message') }} </label>
                                    <textarea id="message" class="form-control" rows="8" name="message"></textarea>
                                    @error('subject')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <button type="submit" class="btn btn-primary">{{ __('frontend.Submit') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4">
                    <h5>{{ __('frontend.Info location') }}</h5>
                    <div class="wrap__contact-form-office">
                        <ul class="list-unstyled">
                            <li>
                                <span>
                                    <i class="fa fa-home"></i>
                                </span>
                                {{ $contact->description->first()->address ?? '' }}
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                                </span>
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                                </span>
                            </li>
                        </ul>
                        <div class="social__media">
                            <h5>{{ __('frontend.Find us') }}</h5>
                            <ul class="list-inline">
                                @foreach ($socials as $social)
                                    <li class="list-inline-item-contact mx-1">
                                        <a href="https://www.linkedin.com/"
                                           class="btn btn-social rounded text-white facebook">
                                            <i class="{{ $social->icon }}"></i>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
