<?php
use Illuminate\Support\Facades\Validator;

namespace App\Utilities\Validadores;

class Validaciones
{

    public static function alfanumericoValidator($attribute, $value, $parameters, $validator)
    {
        $validator->setCustomMessages(['El formato ingresado no es válido']);
        $regla_validacion = "/^([a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ00-9\-\(\)\/.\s ]+)$/";
        $regex_complemento = "";
        $regla = "";
        $respuesta = false;

        if ($parameters != []) {
            $array = str_split($parameters);
            $regex_complemento = "";
            foreach($array as $sub_valores){
                $regex_complemento = $regex_complemento + '\\' + $sub_valores;
            };
            $regla = $regla_validacion.str_replace('s', ('\s' + $regex_complemento));
        } else {
            $regla = $regla_validacion;
        }
            
        $validacion = preg_match($regla, $value);
        if ($validacion == 0 || $validacion == false) {
            return false;
        } else {
            return true;
        }
    }

}