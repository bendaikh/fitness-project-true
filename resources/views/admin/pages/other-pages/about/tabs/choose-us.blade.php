<div class="tab-pane fade" id="choose-us" role="tabpanel" aria-labelledby="contact-tab4">
    <form action="{{ route('admin.about-page.update', ['code' => $code]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="choose_us_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="choose_us_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="choose_us_title" id="choose_us_title"
                    value="{{ old('choose_us_title', $aboutPage?->getTranslation($code)?->choose_us_title) }}"
                    placeholder="{{ __('Title') }}" data-translate="true">
                @error('choose_us_title')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-12 form-group">
                <label for="choose_us_button_text">{{ __('Button Text') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="choose_us_button_text" id="choose_us_button_text"
                    value="{{ old('choose_us_button_text', $aboutPage?->getTranslation($code)?->choose_us_button_text) }}"
                    placeholder="{{ __('Button Text') }}" data-translate="true">
                @error('choose_us_button_text')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            @if ($code == $languages->first()->code)
                <div class="col-12 form-group">
                    <label for="choose_us_button_link">{{ __('Button Link') }} <small
                            class="text-danger">({{ __('Leave Empty To hide button') }})</small></label>
                    <input type="link" class="form-control" name="choose_us_button_link" id="choose_us_button_link"
                        value="{{ old('choose_us_button_link', $aboutPage?->choose_us_button_link) }}"
                        placeholder="{{ __('Button Link') }}">
                    @error('choose_us_button_link')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            @endif
            <div class="col-12 form-group">
                <label for="choose_us_description">{{ __('Description') }} <span class="text-danger">*</span></label>
                <textarea name="choose_us_description" id="choose_us_description" class="form-control summernote" cols="30"
                    rows="10" placeholder="{{ __('Description') }}" data-translate="true">{{ old('choose_us_description', $aboutPage?->getTranslation($code)?->choose_us_description) }}</textarea>
                @error('choose_us_description')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            @if ($code == $languages->first()->code)
                <div class="col-md-6">
                    <label>{{ __('Why Choose Us Image') }}</label>
                    <div id="choose_us_image_1-preview" class="image-preview"
                        @if ($aboutPage?->choose_us_image_1) style="background-image: url({{ asset($aboutPage?->choose_us_image_1) }}); background-size: cover; background-position: center center;" @endif>
                        <label for="choose_us_image_1-upload"
                            id="choose_us_image_1-label">{{ __('1st Image') }}</label>
                        <input type="file" name="choose_us_image_1" id="choose_us_image_1-upload" accept="image/*">
                    </div>
                </div>
            @endif
            <div class="mt-4 col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
