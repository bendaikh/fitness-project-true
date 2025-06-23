<div class="tab-pane fade active show" id="contact" role="tabpanel" aria-labelledby="contact-tab4">
    <form action="{{ route('admin.contact-page.update', ['code' => $code]) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="contact_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="title">{{ __('Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="title" id="title"
                    value="{{ old('title', $contactPage?->getTranslation($code)?->title) }}"
                    placeholder="{{ __('Contact Title') }}" data-translate="true">
            </div>
            @if ($code == $languages->first()->code)
                <div class="col-12 form-group">
                    <label for="address">{{ __('Address') }} <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="address" id="address"
                        value="{{ old('address', $contactPage?->address) }}" placeholder="{{ __('Address') }}">
                </div>
                <div class="col-12 form-group">
                    <label for="email">{{ __('Email') }} <span class="text-danger">*</span></label>
                    <textarea name="email" id="email" class="form-control height_80" cols="30" rows="10"
                        placeholder="{{ __('email') }}">{{ old('email', $contactPage?->email) }}</textarea>
                </div>
                <div class="col-12 form-group">
                    <label for="phone">{{ __('Phone') }} <span class="text-danger">*</span></label>
                    <textarea name="phone" id="phone" class="form-control height_80" cols="30" rows="10"
                        placeholder="{{ __('Phone') }}">{{ old('phone', $contactPage?->phone) }}</textarea>
                </div>
                <div class="col-12 form-group">
                    <label for="map">{{ __('Map') }} <span class="text-danger">*</span></label>

                    <textarea name="map" id="map" class="form-control height_80" cols="30" rows="10"
                        placeholder="{{ __('Map') }}">{{ old('map', $contactPage?->map) }}</textarea>
                </div>
                <div class="col-md-6">
                    <label>{{ __('Contact Image') }}</label>
                    <div id="contact-image-preview" class="image-preview"
                        @if ($contactPage?->image) style="background-image: url({{ asset($contactPage?->image) }}); background-size: cover; background-position: center center;" @endif>
                        <label for="contact-image-upload" id="contact-image-label">{{ __('Contact Image') }}</label>
                        <input type="file" name="image" id="contact-image-upload">
                    </div>
                </div>
            @endif
            <div class="mt-4 col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
