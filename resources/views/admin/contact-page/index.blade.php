@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Contact page') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Contact page') }}</h4>
            </div>
            <form action="{{ route('admin.contact.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $contact->id ?? '' }}">
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
                                            <label for="description-address-{{ $language->id }}">{{ __('admin.Address') }}</label>
                                            <input name="description[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                            <input name="description[{{ $language->id }}][id]" type="hidden" value="{{ $contacts[$language->id]->id ?? '' }}">
                                            <input name="description[{{ $language->id }}][address]" class="form-control" id="description-address-{{ $language->id }}" value="{{ $contacts[$language->id]->address ?? '' }}">
                                            @error('description.*.address')
                                            <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            @error('description.*.language_id')
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
                <div class="cart-body">
                    <div class="form-group">
                        <label for="">{{ __('admin.Phone') }}</label>
                        <input type="text" class="form-control" name="phone"
                               value="{{ $contact->phone ?? '' }}">
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.Email') }}</label>
                        <input type="text" class="form-control" name="email"
                               value="{{ $contact->email ?? '' }}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>
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
