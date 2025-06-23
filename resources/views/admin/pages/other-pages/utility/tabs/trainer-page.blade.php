<div class="tab-pane fade" id="trainerPage" role="tabpanel" aria-labelledby="trainerPage-tab4">
    <form action="{{ route('admin.page-utility.update', ['code' => $code]) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="trainer_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="subtitle">{{ __('Experience Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="experience_title" id="subtitle"
                    value="{{ old('experience_title', $utilityPage?->getTranslation($code)?->experience_title ?: '') }}"
                    placeholder="{{ __('Experience Title') }}" data-translate="true">
            </div>

            <div class="col-12 form-group">
                <label for="subtitle">{{ __('Time Table Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="time_table_title" id="subtitle"
                    value="{{ old('time_table_title', $utilityPage?->getTranslation($code)?->time_table_title ?: '') }}"
                    placeholder="{{ __('Time Table Title') }}" data-translate="true">
            </div>


            @if ($code === $languages->first()->code)
                <div class="col-md-6">
                    <label>{{ __('Experience Image') }}</label>
                    <div id="experience_image-preview" class="image-preview"
                        @if ($utilityPage?->experience_image) style="background-image: url({{ asset($utilityPage?->experience_image) }}); background-size: cover;
                                    background-position: center center;" @endif>
                        <label for="experience_image-upload"
                            id="experience_image-label">{{ __('Experience Image') }}</label>
                        <input type="file" name="experience_image" id="experience_image-upload">
                    </div>
                </div>
                <div class="col-md-6">
                    <label>{{ __('Class Time Table Image') }}</label>
                    <div id="class_time_image-preview" class="image-preview"
                        @if ($utilityPage?->class_time_image) style="background-image: url({{ asset($utilityPage?->class_time_image) }}); background-size: cover;
                                    background-position: center center;" @endif>
                        <label for="class_time_image-upload"
                            id="class_time_image-label">{{ __('Class Time Table Image') }}</label>
                        <input type="file" name="class_time_image" id="class_time_image-upload">
                    </div>
                </div>
            @endif
            <div class="mt-4 col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
