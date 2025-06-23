<div class="tab-pane fade" id="callToActionButton" role="tabpanel" aria-labelledby="callToActionButton-tab4">
    <form action="{{ route('admin.page-utility.update', ['code' => $code]) }}" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="cta_button_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="subtitle">{{ __('Button Text') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="cta_button" id="cta_button"
                    value="{{ old('cta_button', $utilityPage?->getTranslation($code)?->cta_button ?: '') }}"
                    placeholder="{{ __('Button Text') }}" data-translate="true">
            </div>
            <div class="col-12 form-group">
                <label for="subtitle">{{ __('Button Link') }}</label>
                <input type="text" class="form-control" name="cta_link" id="cta_link"
                    value="{{ old('cta_link', $utilityPage?->cta_link ?: '') }}" placeholder="{{ __('Button Link') }}">
            </div>
            <div class="col-12 form-group">
                <label for="subtitle">{{ __('Button Icon') }}</label>
                <input type="text" class="form-control icp icp-auto" name="cta_icon" id="cta_icon"
                    value="{{ old('cta_icon', $utilityPage?->cta_icon ?: '') }}" placeholder="{{ __('Button Icon') }}">
            </div>

            <div class="col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
