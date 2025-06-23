<?php

namespace App\Http\Requests;

use App\Models\Trainer;
use Illuminate\Foundation\Http\FormRequest;

class TrainerRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:4',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image',
            'specialty_id' => 'required|exists:specialists,id',
            'description' => 'nullable|string',
            'gender' => 'nullable|string',
            'hours_per_week' => 'nullable|integer',
            'facebook_link' => 'nullable|url',
            'facebook_icon' => 'nullable|string',
            'twitter_link' => 'nullable|url',
            'twitter_icon' => 'nullable|string',
            'instagram_link' => 'nullable|url',
            'instagram_icon' => 'nullable|string',
            'status' => 'required|in:0,1',
            'skills' => 'nullable',
        ];

        if ($this->method() == 'PUT') {
            $trainer = Trainer::find($this->trainer);
            $rules['email'] = 'required|email|unique:users,email,' . $trainer->user->id;
            $rules['password'] = 'nullable|string|min:4';
            $rules['image'] = 'nullable|image';
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
            'name.required' => __('Name is required'),
            'email.required' => __('Email is required'),
            'email.email' => __('Email is invalid'),
            'email.unique' => __('Email is already taken'),
            'password.required' => __('Password is required'),
            'password.min' => __('Password must be at least 8 characters'),
            'phone.required' => __('Phone is required'),
            'address.required' => __('Address is required'),
            'specialty_id.required' => __('Specialty is required'),
            'specialty_id.exists' => __('Specialty is invalid'),
            'status.required' => __('Status is required'),
            'status.in' => __('Status is invalid'),
        ];
    }
}
