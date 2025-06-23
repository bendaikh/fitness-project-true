<div class="tab-pane fade active show" id="footer" role="tabpanel" aria-labelledby="footer-tab4">
    <form action="{{ route('admin.page-utility.update', ['code' => $code]) }}" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="footer_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="subtitle">{{ __('Copyright Message') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="footer_copyright" id="subtitle"
                    value="{{ old('footer_copyright', $utilityPage?->getTranslation($code)?->footer_copyright ?: '') }}"
                    placeholder="{{ __('Copyright Message') }}" data-translate="true">
            </div>

            <div class="col-12 form-group">
                <div>
                    <label>
                        <input type="hidden" value="0" name="footer_app_button_status">
                        <input type="checkbox" value="1" name="footer_app_button_status"
                            class="custom-switch-input" @checked($utilityPage?->footer_app_button_status)>
                        <span class="custom-switch-indicator"></span>
                        <span class="custom-switch-description">{{ __('App Download Now Status') }}</span>
                    </label>
                </div>
                <label for="subtitle">{{ __('App Download Now Text') }} </label>
                <input type="text" class="form-control" name="app_download_now_text" id="subtitle"
                    value="{{ old('app_download_now_text', $utilityPage?->getTranslation($code)?->app_download_now_text ?: '') }}"
                    placeholder="{{ __('App Download Now Text') }}" data-translate="true">
            </div>
            @if ($code === $languages->first()->code)
                <div class="col-12">
                    <b>{{ __('App Links') }}</b>
                </div>
                <div class="form-group col-md-6">
                    <label for="footer_app_link_android">{{ __('Android APP Link') }} </label>
                    <input type="text" name="footer_app_link_android" id="footer_app_link_android"
                        class="form-control"
                        value="{{ old('footer_app_link_android', isset($setting?->footer_app_link_android) ? $setting?->footer_app_link_android : '') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="footer_app_link_ios">{{ __('IOS APP Link') }}</label>
                    <input type="text" name="footer_app_link_ios" id="footer_app_link_ios" class="form-control"
                        value="{{ old('footer_app_link_ios', isset($setting?->footer_app_link_ios) ? $setting?->footer_app_link_ios : '') }}">
                </div>
            @endif
            <div class="col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
