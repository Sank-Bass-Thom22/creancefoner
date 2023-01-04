<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployerRequest extends FormRequest
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
            'servicename' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:debtors'],
            'telephone' => ['required', 'string', 'max:25', 'unique:debtors'],
            'servicelocation => ['nullable', 'string', 'max:255'],
            'firstname' => ['nullable', 'string', 'max:50'],
            'lastname' => ['nullable', 'string', 'max:25'],
            'emailDRH' => ['nullable', 'string', 'max:50', 'unique:debtors'],
            'telephoneDRH' => ['nullable', 'string', 'max:25', 'unique:debtors'],
        ];
    }
}
