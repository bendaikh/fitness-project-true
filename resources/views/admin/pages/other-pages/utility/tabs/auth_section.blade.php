<div class="tab-pane fade" id="auth" role="tabpanel" aria-labelledby="auth-tab4">
    <form action="{{ route('admin.page-utility.update', ['code' => $code]) }}" method="post"
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <input type="hidden" name="tab" value="auth_section">
        <div class="row">
            @if ($code === $languages->first()->code)
                <div class="col-md-12">
                    <label>{{ __('Login Image') }}</label>
                    <div id="login-image-icon-preview" class="image-preview"
                        @if ($utilityPage?->login_image) style="background-image: url({{ asset($utilityPage?->login_image) }}); background-size: cover;
                                    background-position: center center;" @endif>
                        <label for="login-image-icon-upload" id="login-image-icon-label">{{ __('Login Image') }}</label>
                        <input type="file" name="login_image" id="login-image-icon-upload">
                    </div>
                </div>
                <div class="col-md-12">
                    <label>{{ __('Register Image') }}</label>
                    <div id="register-image-icon-preview" class="image-preview"
                        @if ($utilityPage?->register_image) style="background-image: url({{ asset($utilityPage?->register_image) }}); background-size: cover; background-position: center center;" @endif>
                        <label for="register-image-icon-upload"
                            id="register-image-icon-label">{{ __('Register Image') }}</label>
                        <input type="file" name="register_image" id="register-image-icon-upload">
                    </div>
                </div>
                <div class="col-md-12">
                    <label>{{ __('Forget Password Image') }}</label>
                    <div id="forget_password_image-preview" class="image-preview"
                        @if ($utilityPage?->forget_password_image) style="background-image: url({{ asset($utilityPage?->forget_password_image) }}); background-size: cover; background-position: center center;" @endif>
                        <label for="forget_password_image-upload"
                            id="forget_password_image-label">{{ __('Forget Password Image') }}</label>
                        <input type="file" name="forget_password_image" id="forget_password_image-upload">
                    </div>
                </div>
                <div class="col-md-12">
                    <label>{{ __('Reset Password Image') }}</label>
                    <div id="reset_password_image-preview" class="image-preview"
                        @if ($utilityPage?->reset_password_image) style="background-image: url({{ asset($utilityPage?->reset_password_image) }}); background-size: cover; background-position: center center;" @endif>
                        <label for="reset_password_image-upload"
                            id="reset_password_image-label">{{ __('Reset Password Image') }}</label>
                        <input type="file" name="reset_password_image" id="reset_password_image-upload">
                    </div>
                </div>
            @endif
            <div class="mt-4 col-md-12">
                <x-admin.update-button :text="__('Update')"></x-admin.update-button>
            </div>
        </div>
    </form>
</div>
