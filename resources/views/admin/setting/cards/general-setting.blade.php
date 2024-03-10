<div class="card border border-primary">
    <div class="card-body">
        <form action="{{ route('admin.general-setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
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
                                    <label for="settings-site-name-{{ $language->id }}">{{ __('admin.Site name') }}</label>
                                    <input name="settings[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                    <input name="settings[{{ $language->id }}][site_name]" class="form-control" id="settings-site-name-{{ $language->id }}" value="{{ old('settings.' . $language->id . '.site_name') ? old('settings.' . $language->id . '.site_name') : ($settingsMain[$language->id]['site_name'] ?? '') }}">
                                    @error('settings.*.language_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('settings.*.site_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="form-group">
                <img src="{{ asset($settings['site_logo'] ?? '') }}" alt="" width="150px"> <br>
                <label for="">{{ __('admin.Site logo') }}</label>
                <input type="file" name="site_logo" class="form-control">
                @error('site_logo')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <img src="{{ asset($settings['site_favicon'] ?? '') }}" alt="" width="150px"> <br>
                <label for="">{{ __('admin.Site favicon') }}</label>
                <input type="file" name="site_favicon" class="form-control">
                @error('site_favicon')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>
        </form>
    </div>
</div>
