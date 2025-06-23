<div class="tab-pane fade" id="tawk_chat_tab" role="tabpanel">
    <form action="{{ route('admin.update-tawk-chat') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="">{{ __('Status') }}</label>
            <select name="tawk_status" id="tawk_status" class="form-select">
                <option {{ $setting->tawk_status == 'active' ? 'selected' : '' }} value="active">{{ __('Enable') }}
                </option>
                <option {{ $setting->tawk_status == 'inactive' ? 'selected' : '' }} value="inactive">{{ __('Disable') }}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label for="">{{ __('Tawk Chat Link') }}</label>
            @if (env('APP_MODE') == 'DEMO')
                <input type="text" class="form-control" name="tawk_chat_link"
                    value="https://www.tawk.to/demo-link/34893439">
            @else
                <input type="text" class="form-control" name="tawk_chat_link" value="{{ $setting->tawk_chat_link }}">
            @endif

        </div>

        <x-admin.update-button :text="__('Update')"></x-admin.update-button>
    </form>
</div>
