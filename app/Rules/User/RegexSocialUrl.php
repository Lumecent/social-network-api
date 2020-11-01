<?php

namespace App\Rules\User;

use Illuminate\Contracts\Validation\Rule;

class RegexSocialUrl implements Rule
{
    private $regexUrl;
    private $social;

    /**
     * Create a new rule instance.
     *
     * @param array $regexUrl
     * @param mixed $social
     */
    public function __construct(array $regexUrl, $social)
    {
        $this->regexUrl = $regexUrl;
        $this->social = $social;
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
        if ($value && $this->social){
            $regex = $this->regexUrl[$this->social] ?? null;

            return $regex && preg_match("/{$regex}/", $value);
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Введен неверный формат адреса.';
    }
}
