<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductCategoryRequest extends FormRequest
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
        $rule = [
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_category_translations')->ignore($this->category, 'product_category_id')->where('lang_code', getSessionLanguage()),
            ],
            'slug' => 'required',
            'status' => 'required|boolean',
            'description' => 'nullable',
        ];

        if ($this->method() == 'PUT' && $this->lang_code != allLanguages()->first()->code) {
            $rule['slug'] = 'nullable';
            $rule['status'] = 'nullable';
        }


        return $rule;
    }
}
