<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LockerRequest extends FormRequest
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
        return [
            'locker_no' => 'required|unique:lockers,locker_no,' . $this->locker,
            'status' => 'required|in:0,1',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'locker_number.required' => __('Locker number is required'),
            'status.required' => __('Locker status is required'),
            'status.in' => __('Locker status should be Active or Inactive'),
        ];
    }
}
