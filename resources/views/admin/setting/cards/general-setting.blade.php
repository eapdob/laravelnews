<div class="card border border-primary">
    <div class="card-body">
        <form action="{{ route('admin.general-setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">{{ __('admin.site_name') }}</label>
                <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] }}">
            </div>
            <div class="form-group">
                <img src="{{ asset($settings['site_logo']) }}" alt="" width="150px"> <br>
                <label for="">{{ __('admin.site_logo') }}</label>
                <input type="file" name="site_logo" class="form-control">
            </div>
            <div class="form-group">
                <img src="{{ asset($settings['site_favicon']) }}" alt="" width="150px"> <br>
                <label for="">{{ __('admin.site_favicon') }}</label>
                <input type="file" name="site_favicon" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('admin.save') }}</button>
        </form>
    </div>
</div>
