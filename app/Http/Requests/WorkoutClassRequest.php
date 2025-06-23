<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WorkoutClassRequest extends FormRequest
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
            'name' => 'required|string',
            'date' => 'required|date',
            'description' => 'nullable|string',
            'start_at' => 'required',
            'end_at' => 'required',
            'workout_id' => 'required|integer',
            'trainer_id' => 'required|array',
            'activity_id' => 'required|array',
            'status' => 'required',
        ];

        if ($this->method() == 'PUT' && $this->code != allLanguages()->first()->code) {
            $rules =  [
                'name' => 'required|string',
                'description' => 'nullable|string',
            ];
        } else {
            $rules =  [
                'name' => 'required|string',
                'date' => 'required|date',
                'description' => 'nullable|string',
                'start_at' => 'required',
                'end_at' => 'required',
                'workout_id' => 'required|integer',
                'trainer_id' => 'required|array',
                'activity_id' => 'required|array',
                'status' => 'required',
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
            'name.required' => 'Class name is required',
            'date.required' => 'Class date is required',
            'start_at.required' => 'Class start time is required',
            'end_at.required' => 'Class end time is required',
            'workout_id.required' => 'Workout is required',
            'trainer_id.required' => 'Trainer is required',
            'activity_id.required' => 'Activity is required',
            'status.required' => 'Class status is required',
        ];
    }
}
