<?php

namespace App\Services;

class HomepageValidatingService
{
    public function validateAboutSection($request): array
    {
        $rules = [
            'code' => 'required|string|exists:languages,code',

            'about_us_title' => 'required|string|max:190',
            'about_us_inner_title' => 'required|string|max:190',
            'about_us_sub_title' => 'required|string|max:190',
            'about_us_description_list' => 'required|max:190',
            'about_us_button_text' => 'required|string|max:190',
            'image' => 'nullable|array',
            'about_us_bg_shape_1' => 'nullable|image',
            'about_us_bg_shape_2' => 'nullable|image',
            'about_us_button_link' => 'nullable',
        ];

        $messages = [
            'code.required' => __('The code field is required for updates.'),
            'code.string' => __('The code must be a string.'),
            'code.exists' => __('The selected code is invalid.'),
            'about_us_title.required' => __('Please provide a About title.'),
            'about_us_title.string' => __('The About title must be a string.'),
            'about_us_title.max' => __('The About title must not exceed 190 characters.'),
            'about_us_inner_title.required' => __('Please provide a title.'),
            'about_us_inner_title.string' => __('The inner title must be a string.'),
            'about_us_inner_title.max' => __('The title must not exceed 190 characters.'),
            'about_us_sub_title.required' => __('Please provide a sub title.'),
            'about_us_sub_title.string' => __('The sub title must be a string.'),
            'about_us_sub_title.max' => __('The sub title must not exceed 190 characters.'),
            'about_us_description_list.required' => __('Please provide a description list.'),
            'about_us_description_list.max' => __('Description list must not exceed 190 characters.'),
            'about_us_button_text.required' => __('The Button text is required.'),
            'about_us_button_text.string' => __('The Button text must be a string.'),
            'about_us_button_text.max' => __('The Button text must not exceed 190 characters.'),
            'image.array' => __('The images must be an array.'),
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

    public function validateRatingSection($request): array
    {
        $rules = [
            'code' => 'required|string|exists:languages,code',
            'rating_section_title' => 'required|string|max:190',
            'rating_section_subtitle' => 'required|string|max:1000',
            'rating_section_image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
        ];

        $messages = [
            'code.required' => __('The code field is required for updates.'),
            'code.string' => __('The code must be a string.'),
            'code.exists' => __('The selected code is invalid.'),
            'rating_section_title.required' => __('Please provide a title.'),
            'rating_section_title.string' => __('The title must be a string.'),
            'rating_section_title.max' => __('The title must not exceed 190 characters.'),

            'rating_section_subtitle.required' => __('Please provide a subtitle.'),
            'rating_section_subtitle.string' => __('The subtitle must be a string.'),
            'rating_section_subtitle.max' => __('The subtitle must not exceed 1000 characters.'),

            'rating_section_image.required' => __('Please upload a image.'),
            'rating_section_image.image' => __('The image must be an image file.'),
            'rating_section_image.mimes' => __('Supported formats for the image are: webp, png, jpg, jpeg.'),
            'rating_section_image.max' => __('The image size must not exceed 2048 kilobytes.'),
        ];

        return [$rules, $messages];
    }

    public function validateFeatureSection($request): array
    {
        $rules = [
            'code' => 'required|string|exists:languages,code',
            'feature_section_title' => 'required|string|max:190',
            'feature_section_subtitle' => 'required|string|max:1000',
            'feature_section_element_1_title' => 'required|string|max:190',
            'feature_section_element_1_subtitle' => 'required|string|max:1000',
            'feature_section_element_2_title' => 'required|string|max:190',
            'feature_section_element_2_subtitle' => 'required|string|max:1000',
            'feature_section_element_3_title' => 'required|string|max:190',
            'feature_section_element_3_subtitle' => 'required|string|max:1000',
            'feature_section_element_4_title' => 'required|string|max:190',
            'feature_section_element_4_subtitle' => 'required|string|max:1000',
            'feature_section_element_1_icon' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
            'feature_section_element_2_icon' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
            'feature_section_element_3_icon' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
            'feature_section_element_4_icon' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
        ];

        $messages =
            [
                'code.required' => __('The language code is required.'),
                'code.string' => __('The language code must be a string.'),
                'code.exists' => __('The selected language code is invalid.'),

                'feature_section_title.required' => __('The title is required.'),
                'feature_section_title.string' => __('The title must be a string.'),
                'feature_section_title.max' => __('The title must not exceed 190 characters.'),

                'feature_section_subtitle.required' => __('The subtitle is required.'),
                'feature_section_subtitle.string' => __('The subtitle must be a string.'),
                'feature_section_subtitle.max' => __('The subtitle must not exceed 1000 characters.'),

                'feature_section_element_1_title.required' => __('The title is required.'),
                'feature_section_element_1_title.string' => __('The title must be a string.'),
                'feature_section_element_1_title.max' => __('The title must not exceed 190 characters.'),

                'feature_section_element_1_subtitle.required' => __('The subtitle is required.'),
                'feature_section_element_1_subtitle.string' => __('The subtitle must be a string.'),
                'feature_section_element_1_subtitle.max' => __('The subtitle must not exceed 1000 characters.'),

                'feature_section_element_2_title.required' => __('The title is required.'),
                'feature_section_element_2_title.string' => __('The title must be a string.'),
                'feature_section_element_2_title.max' => __('The title must not exceed 190 characters.'),

                'feature_section_element_2_subtitle.required' => __('The subtitle is required.'),
                'feature_section_element_2_subtitle.string' => __('The subtitle must be a string.'),
                'feature_section_element_2_subtitle.max' => __('The subtitle must not exceed 1000 characters.'),

                'feature_section_element_3_title.required' => __('The title is required.'),
                'feature_section_element_3_title.string' => __('The title must be a string.'),
                'feature_section_element_3_title.max' => __('The title must not exceed 190 characters.'),

                'feature_section_element_3_subtitle.required' => __('The subtitle is required.'),
                'feature_section_element_3_subtitle.string' => __('The subtitle must be a string.'),
                'feature_section_element_3_subtitle.max' => __('The subtitle must not exceed 1000 characters.'),

                'feature_section_element_4_title.required' => __('The title is required.'),
                'feature_section_element_4_title.string' => __('The title must be a string.'),
                'feature_section_element_4_title.max' => __('The title must not exceed 190 characters.'),

                'feature_section_element_4_subtitle.required' => __('The subtitle is required.'),
                'feature_section_element_4_subtitle.string' => __('The subtitle must be a string.'),
                'feature_section_element_4_subtitle.max' => __('The subtitle must not exceed 1000 characters.'),

                'feature_section_element_1_icon.nullable' => __('The icon must be an image file (webp, png, jpg, jpeg) with a maximum size of 2048 kilobytes.'),
                'feature_section_element_2_icon.nullable' => __('The icon must be an image file (webp, png, jpg, jpeg) with a maximum size of 2048 kilobytes.'),
                'feature_section_element_3_icon.nullable' => __('The icon must be an image file (webp, png, jpg, jpeg) with a maximum size of 2048 kilobytes.'),
                'feature_section_element_4_icon.nullable' => __('The icon must be an image file (webp, png, jpg, jpeg) with a maximum size of 2048 kilobytes.'),
            ];

        return [$rules, $messages];
    }

    public function validateListingSection($request): array
    {
        $rules = [
            'code' => 'required|string|exists:languages,code',
            'listing_section_title' => 'required|string|max:190',
            'listing_section_subtitle' => 'required|string|max:1000',
        ];

        $messages = [
            'code.required' => __('The code field is required for updates.'),
            'code.string' => __('The code must be a string.'),
            'code.exists' => __('The selected code is invalid.'),
            'listing_section_title.required' => __('Please provide a title.'),
            'listing_section_title.string' => __('The title must be a string.'),
            'listing_section_title.max' => __('The title must not exceed 190 characters.'),

            'listing_section_subtitle.required' => __('Please provide a subtitle.'),
            'listing_section_subtitle.string' => __('The subtitle must be a string.'),
            'listing_section_subtitle.max' => __('The subtitle must not exceed 1000 characters.'),
        ];

        return [$rules, $messages];
    }



    public function validateCounterSection($request): array
    {
        $rules = [
            'code' => 'required|string|exists:languages,code',
            'counter_section_link' => 'required|string|max:190',
            'counter_section_image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
        ];

        $messages = [
            'code.required' => __('The code field is required for updates.'),
            'code.string' => __('The code must be a string.'),
            'code.exists' => __('The selected code is invalid.'),

            'counter_section_link.required' => __('Please provide a link.'),
            'counter_section_link.string' => __('The title must be a string.'),
            'counter_section_link.max' => __('The title must not exceed 190 characters.'),

            'counter_section_image.required' => __('Please upload a image.'),
            'counter_section_image.image' => __('The image must be an image file.'),
            'counter_section_image.mimes' => __('Supported formats for the image are: webp, png, jpg, jpeg.'),
            'counter_section_image.max' => __('The image size must not exceed 2048 kilobytes.'),
        ];

        return [$rules, $messages];
    }

    public function validateNewsSection($request): array
    {
        $rules = [
            'code' => 'required|string|exists:languages,code',
            'news_section_title' => 'required|string|max:190',
            'news_section_subtitle' => 'required|string|max:1000',
        ];

        $messages = [
            'code.required' => __('The code field is required for updates.'),
            'code.string' => __('The code must be a string.'),
            'code.exists' => __('The selected code is invalid.'),

            'news_section_title.required' => __('Please provide a title.'),
            'news_section_title.string' => __('The title must be a string.'),
            'news_section_title.max' => __('The title must not exceed 190 characters.'),

            'news_section_subtitle.required' => __('Please provide a subtitle.'),
            'news_section_subtitle.string' => __('The subtitle must be a string.'),
            'news_section_subtitle.max' => __('The subtitle must not exceed 1000 characters.'),
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





    public function validateAboutHome2Section()
    {
        $rules = [
            'about_us_title' => 'required|string|max:190',
            'about_us_description' => 'required',
            'about_us_button_text' => 'required|string|max:190',
            'about_us_image' => 'nullable|image',
            'about_us_button_link' => 'nullable',
        ];
        $messages = [
            'about_us_title.required' => 'Please provide a title.',
            'about_us_title.string' => 'The title must be a string.',
            'about_us_title.max' => 'The title must not exceed 190 characters.',
            'about_us_description.required' => 'Please provide a description.',
            'about_us_description.max' => 'The description must not exceed 190 characters.',
            'about_us_button_text.required' => 'Please provide a button text.',
            'about_us_button_text.string' => 'The button text must be a string.',
            'about_us_button_text.max' => 'The button text must not exceed 190 characters.',
            'about_us_image.required' => 'Please upload an image.',
            'about_us_image.image' => 'The image must be an image file.',
            'about_us_button_link.nullable' => 'The button link must be a string.',
        ];

        return [$rules, $messages];
    }

    public function validatePricingHome2Section()
    {
        $rules = [
            'pricing_title' => 'required|string|max:190',
            'pricing_description' => 'required|string',
            'pricing_image' => 'nullable|image',
        ];

        $messages = [
            'pricing_title.required' => 'Please provide a title.',
            'pricing_title.string' => 'The title must be a string.',
            'pricing_title.max' => 'The title must not exceed 190 characters.',
            'pricing_description.required' => 'Please provide a description.',
            'pricing_description.string' => 'The description must be a string.',
            'pricing_description.max' => 'The description must not exceed 190 characters.',
            'pricing_image.required' => 'Please upload an image.',
            'pricing_image.image' => 'The image must be an image file.',
        ];

        return [$rules, $messages];
    }

    public function validateVideoSection()
    {

        $rules = [
            // 'video_section_title' => 'required',
        ];

        $messages = [
            'video_section_title.required' => 'Please provide a title.',
        ];

        return [$rules, $messages];
    }
}
