<div class="tab-pane fade" id="exercise" role="tabpanel" aria-labelledby="contact-tab4">
    <form action="{{ route('admin.about-page.update', ['code' => $code]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="exercise_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="exercise_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="exercise_title" id="exercise_title"
                    value="{{ old('exercise_title', $aboutPage?->getTranslation($code)?->exercise_title) }}"
                    placeholder="{{ __('Title') }}" data-translate="true">
            </div>

            <div class="col-12 form-group">
                <label for="exercise_description">{{ __('Description') }} <span class="text-danger">*</span></label>
                <textarea name="exercise_description" id="exercise_description" class="form-control summernote" cols="30"
                    rows="10" placeholder="{{ __('Description') }}" data-translate="true">{{ old('exercise_description', $aboutPage?->getTranslation($code)?->exercise_description) }}</textarea>
            </div>
            @if ($code == $languages->first()->code)
                <div class="col-md-6">
                    <label>{{ __('Image') }}</label>
                    <div id="exercise_image-preview" class="image-preview"
                        @if ($aboutPage?->exercise_image) style="background-image: url({{ asset($aboutPage?->exercise_image) }}); background-size: cover; background-position: center center;" @endif>
                        <label for="exercise_image-upload" id="exercise_image-label">{{ __('Image') }}</label>
                        <input type="file" name="exercise_image" id="exercise_image-upload" accept="image/*">
                    </div>
                </div>
            @endif
            <div class="mt-4 col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
