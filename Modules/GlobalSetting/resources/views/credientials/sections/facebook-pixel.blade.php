<div class="tab-pane fade" id="facebook_pixel_tab" role="tabpanel">
    <form action="{{ route('admin.update-facebook-pixel') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="">{{ __('Status') }}</label>
            <select name="pixel_status" id="tawk_allow" class="form-select">
                <option {{ $setting->pixel_status == 'active' ? 'selected' : '' }} value="active">{{ __('Enable') }}
                </option>
                <option {{ $setting->pixel_status == 'inactive' ? 'selected' : '' }} value="inactive">
                    {{ __('Disable') }}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">{{ __('Facebook App Id') }}</label>
            @if (env('APP_MODE') == 'DEMO')
                <input type="text" value="PIXEL-APP-434334-DEMO-ID" class="form-control" name="pixel_app_id">
            @else
                <input type="text" value="{{ $setting->pixel_app_id }}" class="form-control" name="pixel_app_id">
            @endif


        </div>
        <x-admin.update-button :text="__('Update')"></x-admin.update-button>
    </form>
</div>
