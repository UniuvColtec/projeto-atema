<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'subtitle' => 'required',
            'description' => 'required',
            'contact' => 'required',
            'start_date' => 'required|date',
            'final_date' => 'required|date|after:start_date',
            'cities' => 'required',
            'address' => 'required',
            'district' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório',
            'subtitle.required' => 'Subtitulo é obrigatorio',
            'description.required' => 'Descrição é obrigatória',
            'contact.required' => 'Contato é obrigatório',
            'address.required' => 'Endereço é obrigatório',
            'start_date.required' => 'Data de inicio é obrigatória',
            'final_date.required' => 'Data de término é obrigatória',
            'final_date.after' => 'Data de término deve ser após o inicio',
            'district.required' => 'Bairro é obrigatório',
            'cities.required' => 'Cidade é obrigatória',
        ];
    }
}
