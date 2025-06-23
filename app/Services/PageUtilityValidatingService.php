<?php

namespace App\Services;

class PageUtilityValidatingService
{
    public function validateFooterSection()
    {
        $rules = [
            'footer_copyright' => 'required|string|max:255',
        ];

        $messages = [
            'footer_copyright.required' => 'Please provide a copyright.',
            'footer_copyright.string' => 'The copyright must be a string.',
            'footer_copyright.max' => 'The copyright must not exceed 255 characters.',
        ];

        return [$rules, $messages];
    }
    public function validateAuthSection()
    {
        $rules = [
            'login_image' => 'nullable|image|max:1024',
            'register_image' => 'nullable|image|max:1024',
            'forget_password_image' => 'nullable|image|max:1024',
            'reset_password_image' => 'nullable|image|max:1024',
        ];

        $messages = [
            'login_image.required' => __('The login image is required.'),
            'login_image.image' => __('The login image must be an image.'),
            'login_image.max' => __('The login image must not exceed 1 MB.'),

            'register_image.required' => __('The register image is required.'),
            'register_image.image' => __('The register image must be an image.'),
            'register_image.max' => __('The register image must not exceed 1 MB.'),

            'forget_password_image.required' => __('The forget password image is required.'),
            'forget_password_image.image' => __('The forget password image must be an image.'),
            'forget_password_image.max' => __('The forget password image must not exceed 1 MB.'),

            'reset_password_image.required' => __('The reset password image is required.'),
            'reset_password_image.image' => __('The reset password image must be an image.'),
            'reset_password_image.max' => __('The reset password image must not exceed 1 MB.'),
        ];

        return [$rules, $messages];
    }

    public function validateCallToActionSection()
    {
        $rules = [
            'cta_button' => 'required|max:1024',
            'cta_link' => 'nullable|string|max:255',
            'cta_icon' => 'nullable|string|max:255',
        ];
        $messages = [
            'cta_button.required' => 'The call to action button is required.',
            'cta_button.image' => 'The call to action button must be an image.',
            'cta_button.max' => 'The call to action button must not exceed 1 MB.',
            'cta_link.string' => 'The call to action link must be a string.',
            'cta_link.max' => 'The call to action link must not exceed 255 characters.',
            'cta_icon.string' => 'The call to action icon must be a string.',
            'cta_icon.max' => 'The call to action icon must not exceed 255 characters.',
        ];

        return [$rules, $messages];
    }


    public function validateTrainerSection()
    {

        $rules = [
            'experience_title' => 'required|string|max:255',
            'time_table_title' => 'required|string|max:255',
        ];
        $messages = [
            'experience_title.required' => 'The experience title is required.',
            'experience_title.string' => 'The experience title must be a string.',
        ];
        return [$rules, $messages];
    }
    public function validateServiceSection()
    {
        $rules = [
            'service_title' => 'required|string|max:255',
        ];
        $messages = [
            'service_title.required' => 'The Service title is required.',
        ];
        return [$rules, $messages];
    }
    public function validateAwardSection()
    {
        $rules = [
            'award_title' => 'required|string|max:255',
        ];
        $messages = [
            'award_title.required' => 'The Award title is required.',
        ];
        return [$rules, $messages];
    }
    public function validateFaqSection()
    {
        $rules = [
            'faq_title' => 'required|string|max:255',
        ];
        $messages = [
            'faq_title.required' => 'The Faq title is required.',
        ];
        return [$rules, $messages];
    }
    public function validateMemberSection()
    {
        $rules = [
            'membership_title' => 'required|string|max:255',
        ];
        $messages = [
            'membership_title.required' => 'The Membership title is required.',
        ];
        return [$rules, $messages];
    }
}
