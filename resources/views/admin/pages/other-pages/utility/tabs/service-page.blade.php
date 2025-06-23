<div class="tab-pane fade" id="servicePage" role="tabpanel" aria-labelledby="servicePage-tab4">
    <form action="{{ route('admin.page-utility.update', ['code' => $code]) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="service_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="subtitle">{{ __('Service Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="service_title" id="subtitle"
                    value="{{ old('service_title', $utilityPage?->getTranslation($code)?->service_title ?: '') }}"
                    placeholder="{{ __('Service Title') }}" data-translate="true">
            </div>
            <div class="col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
