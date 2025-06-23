<div class="tab-pane fade" id="copyright_text_tab" role="tabpanel">
    <form action="{{ route('admin.update-copyright-text') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">{{ __('Copyright Text') }}<span class="text-danger">*</span></label>
            <textarea name="copyright_text" rows="4" class="form-control h-auto">{{ $setting->copyright_text }}</textarea>
        </div>
        <x-admin.update-button :text="__('Update')"></x-admin.update-button>
    </form>
</div>
