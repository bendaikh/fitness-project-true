<div class="tab-pane fade" id="membershipPage" role="tabpanel" aria-labelledby="membershipPage-tab4">
    <form action="{{ route('admin.page-utility.update', ['code' => $code]) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="membership_section">
        <div class="row">
            <div class="col-12 form-group">
                <label for="subtitle">{{ __('Membership Title') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="membership_title" id="subtitle"
                    value="{{ old('membership_title', $utilityPage?->getTranslation($code)?->membership_title ?: '') }}"
                    placeholder="{{ __('Membership Title') }}" data-translate="true">
            </div>
            <div class="col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
