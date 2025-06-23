<div class="tab-pane fade" id="social_login_tab" role="tabpanel">
    <form action="{{ route('admin.update-social-login') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <div class="form-group">
                <label for="">{{ __('Google Status') }}<span class="text-danger">*</span></label>
                <select name="google_login_status" id="tawk_allow" class="form-select">
                    <option {{ $setting->google_login_status == 'active' ? 'selected' : '' }} value="active">
                        {{ __('Enable') }}</option>
                    <option {{ $setting->google_login_status == 'inactive' ? 'selected' : '' }} value="inactive">
                        {{ __('Disable') }}</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="">{{ __('Google Client Id') }}<span class="text-danger">*</span></label>
            @if (env('APP_MODE') == 'DEMO')
                <input type="text" value="GMAIL-ID-34343-DEMO-CLIENT" class="form-control" name="gmail_client_id">
            @else
                <input type="text" value="{{ $setting->gmail_client_id }}" class="form-control"
                    name="gmail_client_id">
            @endif

        </div>

        <div class="form-group">
            <label for="">{{ __('Google Secret Id') }}<span class="text-danger">*</span></label>
            @if (env('APP_MODE') == 'DEMO')
                <input type="text" value="GMAIL-ID-343943-TEST-SECRET" class="form-control" name="gmail_secret_id">
            @else
                <input type="text" value="{{ $setting->gmail_secret_id }}" class="form-control"
                    name="gmail_secret_id">
            @endif

        </div>
        <x-admin.update-button :text="__('Update')"></x-admin.update-button>

    </form>
    <div class="form-group mt-3">
        <label>{{ __('Google Redirect Url') }} <span data-toggle="tooltip"
            data-placement="top" class="fa fa-info-circle text--primary"
            title="{{__('Copy the Gmail login URL and paste it wherever you need to use it.')}}"></span></label>
        <div class="input-group mb-3">
            <input type="text" value="{{route('auth.social.callback', \App\Enums\SocialiteDriverType::GOOGLE->value)}}" id="gmail_redirect_url" class="form-control" readonly>
            <div class="input-group-append">
                <button class="btn btn-dark py-2" id="copyButton" type="button">{{ __('Click to copy') }}</button>
            </div>
        </div>
    </div>
</div>
