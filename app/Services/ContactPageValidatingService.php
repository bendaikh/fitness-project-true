<?php

namespace App\Services;

class ContactPageValidatingService
{
    public function validateContactPageSection()
    {
        $rules = [
            'address' => 'required|string|max:2000',
            'title' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|string',
            'image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
        ];

        if (request()->code == allLanguages()->first()->code) {
            $rules = [
                'address' => 'required|string|max:2000',
                'title' => 'required|max:255',
                'email' => 'required',
                'phone' => 'required|string',
                'image' => 'nullable|image|mimes:webp,png,jpg,jpeg|max:2048',
            ];
        } else {
            $rules = [
                'title' => 'required|max:255',
            ];
        }

        $messages = [
            'address.required' => 'Please provide an address.',
            'address.string' => 'The address must be a string.',
            'address.max' => 'The address must not exceed 2000 characters.',
            'title.required' => 'Please provide a title.',
            'title.max' => 'The title must not exceed 255 characters.',
            'email.required' => 'Please provide an email.',
            'phone.required' => 'Please provide a phone number.',
            'phone.string' => 'The phone number must be a string.',
            'image.required' => 'Please upload an image.',
            'image.image' => 'The image must be an image file.',
            'image.mimes' => 'Supported formats for the image are: webp, png, jpg, jpeg.',
            'image.max' => 'The image size must not exceed 2048 kilobytes.',
        ];
        return [$rules, $messages];
    }
}
