<div class="tab-pane fade active show" id="contact" role="tabpanel" aria-labelledby="contact-tab4">
    <form action="{{ route('admin.about-page.update', ['code' => $code]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="about_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="title">{{ __('Watermark') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="title" id="title"
                    value="{{ old('title', $aboutPage?->getTranslation($code)?->title) }}"
                    placeholder="{{ __('Title') }}" data-translate="true">
                @error('title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 form-group">
                <label for="about_us_title">{{ __('About Us Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="about_us_title" id="about_us_title"
                    value="{{ old('about_us_title', $aboutPage?->getTranslation($code)?->about_us_title) }}"
                    placeholder="{{ __('About Us Title') }}" data-translate="true">
                @error('about_us_title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 form-group">
                <label for="about_us_button_text">{{ __('Button Text') }}</label>
                <input type="text" class="form-control" name="about_us_button_text" id="about_us_button_text"
                    value="{{ old('about_us_button_text', $aboutPage?->getTranslation($code)?->about_us_button_text) }}"
                    placeholder="{{ __('About Us Button Text') }}" data-translate="true">
                @error('about_us_button_text')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            @if ($code == $languages->first()->code)
                <div class="col-12 form-group">
                    <label for="about_us_button_link">{{ __('Button Link') }} <small
                            class="text-danger">({{ __('Leave Empty To hide button') }})</small> </label>
                    <input type="link" class="form-control" name="about_us_button_link" id="about_us_button_link"
                        value="{{ old('about_us_button_link', $aboutPage?->about_us_button_link) }}"
                        placeholder="{{ __('About Us Link') }}">
                    @error('about_us_button_link')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            @endif
            <div class="col-12 form-group">
                <label for="about_us_description">{{ __('About Us Description') }} <span
                        class="text-danger">*</span></label>
                <textarea name="about_us_description" id="about_us_description" class="form-control summernote" cols="30"
                    rows="10" placeholder="{{ __('About Us Description') }}" data-translate="true">{{ old('about_us_description', $aboutPage?->getTranslation($code)?->about_us_description) }}</textarea>
                @error('about_us_description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            @if ($code == $languages->first()->code)
                <div class="col-md-6">
                    <label>{{ __('About Us Image') }}</label>
                    <div id="contact-image-preview" class="image-preview"
                        @if ($aboutPage?->about_us_image) style="background-image: url({{ asset($aboutPage?->about_us_image) }}); background-size: cover; background-position: center center;" @endif>
                        <label for="contact-image-upload" id="contact-image-label">{{ __('About Us Image') }}</label>
                        <input type="file" name="image" id="contact-image-upload" accept="image/*">
                    </div>
                </div>
            @endif
            <div class="mt-4 col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
