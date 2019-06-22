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
            'description' => 'required|numeric|digits_between:1,10|unique:fee_types',
            'discount' => 'required|numeric|digits_between:1,50'
        ];
    }

    public function messages(){
        return[
            'description.required' => 'Este Campo no puede estar vacio',
            'description.unique' => 'La ciota ya existe',
            'description.numeric' => 'El campo debe ser numerico',
            'description.digits_between' => 'El maximo de cuotas es 10 y el minimo 1',
            'discount.required' => 'Este Campo no puede estar vacio',
            'discount.numeric' => 'El campo debe ser numerico',
            'discount.digits_between' => 'El maximo de descuento es 50% y el minimo 1%'
        ];
    }
}
