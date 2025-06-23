<form action="{{ route('website.user.update.workout.class', $class->id) }}" class="wsus__dashboard_profile_edit_info"
    method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">{{ __('Title') }}<span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name', $class->name) }}">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="date">{{ __('Date') }}<span class="text-danger">*</span></label>
                <input type="text" id="date" name="date" value="{{ old('date', $class->date) }}"
                    class="datepicker" autocomplete="off">
                @error('date')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="start_at">{{ __('Start At') }}<span class="text-danger">*</span></label>
                <input type="text" id="start_at" name="start_at" value="{{ old('start_at', $class->start_at) }}"
                    class="clockpicker">
                @error('start_at')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="end_at">{{ __('End At') }}<span class="text-danger">*</span></label>
                <input type="text" id="end_at" name="end_at" value="{{ old('end_at', $class->end_at) }}"
                    class="clockpicker">
                @error('end_at')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-xl-12">
            <ul class="d-flex flex-wrap">
                <li>
                    <button type="submit" class="common_btn common_btn_2">{{ __('Update') }}</button>
                </li>
            </ul>
        </div>
    </div>
</form>
