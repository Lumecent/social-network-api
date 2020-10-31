<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StringImgSize implements Rule
{
    private $size;

    /**
     * Create a new rule instance.
     *
     * @param int $size size in bytes
     */
    public function __construct(int $size)
    {
        $this->size = $size;
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
        $size = mb_strlen(base64_decode($value), '8bit');

        return $size && $size <= $this->size;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute не может превышать размер ' . number_format(($this->size / 1024) / 1024, 2, '.', '') . ' Мб.';
    }
}
