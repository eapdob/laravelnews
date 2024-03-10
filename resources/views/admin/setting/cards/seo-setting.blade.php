<div class="card border border-primary">
    <div class="card-body">
        <form action="{{ route('admin.seo-setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <ul class="nav nav-tabs" role="tablist">
                    @foreach ($languages as $language)
                        <li class="nav-item">
                            <a class="nav-link {{ $loop->index === 0 ? 'active' : '' }}" id="home-seo-tab2"
                               data-toggle="tab"
                               href="#home-seo-{{ $language->lang }}" role="tab" aria-controls="home"
                               aria-selected="true">{{ $language->name }}</a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content tab-bordered">
                    @foreach ($languages as $language)
                        <div class="tab-pane fade show {{ $loop->index === 0 ? 'active' : '' }}"
                             id="home-seo-{{ $language->lang }}" role="tabpanel" aria-labelledby="home-seo-tab2">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="settings-site-seo-title-{{ $language->id }}">{{ __('admin.Site seo title') }}</label>
                                    <input name="settings[{{ $language->id }}][language_id]" type="hidden" value="{{ $language->id }}">
                                    <input name="settings[{{ $language->id }}][site_seo_title]" class="form-control" id="settings-site-seo-title-{{ $language->id }}" value="{{ old('settings.' . $language->id . '.site_seo_title') ? old('settings.' . $language->id . '.site_seo_title') : ($settingsMain[$language->id]['site_seo_title'] ?? '') }}">
                                    @error('settings.*.language_id')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    @error('settings.*.site_name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="settings-site-seo-description-{{ $language->id }}">{{ __('admin.Site seo description') }}</label>
                                    <input name="settings[{{ $language->id }}][site_seo_description]" class="form-control" id="settings-site-seo-description-{{ $language->id }}" value="{{ old('settings.' . $language->id . '.site_seo_description') ? old('settings.' . $language->id . '.site_seo_description') : ($settingsMain[$language->id]['site_seo_description'] ?? '') }}">
                                    @error('settings.*.site_seo_description')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="settings-site-seo-keywords-{{ $language->id }}">{{ __('admin.Site seo keywords') }}</label>
                                    <input name="settings[{{ $language->id }}][site_seo_keywords]" class="form-control" id="settings-site-seo-keywords-{{ $language->id }}" value="{{ old('settings.' . $language->id . '.site_seo_keywords') ? old('settings.' . $language->id . '.site_seo_keywords') : ($settingsMain[$language->id]['site_seo_keywords'] ?? '') }}">
                                    @error('settings.*.site_seo_keywords')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('admin.Save') }}</button>
        </form>
    </div>
</div>
