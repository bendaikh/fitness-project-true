<?php

namespace App\Services;

class AboutPageValidatingService
{
    public function validateAboutPageSection()
    {
        $rules = [
            'title' => 'required|max:255',
            'about_us_title' => 'required',
            'about_us_description' => 'required',
            'image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
        ];

        $messages = [
            'title.required' => 'Please Watermark title.',
            'title.max' => 'The Watermark must not exceed 255 characters.',
            'about_us_title.required' => 'Please provide an about us title.',
            'about_us_description.required' => 'Please provide an about us description.',
            'image.required' => 'Please upload an image.',
            'image.image' => 'The image must be an image file.',
            'image.mimes' => 'Supported formats for the image are: webp, png, jpg, jpeg.',
            'image.max' => 'The image size must not exceed 2048 kilobytes.',
        ];
        return [$rules, $messages];
    }


    public function validateChooseUsSection()
    {
        $rules = [
            'choose_us_title' => 'required',
            'choose_us_description' => 'required',
            'choose_us_button_text' => 'required',
            'choose_us_image_1' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
            'choose_us_image_2' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
        ];

        $messages = [
            'choose_us_title.required' => 'Please provide a choose us title.',
            'choose_us_description.required' => 'Please provide a choose us description.',
            'choose_us_button_text.required' => 'Please provide a choose us button text.',
            'choose_us_image_1.required' => 'Please upload an image.',
            'choose_us_image_1.image' => 'The image must be an image file.',
            'choose_us_image_1.mimes' => 'Supported formats for the image are: webp, png, jpg, jpeg.',
            'choose_us_image_1.max' => 'The image size must not exceed 2048 kilobytes.',
            'choose_us_image_2.required' => 'Please upload an image.',
            'choose_us_image_2.image' => 'The image must be an image file.',
            'choose_us_image_2.mimes' => 'Supported formats for the image are: webp, png, jpg, jpeg.',
            'choose_us_image_2.max' => 'The image size must not exceed 2048 kilobytes.',
        ];
        return [$rules, $messages];
    }
    public function validateSupportUsSection()
    {
        $rules = [
            'support_us_title' => 'required',
            'support_us_description' => 'required',
            'support_us_button_text' => 'required',
            'support_us_image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
        ];

        $messages = [
            'support_us_title.required' => 'Please provide a support us title.',
            'support_us_description.required' => 'Please provide a support us description.',
            'support_us_button_text.required' => 'Please provide a support us button text.',
            'support_us_image.required' => 'Please upload an image.',
            'support_us_image.image' => 'The image must be an image file.',
            'support_us_image.mimes' => 'Supported formats for the image are: webp, png, jpg, jpeg.',
            'support_us_image.max' => 'The image size must not exceed 2048 kilobytes.',
        ];
        return [$rules, $messages];
    }
    public function validateExerciseSection()
    {
        $rules = [
            'exercise_title' => 'required',
            'exercise_description' => 'required',
            'exercise_image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
        ];

        $messages = [
            'exercise_title.required' => 'Please provide a exercise title.',
            'exercise_description.required' => 'Please provide a exercise description.',
            'exercise_image.required' => 'Please upload an image.',
            'exercise_image.image' => 'The image must be an image file.',
            'exercise_image.mimes' => 'Supported formats for the image are: webp, png, jpg, jpeg.',
            'exercise_image.max' => 'The image size must not exceed 2048 kilobytes.',
        ];
        return [$rules, $messages];
    }
    public function validateTeamSection()
    {
        $rules = [
            'team_title' => 'required',
            'team_image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
        ];

        $messages = [
            'team_title.required' => 'Please provide a team title.',
            'team_image.required' => 'Please upload an image.',
            'team_image.image' => 'The image must be an image file.',
            'team_image.mimes' => 'Supported formats for the image are: webp, png, jpg, jpeg.',
            'team_image.max' => 'The image size must not exceed 2048 kilobytes.',
        ];
        return [$rules, $messages];
    }
    public function validateTestimonialSection()
    {
        $rules = [
            'testimonial_image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
        ];

        $messages = [
            'testimonial_image.required' => 'Please upload an image.',
            'testimonial_image.image' => 'The image must be an image file.',
            'testimonial_image.mimes' => 'Supported formats for the image are: webp, png, jpg, jpeg.',
            'testimonial_image.max' => 'The image size must not exceed 2048 kilobytes.',
        ];
        return [$rules, $messages];
    }
}
