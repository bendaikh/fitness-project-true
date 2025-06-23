<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BrandRequest extends FormRequest
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
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_brand_translations')->ignore($this->brand, 'product_brand_id')->where('lang_code', getSessionLanguage()),
            ],
            'slug' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|boolean',
        ];

        if ($this->method() == 'PUT' && $this->lang_code != allLanguages()->first()->code) {
            $rules['slug'] = 'nullable';
            $rules['status'] = 'nullable';
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
            'name.required' => __('Brand name is required'),
            'name.string' => __('Brand name must be a string'),
            'name.max' => __('Brand name must not be greater than 255 characters'),
            'name.unique' => __('Brand name already exists'),
            'slug.required' => __('Brand slug is required'),
            'slug.string' => __('Brand slug must be a string'),
            'slug.max' => __('Brand slug must not be greater than 255 characters'),
            'description.string' => __('Brand description must be a string'),
            'status.required' => __('Brand status is required'),
            'status.boolean' => __('Brand status must be a boolean'),
        ];
    }
}
