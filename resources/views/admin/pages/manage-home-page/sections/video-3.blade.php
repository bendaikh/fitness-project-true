<div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="contact-tab4">
    <form action="{{ route('admin.update-about-content', ['code' => $code]) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="code" value="{{ request()->code }}">
        <input type="hidden" name="home" value="3">
        <input type="hidden" name="tab" value="video_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="video_button_link">{{ __('Video Link') }}</label>
                <input type="link" class="form-control" name="video_button_link" id="video_button_link"
                    value="{{ old('video_button_link', $home?->video_button_link) }}"
                    placeholder="{{ __('Video Link') }}">
            </div>
            <div class="col-md-6">
                <label>{{ __('Video Background Image') }}</label>
                <div id="video_bg_image-preview" class="image-preview"
                    @if ($home?->video_bg_image) style="background-image: url({{ asset($home?->video_bg_image) }}); background-size: cover; background-position: center center;" @endif>
                    <label for="video_bg_image-upload" id="video_bg_image-label">{{ __('Background Image') }}</label>
                    <input type="file" name="video_bg_image" id="video_bg_image-upload" accept="image/*">
                </div>
            </div>
            <div class="mt-4 col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
