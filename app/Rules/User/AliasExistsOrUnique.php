<?php

namespace App\Rules\User;

use App\Services\Service;
use Illuminate\Contracts\Validation\Rule;

class AliasExistsOrUnique implements Rule
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
        return Service::getInstance()->general->alias->belongsToUpdate($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute уже существует.';
    }
}
