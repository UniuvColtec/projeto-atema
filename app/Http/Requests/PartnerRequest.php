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
            'district' => 'required',
            'description' => 'required',
            'cities' => 'required',
            'cnpj' => 'required',
            'partner_type_id' => 'required',
            'logo' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'partner_type_id.required' => 'O tipo do parceiro é obrigatório',
            'name.required' => 'Nome obrigatório',
            'email.required' => 'Email obrigatório',
            'email.email' => 'Email inválido',
            'address.required' => 'Endereço  obrigatório',
            'cnpj.required' => 'Cnpj  obrigatório',
            'telephone.required' => 'Telefone  obrigatório',
            'district.required' => 'Bairro  obrigatório',
            'description.required' => 'Descrição  obrigatória',
            'cities.required' => 'Cidade obrigatória',
            'logo.required' => 'A logo é obrigatória'
        ];
    }
}
