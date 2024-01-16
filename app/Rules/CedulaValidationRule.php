<?php

namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;

class CedulaValidationRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Implementa la lógica de validación para el número de cédula aquí.
        // Devuelve true si es válido y false si no lo es.
        
        // Ejemplo simple: Longitud de 10 dígitos
        return preg_match('/^\d{10}$/', $value);
    }

    public function message()
    {
        return 'El número de cédula no es válido.';
    }
}
