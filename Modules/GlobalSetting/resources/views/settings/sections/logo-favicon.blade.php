<div class="tab-pane fade" id="logo_favicon_tab" role="tabpanel">
    <form action="{{ route('admin.update-logo-favicon') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <label>{{ __('Logo') }}</label>
                <div id="logo-preview" class="image-preview"
                    @if (!empty($setting->logo)) style="background-image: url({{ asset($setting->logo) }}); background-size: cover; background-position: center center;" @endif>
                    <label for="logo-upload" id="logo-label">{{ __('Logo') }}</label>
                    <input type="file" name="logo" id="logo-upload">
                </div>
            </div>
            <div class="col-md-6">
                <label>{{ __('Favicon') }}</label>
                <div id="favicon-preview" class="image-preview"
                    @if (!empty($setting->favicon)) style="background-image: url({{ asset($setting->favicon) }}); background-size: cover; background-position: center center;" @endif>
                    <label for="favicon-upload" id="favicon-label">{{ __('Favicon') }}</label>
                    <input type="file" name="favicon" id="favicon-upload">
                </div>
            </div>
            <div class="col-md-6">
                <label>{{ __('Admin Logo') }}</label>
                <div id="admin_logo-preview" class="image-preview"
                    @if (!empty($setting->admin_logo)) style="background-image: url({{ asset($setting->admin_logo) }}); background-size: cover; background-position: center center;" @endif>
                    <label for="admin_logo-upload" id="admin_logo-label">{{ __('Admin Logo') }}</label>
                    <input type="file" name="admin_logo" id="admin_logo-upload">
                </div>
            </div>
            <div class="col-md-6">
                <label>{{ __('Admin Favicon') }}</label>
                <div id="admin_favicon-preview" class="image-preview"
                    @if (!empty($setting->admin_favicon)) style="background-image: url({{ asset($setting->admin_favicon) }}); background-size: cover; background-position: center center;" @endif>
                    <label for="admin_favicon-upload" id="admin_favicon-label">{{ __('Admin Favicon') }}</label>
                    <input type="file" name="admin_favicon" id="admin_favicon-upload">
                </div>
            </div>
        </div>
        <x-admin.update-button :text="__('Update')" class="mt-2"></x-admin.update-button>
    </form>
</div>
