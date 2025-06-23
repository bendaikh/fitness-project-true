<div class="tab-pane fade" id="shopPage" role="tabpanel" aria-labelledby="shopPage-tab4">
    <form action="{{ route('admin.page-utility.update', ['code' => $code]) }}" method="post">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="shop_page">
        <div class="row">
            <div class="col-12 form-group">
                <label for="subtitle">{{ __('Filter Maximum price range') }} <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="price_range" id="price_range"
                    value="{{ old('price_range', $utilityPage?->price_range ?: 20000) }}"
                    placeholder="{{ __('Filter Maximum price range') }}">
            </div>
            <div class="col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
