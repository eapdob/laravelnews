@extends('admin.layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>{{ __('admin.Roles and permissions') }}</h1>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('admin.Create role') }}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.role.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="role">{{ __('admin.Role name') }}</label>
                        <input type="text" class="form-control" name="role" id="role">
                        @error('role')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <h6 class="text-primary">{{ __('admin.Category permissions') }}</h6>
                        <div class="row">
                            @foreach ($permissions as $groupName => $permission)
                                <div class="form-group">
                                    <h6>{{ $groupName }}</h6>
                                    <div class="row">
                                        @foreach ($permission as $item)
                                            <div class="col-md-2">
                                                <label class="custom-switch mt-2">
                                                    <input value="{{ $item->name }}" type="checkbox" name="permissions[]" class="custom-switch-input">
                                                    <span class="custom-switch-indicator"></span>
                                                    <span class="custom-switch-description text-primary">{{ $item->name }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                        @endforeach
                    </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('admin.Create') }}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
