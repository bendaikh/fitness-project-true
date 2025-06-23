<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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

        if ($this->method() == 'PUT' && $this->lang_code != allLanguages()->first()->code) {
            return [
                'lang_code' => 'nullable',
                'name' => 'required',
                'short_description' => 'nullable',
                'description' => 'required',
                'additional_information' => 'nullable',
                'tags' => 'nullable',
            ];
        }
        return [
            'categories' => 'required',
            'brand_id' => 'required',
            'slug' => 'required',
            'image' => 'nullable',
            'images' => 'nullable',
            'price' => 'required',
            'tax_id' => 'required',
            'discount' => 'nullable',
            'discount_type' => 'required_if:discount,!=,null',
            'quantity' => 'required|numeric',
            'sku' => 'required',
            'status' => 'required',
            'is_warranty' => 'required',
            'warranty_duration' => 'required_if:is_warranty,=,1',
            'lang_code' => 'nullable',
            'name' => 'required',
            'short_description' => 'nullable',
            'description' => 'required',
            'additional_information' => 'nullable',
            'tags' => 'nullable',
            'meta_title' => 'nullable',
            'meta_keywords' => 'nullable',
            'meta_description' => 'nullable',
        ];
    }
}
