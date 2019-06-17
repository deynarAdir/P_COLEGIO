<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFeeType extends FormRequest
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
            'description' => 'required|max:2|min:1',
            'discount' => 'required|max:2|min:1'
        ];
    }

    public function messages(){
        return[
            'description.required' => 'Este Campo no puede estar vacio',
            'description.max' => 'Numero maximo de cuotas 10',
            'description.min' => 'Numero minimo de couta 1',
            'discount.required' => 'Este Campo no puede estar vacio',
            'discount.max' => 'El descuento maximo es de 50%',
            'discount.min' => 'El descuento de Minimo es de 1%'
        ];
    }
}
