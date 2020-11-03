<?php

namespace App\Rules\User;

use App\Repositories\Repository;
use Illuminate\Contracts\Validation\Rule;

class RegexSocialUrl implements Rule
{
    private $social;

    /**
     * Create a new rule instance.
     *
     * @param mixed $social
     */
    public function __construct($social)
    {
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
            $social = Repository::getInstance()->social->getAll();

            $regex = null;

            foreach ($social as $item){
                if ($item->name == $this->social){
                    $regex = $item->regex;
                }
            }

            if ($regex){
                return $regex && preg_match("/{$regex}/", $value);
            }
        }

        return false;
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
