<div class="tab-pane fade active show" id="google_recaptcha_tab" role="tabpanel">
    <form action="{{ route('admin.update-google-captcha') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">{{ __('Status') }}</label>
            <select name="recaptcha_status" id="recaptcha_status" class="form-select">
                <option {{ $setting->recaptcha_status == 'active' ? 'selected' : '' }} value="active">
                    {{ __('Enable') }}</option>
                <option {{ $setting->recaptcha_status == 'inactive' ? 'selected' : '' }} value="inactive">
                    {{ __('Disable') }}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">{{ __('Captcha Site Key') }}</label>
            @if (env('APP_MODE') == 'DEMO')
                <input type="text" class="form-control" name="recaptcha_site_key" value="ZXN39334XKF-SITE-KEY-TEST">
            @else
                <input type="text" class="form-control" name="recaptcha_site_key"
                    value="{{ $setting->recaptcha_site_key }}">
            @endif
        </div>

        <div class="form-group">
            <label for="">{{ __('Captcha Secret Key') }}</label>
            @if (env('APP_MODE') == 'DEMO')
                <input type="text" class="form-control" name="recaptcha_secret_key"
                    value="ZXN39334XKF-SECRET-KEY-TEST">
            @else
                <input type="text" class="form-control" name="recaptcha_secret_key"
                    value="{{ $setting->recaptcha_secret_key }}">
            @endif
        </div>

        <x-admin.update-button :text="__('Update')"></x-admin.update-button>

    </form>
</div>
