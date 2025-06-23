<div class="tab-pane fade show active" id="about_tab" role="tabpanel">
    <form action="{{ route('admin.update-about-content') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="code" value="{{ request()->code }}">
        <input type="hidden" name="home" value="3">
        <input type="hidden" name="tab" value="about_section_home_2">
        <div class="form-group">
            <label for="">{{ __('About Section Title') }}<span class="text-danger">*</span></label>
            <div>
                <input type="text" name="about_us_title" class="form-control"
                    value="{{ $home?->getTranslation($code)?->about_us_title }}" data-translate="true">
            </div>
        </div>

        <div class="form-group">
            <label for="">{{ __('About Button Text') }}<span class="text-danger">*</span></label>
            <div>
                <input type="text" name="about_us_button_text" class="form-control"
                    value="{{ $home?->getTranslation($code)?->about_us_button_text }}" data-translate="true">
            </div>
        </div>
        @if ($code == $languages->first()->code)
            <div class="form-group">
                <label for="">{{ __('About Button Link') }}</label>
                <div>
                    <input type="text" name="about_us_button_link" class="form-control"
                        value="{{ $home?->about_us_button_link }}">
                </div>
            </div>
        @endif
        <div class="col-12 form-group">
            <label for="about_us_description">{{ __('About Us Description') }}<span class="text-danger">*</span></label>
            <textarea name="about_us_description" id="about_us_description" class="form-control height_80" cols="30"
                rows="10" placeholder="{{ __('About Us Description') }}" data-translate="true">{{ old('about_us_description', $home?->getTranslation($code)?->about_us_description) }}</textarea>
        </div>
        @if ($code == $languages->first()->code)
            <div class="form-group">
                <label>{{ __('Image') }}</label>
                <div id="about_us_image-preview" class="image-preview"
                    @if ($home?->about_us_image) style="background-image: url({{ asset($home?->about_us_image) }}); background-size: cover; background-position: center center;" @endif>
                    <label for="about_us_image-upload" id="about_us_image-label">{{ __('Image') }}</label>
                    <input type="file" name="about_us_image" id="about_us_image-upload" accept="image/*">
                </div>
            </div>
        @endif
        <x-admin.update-button :text="__('Update')"></x-admin.update-button>
    </form>
</div>
