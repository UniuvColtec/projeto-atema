<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Partner_typeRequest extends FormRequest
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
                'name'=>'required|unique:partner_types,name',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome obrigatório',
            'name.unique'=>'nome já existente'
        ];
    }
}
