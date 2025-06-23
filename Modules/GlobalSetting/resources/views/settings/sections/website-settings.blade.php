<div class="tab-pane fade" id="website_tab" role="tabpanel">
    <form action="{{ route('admin.update-website-setting') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">{{ __('Website Short Description') }}</label>
            <input type="text" name="website_short_description" class="form-control"
                value="{{ isset($setting->website_short_description) ? $setting->website_short_description : '' }}">
        </div>
        <div class="form-group">
            <label for="">{{ __('Phone') }}</label>
            <input type="text" name="website_phone" class="form-control"
                value="{{ isset($setting->website_phone) ? $setting->website_phone : '' }}">
        </div>
        <div class="form-group">
            <label for="">{{ __('Address') }}</label>
            <input type="text" name="website_address" class="form-control"
                value="{{ isset($setting->website_address) ? $setting->website_address : '' }}">
        </div>

        <div class="form-group">
            <label for="">{{ __('Email') }}</label>
            <input type="text" name="website_email" class="form-control"
                value="{{ isset($setting->website_email) ? $setting->website_email : '' }}">
        </div>

        <div class="section-title">{{ __('Social Links') }}</div>
        <div class="form-group">
            <label for="">{{ __('Facebook') }} ({{ __('Url') }})</label>
            <input type="text" name="website_facebook_url" class="form-control"
                value="{{ isset($setting->website_facebook_url) ? $setting->website_facebook_url : '' }}">
        </div>

        <div class="form-group">
            <label for="">{{ __('Instagram') }} ({{ __('Url') }})</label>
            <input type="text" name="website_instagram_url" class="form-control"
                value="{{ isset($setting->website_instagram_url) ? $setting->website_instagram_url : '' }}">
        </div>

        <div class="form-group">
            <label for="">{{ __('Twitter') }} ({{ __('Url') }})</label>
            <input type="text" name="website_twitter_url" class="form-control"
                value="{{ isset($setting->website_twitter_url) ? $setting->website_twitter_url : '' }}">
        </div>

        {{-- linkedin --}}

        <div class="form-group">
            <label for="">{{ __('Linkedin') }} ({{ __('Url') }})</label>
            <input type="text" name="website_linkedin_url" class="form-control"
                value="{{ isset($setting->website_linkedin_url) ? $setting->website_linkedin_url : '' }}">
        </div>

        <x-admin.update-button :text="__('Update')"></x-admin.update-button>

    </form>
</div>
