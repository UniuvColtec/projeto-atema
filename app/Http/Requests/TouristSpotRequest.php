<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TouristSpotRequest extends FormRequest
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
            'address' => 'required',
            'district' => 'required',
            'cities' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nome obrigatório',
            'address.required' => 'Endereço  obrigatório',
            'district.required' => 'Localidade  obrigatório',
            'cities.required' => 'Cidade  obrigatório',

        ];
    }
}
