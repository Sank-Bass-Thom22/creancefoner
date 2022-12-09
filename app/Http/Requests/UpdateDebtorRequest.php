<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDebtorRequest extends FormRequest
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
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:50', Rule::unique('debtors')->ignore($email, 'email')],
            'telephone' => ['required', 'string', 'max:25', Rule::unique('debtors')->ignore($telephone, 'telephone')],
            'matricule' => ['required', 'string', 'max:10'],
            'serviceindex' => ['required', 'string', 'max:255'],
        ];
    }
}
