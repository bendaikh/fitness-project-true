<div class="tab-pane fade" id="site_color_tab" role="tabpanel">
    <form action="{{ route('admin.update-site-color') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('Primary Color') }}</label>
                    <div class="input-group colorpickerinput colorpicker-element" data-colorpicker-id="2">
                        <input type="color" name="primary_color" class="form-control"
                            value="{{ @Cache::get('setting')?->primary_color }}">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>{{ __('Secondary Color') }}</label>
                    <div class="input-group colorpickerinput colorpicker-element" data-colorpicker-id="2">
                        <input type="color" class="form-control" name="secondary_color"
                            value="{{ @Cache::get('setting')?->secondary_color }}">

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ __('Common Color One') }}</label>
                    <div class="input-group colorpickerinput colorpicker-element" data-colorpicker-id="2">
                        <input type="color" class="form-control" name="common_color_one"
                            value="{{ @Cache::get('setting')?->common_color_one }}">

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ __('Common Color Two') }}</label>
                    <div class="input-group colorpickerinput colorpicker-element" data-colorpicker-id="2">
                        <input type="color" class="form-control" name="common_color_two"
                            value="{{ @Cache::get('setting')?->common_color_two }}">

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ __('Common Color Three') }}</label>
                    <div class="input-group colorpickerinput colorpicker-element" data-colorpicker-id="2">
                        <input type="color" class="form-control" name="common_color_three"
                            value="{{ @Cache::get('setting')?->common_color_three }}">

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ __('Common Color Four') }}</label>
                    <div class="input-group colorpickerinput colorpicker-element" data-colorpicker-id="2">
                        <input type="color" class="form-control" name="common_color_four"
                            value="{{ @Cache::get('setting')?->common_color_four }}">

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ __('Common Color Five') }}</label>
                    <div class="input-group colorpickerinput colorpicker-element" data-colorpicker-id="2">
                        <input type="color" class="form-control" name="common_color_five"
                            value="{{ @Cache::get('setting')?->common_color_five }}">

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label>{{ __('Common Color Six') }}</label>
                    <div class="input-group colorpickerinput colorpicker-element" data-colorpicker-id="2">
                        <input type="color" class="form-control" name="common_color_six"
                            value="{{ @Cache::get('setting')?->common_color_six }}">
                    </div>
                </div>
            </div>
        </div>
        <x-admin.update-button :text="__('Update')" class="mt-2"></x-admin.update-button>
    </form>
</div>
