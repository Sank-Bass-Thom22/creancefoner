<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDebtorRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:debtors'],
            'telephone' => ['required', 'string', 'max:25', 'unique:debtors'],
            'codefoner' => ['required', 'string', 'max:40', 'unique:debtors'],
            'role' => ['nullable', 'string', 'max:11'],
            'debtorindex' => ['nullable', 'string', 'max:255'],
        ];
    }
}
