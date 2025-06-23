<div class="tab-pane fade" id="faqPage" role="tabpanel" aria-labelledby="faqPage-tab4">
    <form action="{{ route('admin.page-utility.update', ['code' => $code]) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="faq_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="subtitle">{{ __('Faq Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="faq_title" id="subtitle"
                    value="{{ old('faq_title', $utilityPage?->getTranslation($code)?->faq_title ?: '') }}"
                    placeholder="{{ __('Faq Title') }}" data-translate="true">
            </div>
            <div class="col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
