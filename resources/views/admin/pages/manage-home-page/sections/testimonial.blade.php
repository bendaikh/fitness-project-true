<div class="tab-pane fade" id="testimonial" role="tabpanel" aria-labelledby="contact-tab4">
    <form action="{{ route('admin.update-about-content', ['code' => $code]) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="code" value="{{ request()->code }}">
        <input type="hidden" name="home" value="1">
        <input type="hidden" name="tab" value="testimonial_section">
        <div class="row">
            <div class="col-md-6">
                <label>{{ __('Background Image') }}</label>
                <div id="testimonial_image-preview" class="image-preview"
                    @if ($home?->testimonial_image) style="background-image: url({{ asset($home?->testimonial_image) }}); background-size: cover; background-position: center center;" @endif>
                    <label for="testimonial_image-upload" id="testimonial_image-label">{{ __('Image') }}</label>
                    <input type="file" name="testimonial_image" id="testimonial_image-upload" accept="image/*">
                </div>
            </div>
            <div class="mt-4 col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
