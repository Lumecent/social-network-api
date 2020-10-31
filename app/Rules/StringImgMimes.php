<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class StringImgMimes implements Rule
{
    private $mimes;

    /**
     * Create a new rule instance.
     *
     * @param array $mimes
     */
    public function __construct(array $mimes)
    {
        $this->mimes = $mimes;
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
        if (strpos($value, ';base64') === false) {
            return false;
        }

        list($mimeStr, $value) = explode(';', $value);
        list(, $value) = explode(',', $value);

        if (base64_decode($value, true) === false) {
            return false;
        }

        if (base64_encode(base64_decode($value)) !== $value) {
            return false;
        }

        $mime = str_replace('data:image/', '', $mimeStr);

        return in_array($mime, $this->mimes);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Указан неверный формат изображения.';
    }
}
