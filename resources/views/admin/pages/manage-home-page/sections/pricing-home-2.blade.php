<div class="tab-pane fade" id="pricing_tab" role="tabpanel">
    <form action="{{ route('admin.update-about-content') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="code" value="{{ request()->code }}">
        <input type="hidden" name="home" value="2">
        <input type="hidden" name="tab" value="pricing_section_home_2">
        <div class="form-group">
            <label for="">{{ __('Pricing Title') }}<span class="text-danger">*</span></label>
            <div>
                <input type="text" name="pricing_title" class="form-control"
                    value="{{ $home?->getTranslation($code)?->pricing_title }}" data-translate="true">
            </div>
        </div>

        <div class="form-group">
            <label for="pricing_description">{{ __('Pricing Description') }} <span class="text-danger">*</span></label>
            <textarea name="pricing_description" id="pricing_description" class="form-control summernote" cols="30"
                rows="10" placeholder="{{ __('About Us Description') }}" data-translate="true">{{ old('pricing_description', $home?->getTranslation($code)?->pricing_description) }}</textarea>
        </div>
        @if ($code == $languages->first()->code)
            <div class="form-group">
                <label>{{ __('Background Image') }}</label>
                <div id="pricing_image-preview" class="image-preview"
                    @if ($home?->pricing_image) style="background-image: url({{ asset($home?->pricing_image) }}); background-size: cover; background-position: center center;" @endif>
                    <label for="pricing_image-upload" id="pricing_image-label">{{ __('Image') }}</label>
                    <input type="file" name="pricing_image" id="pricing_image-upload" accept="image/*">
                </div>
            </div>
        @endif
        <x-admin.update-button :text="__('Update')"></x-admin.update-button>
    </form>
</div>
