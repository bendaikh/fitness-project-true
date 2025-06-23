<div class="tab-pane fade" id="google_analytic_tab" role="tabpanel">
    <form action="{{ route('admin.update-google-analytic') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">{{ __('Status') }}</label>
            <select name="google_analytic_status" id="tawk_allow" class="form-select">
                <option {{ $setting->google_analytic_status == 'active' ? 'selected' : '' }} value="active">
                    {{ __('Enable') }}</option>
                <option {{ $setting->google_analytic_status == 'inactive' ? 'selected' : '' }} value="inactive">
                    {{ __('Disable') }}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="">{{ __('Analytic Tracking Id') }}</label>
            @if (env('APP_MODE') == 'DEMO')
                <input type="text" class="form-control" name="google_analytic_id" value="ANA-34343434-TEST-ID">
            @else
                <input type="text" class="form-control" name="google_analytic_id"
                    value="{{ $setting->google_analytic_id }}">
            @endif
        </div>

        <x-admin.update-button :text="__('Update')"></x-admin.update-button>
    </form>
</div>
