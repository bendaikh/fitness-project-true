<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $rules =  [
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required',
            'images' => 'nullable',
            'videos' => 'nullable',
            'training_days' => 'required|numeric',
            'price' => 'required|numeric',
            'capacity' => 'nullable|numeric',
            'status' => 'required|in:0,1',
            'class_count' => 'required|numeric',
            'enroll_start' => 'required|date_format:Y-m-d',
            'enroll_end' => 'required|date_format:Y-m-d|after_or_equal:enroll_start',
            'class_start_date' => 'required|date_format:Y-m-d',
        ];

        if ($this->method() == 'PUT') {
            $rules['image'] = 'nullable';
        }
        if ($this->method() == 'PUT' && $this->code != allLanguages()->first()->code) {
            $rules =  [
                'name' => 'required',
                'slug' => 'nullable',
                'short_description' => 'required',
                'description' => 'required',
                'image' => 'nullable',
                'videos' => 'nullable',
                'training_days' => 'nullable',
                'price' => 'nullable',
                'capacity' => 'nullable|numeric',
                'status' => 'nullable|in:0,1',
                'class_count' => 'nullable',
                'enroll_start' => 'nullable|date_format:Y-m-d',
                'enroll_end' => 'nullable|date_format:Y-m-d|after_or_equal:enroll_start',
                'class_start_date' => 'nullable|date_format:Y-m-d',
            ];
        }
        return $rules;
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'name.required' => __('Workout name is required'),
            'slug.required' => __('Slug is required'),
            'short_description.required' => __('Short description is required'),
            'description.required' => __('Description is required'),
            'training_days.required' => __('Training Duration is required'),
            'training_days.numeric' => __('Training Duration should be a number'),
            'price.required' => __('Price is required'),
            'price.numeric' => __('Price should be a number'),
            'capacity.numeric' => __('Capacity should be a number'),
            'status.required' => __('Status is required'),
            'status.in' => __('Status should be Active or Inactive'),
            'enroll_start.required' => __('Enroll start date is required'),
            'enroll_start.date_format' => __('Enroll start date should be in Y-m-d H:i format'),
            'enroll_start.after_or_equal' => __('Enroll start date should be greater than or equal to today'),
            'enroll_end.required' => __('Enroll end date is required'),
            'enroll_end.date_format' => __('Enroll end date should be in Y-m-d H:i format'),
            'enroll_end.after_or_equal' => __('Enroll end date should be greater than or equal to enroll start date'),
            "class_count.required" => __("Number of Classes is required"),
            "class_count.numeric" => __("Number of Classes should be a number"),
            "class_start_date.required" => __("Class Start Date is required"),
        ];
    }
}
