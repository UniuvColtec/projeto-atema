<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'captcha' => 'required',
            'mensagem' => 'required'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome obrigatório',
            'captcha.required' => 'captcha obrigatório',
            'email.required' => 'Email obrigatório',
            'email.email' => 'Email inválido',
            'mensagem.required'=>'mensagem obrigatória'

        ];
    }
}
