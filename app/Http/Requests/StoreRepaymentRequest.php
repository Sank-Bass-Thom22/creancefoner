<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRepaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'amount' => ['required', 'numeric'],
            'repaymentdate' => ['required', 'date'],
            'repaymentway' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'bank' => ['nullable', 'int'],
        ];
    }
}
