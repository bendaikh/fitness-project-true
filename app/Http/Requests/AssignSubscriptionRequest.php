<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssignSubscriptionRequest extends FormRequest
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
            'plan_id' => 'required|numeric',
            'gateway' => 'required|string',
            'pay_amount' => 'required',
            'due_amount' => 'nullable',
            'due_at' => 'nullable|date|after_or_equal:today',
            'transaction' => 'required_if:account_details,null',
            'account_details' => 'required_if:transaction,null',
        ];
    }

    public function messages()
    {
        return [
            'plan_id.required' => 'Please Select A Plan',
            'plan_id.numeric' => 'Plan Id Must Be a Numeric',
            'gateway.required' => 'Please Select A Payment Method',
            'gateway.string' => 'Payment Method Must be String',
            'pay_amount.required' => 'pay amount is Required',
            'pay_amount.numeric' => 'Please Enter a Valid Amount',
            'due_amount.numeric' => 'Please Enter a Valid Amount',
            'due_at.date' => 'Please Enter a Date',
            'after_or_equal.date' => 'Date Must be after or equal today',
        ];
    }
}
