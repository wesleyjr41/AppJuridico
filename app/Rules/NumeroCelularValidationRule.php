<?php

namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;

class NumeroCelularValidationRule implements Rule
{
    public function passes($attribute, $value)
    {
        // Implementa la lógica de validación para el número de celular aquí.
        // Aquí hay un ejemplo simple que asume un formato específico:
        // Ejemplo: +1234567890

        return preg_match('/^\+\d{1,20}$/', $value);
    }

    public function message()
    {
        return 'El número de celular no es válido.';
    }
}
