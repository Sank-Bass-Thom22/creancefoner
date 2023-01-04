<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployerRequest extends FormRequest
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
        $emailDRH = $this->request->get('emailDRH');
        $telephoneDRH = $this->request->get('telephoneDRH');

        return [
            'servicename' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', Rule::unique('debtors')->ignore($email, 'email')],
            'telephone' => ['required', 'string', 'max:25', Rule::unique('debtors')->ignore($telephone, 'telephone')],
            'servicelocation => ['nullable', 'string', 'max:255'],
            'firstname' => ['nullable', 'string', 'max:50'],
            'lastname' => ['nullable', 'string', 'max:25'],
            'emailDRH' => ['nullable', 'string', 'email', 'max:50', Rule::unique('debtors')->ignore($emailDRH, 'emailDRH')],
            'telephoneDRH' => ['nullable', 'string', 'max:25', Rule::unique('debtors')->ignore($telephoneDRH, 'telephoneDRH')],
        ];
    }
}
