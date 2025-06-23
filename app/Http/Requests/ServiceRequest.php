<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            "title" => "required",
            "slug" => "required",
            "tags" => 'nullable',
            "status" => "required",
            "short_description" => "nullable",
            "description" => "nullable",
            "image" => "required",
        ];
        if ($this->method() == 'PUT') {
            $rules["image"] = "nullable";
        }
        if ($this->method() == 'PUT' && $this->code != allLanguages()->first()->code) {
            $rules =  [
                "title" => "required",
                "slug" => "nullable",
                "status" => "nullable",
                "short_description" => "nullable",
                "description" => "nullable",
            ];
        }
        return $rules;
    }
}
