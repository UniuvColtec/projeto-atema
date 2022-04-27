<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email:rfc,dns',
            'address' => 'required',
            'telephone' => 'required',
            'district' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome obrigatório',
            'email.required' => 'Email obrigatório',
            'email.email' => 'Email inválido',
            'address.required' => 'Endereço  obrigatório',
            'telephone.required' => 'Telefone  obrigatório',
            'address.required' => 'Endereço  obrigatório',
            'district.required' => 'Localidade  obrigatório'
        ];
    }
}
