<div class="tab-pane fade" id="support-us" role="tabpanel" aria-labelledby="contact-tab4">
    <form action="{{ route('admin.about-page.update', ['code' => $code]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="support_us_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="support_us_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="support_us_title" id="support_us_title"
                    value="{{ old('support_us_title', $aboutPage?->getTranslation($code)?->support_us_title) }}"
                    placeholder="{{ __('Title') }}" data-translate="true">
            </div>
            <div class="col-12 form-group">
                <label for="support_us_button_text">{{ __('Button Text') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="support_us_button_text" id="support_us_button_text"
                    value="{{ old('support_us_button_text', $aboutPage?->getTranslation($code)?->support_us_button_text) }}"
                    placeholder="{{ __('Button Text') }}" data-translate="true">
            </div>
            @if ($code == $languages->first()->code)
                <div class="col-12 form-group">
                    <label for="support_us_button_link">{{ __('Button Link') }} <small
                            class="text-danger">({{ __('Leave Empty To hide button') }})</small></label>
                    <input type="link" class="form-control" name="support_us_button_link" id="support_us_button_link"
                        value="{{ old('support_us_button_link', $aboutPage?->support_us_button_link) }}"
                        placeholder="{{ __('Button Link') }}">
                </div>
                <div class="col-12 form-group">
                    <label for="support_us_video">{{ __('Support Us Video') }}</label>
                    <input type="link" class="form-control" name="support_us_video" id="support_us_video"
                        value="{{ old('support_us_video', $aboutPage?->support_us_video) }}"
                        placeholder="{{ __('Support Us Video') }}">
                </div>
            @endif
            <div class="col-12 form-group">
                <label for="support_us_description">{{ __('Description') }} <span class="text-danger">*</span></label>
                <textarea name="support_us_description" id="support_us_description" class="form-control summernote" cols="30"
                    rows="10" placeholder="{{ __('Description') }}" data-translate="true">{{ old('support_us_description', $aboutPage?->getTranslation($code)?->support_us_description) }}</textarea>
            </div>
            @if ($code == $languages->first()->code)
                <div class="col-md-6">
                    <label>{{ __('Video Background Image') }}</label>
                    <div id="support_us_image-preview" class="image-preview"
                        @if ($aboutPage?->support_us_image) style="background-image: url({{ asset($aboutPage?->support_us_image) }}); background-size: cover; background-position: center center;" @endif>
                        <label for="support_us_image-upload"
                            id="support_us_image-label">{{ __('Background Image') }}</label>
                        <input type="file" name="support_us_image" id="support_us_image-upload" accept="image/*">
                    </div>
                </div>
            @endif
            <div class="mt-4 col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
