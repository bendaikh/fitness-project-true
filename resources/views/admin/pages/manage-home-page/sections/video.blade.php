<div class="tab-pane fade" id="video" role="tabpanel" aria-labelledby="contact-tab4">
    <form action="{{ route('admin.update-about-content', ['code' => $code]) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="code" value="{{ request()->code }}">
        <input type="hidden" name="home" value="1">
        <input type="hidden" name="tab" value="video_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="video_section_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="video_section_title" id="video_section_title"
                    value="{{ old('video_section_title', $home?->getTranslation($code)?->video_section_title) }}"
                    placeholder="{{ __('Title') }}" data-translate="true">

                @error('video_section_title')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            @if ($code == $languages->first()->code)
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
                        <label for="video_bg_image-upload"
                            id="video_bg_image-label">{{ __('Background Image') }}</label>
                        <input type="file" name="video_bg_image" id="video_bg_image-upload" accept="image/*">
                    </div>
                </div>
            @endif
            <div class="mt-4 col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
