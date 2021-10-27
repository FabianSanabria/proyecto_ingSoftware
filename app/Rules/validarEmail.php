<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class validarEmail implements Rule
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
     * @param  mixed  $value = email a verificar
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $value)) ? FALSE : TRUE;

    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ingrese email valido.';
    }



}
