<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'password' => 'required',
            'confirmpassword' => 'required',
            'email' => ['required', 'email', \Illuminate\Validation\Rule::unique('users')->ignore($this->user()->id)],
            'city_id' => 'required'


        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Nome obrigatório',
            'password.required' => 'Senha obrigatória',
            'confirmpassword.required' => 'Confirme sua senha',
            'email.required' => 'Email obrigatório',
            'city_id.required' => 'Escolha uma cidade',
            'email.unique' => 'Email já cadastrado'
        ];
    }
}
