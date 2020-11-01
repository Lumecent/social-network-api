<?php

namespace App\Rules\User;

use App\Cases\CountBelongsToUser;
use App\Repositories\Repository;
use Illuminate\Contracts\Validation\Rule;

class MaxCountSocial implements Rule
{
    private $maxCount;

    /**
     * Create a new rule instance.
     *
     * @param int $maxCount
     */
    public function __construct(int $maxCount)
    {
        $this->maxCount = $maxCount;
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
        $authUser = Repository::getInstance()->user->getAuthUser();

        return $authUser->socials < $this->maxCount;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "Количество контактов не может быть больше {$this->maxCount}.";
    }
}
