<?php

namespace App\Helpers;

class StringClean
{
    /**
     * Clearing a string of duplicate space characters
     *
     * @param string $text
     * @return string
     */
    public static function cleanSpace(string $text)
    {
        return preg_replace('/[^\S\r\n]+/', ' ', trim($text));
    }

    /**
     * Clearing a string of html tags
     *
     * @param string $text
     * @param null $allowedTags
     * @return string
     */
    public static function cleanTags(string $text, $allowedTags = null)
    {
        return strip_tags($text, $allowedTags);
    }
}
