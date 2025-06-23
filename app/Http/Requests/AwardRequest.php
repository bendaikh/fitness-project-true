<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AwardRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required',
            'date' => 'required|date',
            'type' => 'required|in:winner,runner_up,participation',
            'status' => 'required|boolean',
        ];

        if ($this->method() == 'PUT') {
            $rules['image'] = 'nullable';
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
            'name.required' => 'Award name is required',
            'name.string' => 'Award name must be a string',
            'name.max' => 'Award name must not be greater than 255 characters',
            'description.string' => 'Award description must be a string',
            'date.required' => 'Award date is required',
            'date.date' => 'Award date must be a date',
            'type.required' => 'Award type is required',
            'type.in' => 'Award type must be winner, runner_up or participation',
            'status.required' => 'Award status is required',
            'status.boolean' => 'Award status must be a boolean',
        ];
    }
}
