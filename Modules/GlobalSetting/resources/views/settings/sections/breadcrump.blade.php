<div class="tab-pane fade" id="breadcrump_img_tab" role="tabpanel">
    <form action="{{ route('admin.update-breadcrumb') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">

            <div class="col-md-6">
                <label>{{ __('Breadcrumb Image') }}</label>
                <div id="breadcrumb-preview" class="image-preview"
                    @if (!empty($setting->breadcrumb_image)) style="background-image: url({{ asset($setting->breadcrumb_image) }}); background-size: cover; background-position: center center;" @endif>
                    <label for="breadcrumb-upload" id="breadcrumb-label">{{ __('Breadcrumb Image') }}</label>
                    <input type="file" name="breadcrumb_image" id="breadcrumb-upload">
                </div>
            </div>
        </div>
        <x-admin.update-button :text="__('Update')" class="mt-2"></x-admin.update-button>
    </form>
</div>
