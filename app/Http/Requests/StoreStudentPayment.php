<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentPayment extends FormRequest
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
            'id_student' => 'required|integer|min:1',
            'nit_ci' => 'required|numeric|digits_between:5,10',
            'invoice_series' => 'required|numeric|digits_between:3,10',
            'invoice_number' => 'required|numeric|digits_between:3,30',
            'total_payment' => 'required|numeric',
            'mensualidades' => 'required',
            'mensualidades.*.mensualidad_id' => 'required|min:1|numeric',
            'mensualidad.*.price' => 'required|numeric|min:0.01'
        ];
    }
}
