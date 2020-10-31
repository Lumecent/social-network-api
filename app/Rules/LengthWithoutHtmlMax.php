<?php

namespace App\Rules;

use App\Helpers\StringClean;
use Illuminate\Contracts\Validation\Rule;

class LengthWithoutHtmlMax implements Rule
{
    protected $maxLength = null;
    /**
     * Create a new rule instance.
     *
     * @param integer $maxLength
     */
    public function __construct(int $maxLength)
    {
        $this->maxLength = $maxLength;
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
        return mb_strlen(StringClean::cleanTags($value), 'UTF-8') <= $this->maxLength;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute может содержать не более ' . $this->maxLength . ' символов.';
    }
}
