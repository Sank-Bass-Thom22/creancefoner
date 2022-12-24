<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBankRequest extends FormRequest
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
        $email = $this->request->get('email');
        $telephone = $this->request->get('telephone');

        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['nullable', 'string', 'email', 'max:50', Rule::unique('banks')->ignore($email, 'email')],
            'telephone' => ['nullable', 'string', 'max:25', Rule::unique('banks')->ignore($telephone, 'telephone')],
            'description' => ['nullable', 'string'],
        ];
    }
}
