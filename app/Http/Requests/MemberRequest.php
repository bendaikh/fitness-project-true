<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
        $threeYearsAgo = Carbon::now()->subDays(356 * 3)->toDateString();

        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'phone' => 'required',
            'address' => 'nullable',
            'locker_no' => 'nullable|unique:members,locker_no,' . $this->id,
            'gender' => 'required|in:male,female,other',
            'dob' => ['nullable', 'date', 'before_or_equal:' . $threeYearsAgo],
            'height' => 'nullable|numeric',
            'weight' => 'nullable|numeric',
            'chest' => 'nullable|numeric',
            'waist' => 'nullable|numeric',
            'thigh' => 'nullable|numeric',
            'amount' => 'nullable|numeric',
            'plan_id' => 'nullable|numeric',
            'trial_start_date' => 'nullable|date|after_or_equal:today',
            'trial_end_date' => 'nullable|date|after_or_equal:trial_start_date',
            'referred_by' => 'nullable|string',
            'blood_group' => 'nullable',
            'emergency_contact' => 'nullable|string',
            'emergency_phone' => 'nullable',
            'emergency_relation' => 'nullable|string',
            'profile_image' => 'nullable',
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
            'first_name.required' => __('The first name field is required.'),
            'last_name.required' => __('The last name field is required.'),
            'email.required' => __('The email field is required.'),
            'email.email' => __('Please enter a valid email address.'),
            'email.unique' => __('The email address is already in use.'),
            'phone.required' => __('The phone number field is required.'),
            'locker_no.unique' => __('The locker number is already assigned to another member.'),
            'gender.required' => __('Please select a gender.'),
            'gender.in' => __('Invalid gender selected.'),
            'dob.required' => __('The date of birth field is required.'),
            'dob.date' => __('Please enter a valid date of birth.'),
            'height.numeric' => __('Height must be a numeric value.'),
            'weight.numeric' => __('Weight must be a numeric value.'),
            'chest.numeric' => __('Chest measurement must be a numeric value.'),
            'waist.numeric' => __('Waist measurement must be a numeric value.'),
            'thigh.numeric' => __('Thigh measurement must be a numeric value.'),
            'status.required' => __('The status field is required.'),
            'status.in' => __('Locker status should be Active or Inactive'),
            'referred_by.required' => 'The referred by field is required.',
        ];
    }
}
