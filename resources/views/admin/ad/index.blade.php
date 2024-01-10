@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.ads') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.update_ads') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">{{ __('admin.name') }}</label>
                        <input name="name" type="text" class="form-control" id="name">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.show_at_nav') }} </label>
                        <select name="show_at_nav" id="" class="form-control">
                            <option value="0">{{ __('admin.no') }}</option>
                            <option value="1">{{ __('admin.yes') }}</option>
                        </select>
                        @error('show_at_nav')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">{{ __('admin.status') }}</label>
                        <select name="status" id="" class="form-control">
                            <option value="1">{{ __('admin.active') }}</option>
                            <option value="0">{{ __('admin.inactive') }}</option>
                        </select>
                        @error('status')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
