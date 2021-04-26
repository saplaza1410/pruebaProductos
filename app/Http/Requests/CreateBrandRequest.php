<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Utilities\Validadores\Validaciones;

class CreateBrandRequest extends FormRequest
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
        Validator::extend('validar_alfanumerico', 'App\Utilities\Validadores\Validaciones@alfanumericoValidator');

        return [
            'nombre' => 'required|max:255|validar_alfanumerico',
            'referencia' => 'required|max:255|validar_alfanumerico',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es un campo obligatorio',
            'nombre.max' => 'El campo nombre no puede ser mayor a 255 caracteres',
            'nombre.validar_alfanumerico' => 'El nombre solo puede contener valores alfanuméricos',
            'referencia.required' => 'La talla es un campo obligatorio',
            'referencia.max' => 'El campo talla no puede ser mayor a 255 caracteres',
            'referencia.validar_alfanumerico' => 'La talla solo puede contener valores alfanuméricos',
            
        ];
    }
}
