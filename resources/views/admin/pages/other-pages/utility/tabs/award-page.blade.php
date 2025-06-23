<div class="tab-pane fade" id="awardPage" role="tabpanel" aria-labelledby="awardPage-tab4">
    <form action="{{ route('admin.page-utility.update', ['code' => $code]) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="award_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="subtitle">{{ __('Award Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="award_title" id="subtitle"
                    value="{{ old('award_title', $utilityPage?->getTranslation($code)?->award_title ?: '') }}"
                    placeholder="{{ __('Award Title') }}" data-translate="true">
            </div>
            <div class="col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
