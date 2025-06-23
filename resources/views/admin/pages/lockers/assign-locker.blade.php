<div class="modal fade" tabindex="-1" role="dialog" id="assign-locker-{{ $locker->id }}">
    <div class="modal-dialog" role="document">
        <form action="{{ route('admin.locker.assign', $locker->id) }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Assign Locker') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="locker_no">{{ __('Locker No') }}</label>
                                <input type="text" name="locker_no" class="form-control" id="locker_no"
                                    value="{{ $locker->locker_no }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="custom-switch mt-2">
                                <input type="checkbox" name="assign_member" class="custom-switch-input" value="1">
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">{{ __('Assign To a Member?') }}</span>
                            </label>
                        </div>
                        <div class="col-12 d-none member">
                            <div class="form-group">
                                <label for="member_id-{{ $locker->id }}">{{ __('Member') }}</label>
                                <select name="member_id" id="member_id-{{ $locker->id }}" class="form-select select2"
                                    data-control="select2" data-dropdown-parent="#assign-locker-{{ $locker->id }}">
                                    <option>{{ __('Select Member') }}</option>
                                    @foreach ($members as $member)
                                        <option value="{{ $member->id }}">{{ $member?->user?->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <x-admin.save-button :text="__('Save')"></x-admin.save-button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
