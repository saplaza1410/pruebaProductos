<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;
use App\Utilities\Validadores\Validaciones;

class CreateProductRequest extends FormRequest
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
            'talla' => 'required|max:5|validar_alfanumerico',
            'marca' => 'required|integer',
            'observaciones' => 'required|validar_alfanumerico',
            'cantidad' => 'required|min:0|integer',
            'fecha_embarque' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es un campo obligatorio',
            'nombre.max' => 'El campo nombre no puede ser mayor a 255 caracteres',
            'nombre.validar_alfanumerico' => 'El nombre solo puede contener valores alfanuméricos',
            'talla.required' => 'La talla es un campo obligatorio',
            'talla.max' => 'El campo talla no puede ser mayor a 5 caracteres',
            'talla.validar_alfanumerico' => 'La talla solo puede contener valores alfanuméricos',
            'marca.required' => 'La marca es un campo obligatorio',
            'marca.integer' => 'La talla solo puede contener números',
            'observaciones.required' => 'La observación es un campo obligatorio',
            'observaciones.validar_alfanumerico' => 'La observación solo puede contener valores alfanuméricos',
            'cantidad.required' => 'La cantidad es un campo obligatorio',
            'cantidad.min' => 'La cantidad solo puede contener números mayores a 0',
            'cantidad.integer' => 'La cantidad solo puede contener números',
            'fecha_embarque.required' => 'La fecha de embarque es un campo obligatorio',
            'fecha_embarque.date' => 'La fecha de embarque debe ser una fecha',
        ];
    }
}
