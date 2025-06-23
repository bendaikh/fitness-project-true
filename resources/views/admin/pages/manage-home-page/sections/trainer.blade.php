<div class="tab-pane fade" id="trainer" role="tabpanel" aria-labelledby="contact-tab4">
    <form action="{{ route('admin.update-about-content', ['code' => $code]) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="code" value="{{ request()->code }}">
        <input type="hidden" name="home" value="1">
        <input type="hidden" name="tab" value="team_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="team_title">{{ __('Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="team_title" id="team_title"
                    value="{{ old('team_title', $home?->getTranslation($code)?->team_title) }}"
                    placeholder="{{ __('Title') }}" data-translate="true">
            </div>
            @if ($code == $languages->first()->code)
                <div class="col-md-6">
                    <label>{{ __('Image') }}</label>
                    <div id="team_bg_image-preview" class="image-preview"
                        @if ($home?->team_bg_image) style="background-image: url({{ asset($home?->team_bg_image) }}); background-size: cover; background-position: center center;" @endif>
                        <label for="team_bg_image-upload" id="team_bg_image-label">{{ __('Image') }}</label>
                        <input type="file" name="team_bg_image" id="team_bg_image-upload" accept="image/*">
                    </div>
                </div>
            @endif
            <div class="mt-4 col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
