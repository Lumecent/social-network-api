<?php

namespace App\Rules\Admin;

use App\Repositories\Repository;
use Illuminate\Contracts\Validation\Rule;

class SocialExistOrUnique implements Rule
{
    private $socialId;
    /**
     * Create a new rule instance.
     *
     * @param $socialId
     */
    public function __construct($socialId)
    {
        $this->socialId = $socialId;
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
        $social = Repository::getInstance()->social->findByName($value);

        if ($social){
            return $social->id === $this->socialId;
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
        return 'Вид связи уже существует.';
    }
}
