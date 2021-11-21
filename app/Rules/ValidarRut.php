<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidarRut implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //$value es el rut a verificar
        if(strlen((string)$value) == 8 || strlen((string)$value) == 9)
        {
            $sum = 0;
            $aux = 2;
            $digitoV = '0';

            for($i = strlen((string)$value)-2; $i >= 0; $i--)
            {//Desde el inicio del value hasta el penultimo digito
                $sum += (int)substr((string)$value, $i, 1)*$aux;
                if($aux < 7)
                {
                    $aux++;
                }else
                {
                    $aux = 2;
                }
            }
            //Hasta aqui la suma todo bien, funciona de pana


            $modulo = 11 - ($sum % 11);
            //dd($modulo);
            if($modulo == 11)
            {
                $digitoV = '0';
            }
            else if($modulo == 10)
            {
                $digitoV = 'K';
            }
            else
            {//Menor a 10
                $digitoV = (string)$modulo;
            }

            //Finalmente validamos
            if((substr((string)$value, strlen((string)$value)-1, 1) == $digitoV) || (substr((string)$value, strlen((string)$value)-1, 1) == 'k' && $digitoV == 'K'))
            {//Si el ultimo digito es igual a digitoV, entonces true
                return true;
            }else
            {
                return false;
            }
        }
        else
        {
            //No valido
            return false;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El rut no es válido.';
    }
}
