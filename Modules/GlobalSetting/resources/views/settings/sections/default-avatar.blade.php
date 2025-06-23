<div class="tab-pane fade" id="default_avatar_tab" role="tabpanel">
    <form action="{{ route('admin.update-default-avatar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-md-6">
                <label>{{ __('Avatar') }}</label>
                <div id="avatar-preview" class="image-preview"
                    @if (!empty($setting->default_avatar)) style="background-image: url({{ asset($setting->default_avatar) }}); background-size: cover; background-position: center center;" @endif>
                    <label for="avatar-upload" id="avatar-label">{{ __('Avatar') }}</label>
                    <input type="file" name="default_avatar" id="avatar-upload">
                </div>
            </div>
        </div>
        <x-admin.update-button :text="__('Update')" class="mt-2"></x-admin.update-button>
    </form>
</div>
