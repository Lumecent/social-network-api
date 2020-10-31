<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class PreparingFileSystem
{
    /**
     * Preparing file system for user update avatar or cover
     *
     * @param string $image
     * @param string $customName
     * @throws \ErrorException
     */
    public static function prepareForUser(string $image, string $customName)
    {
        if (!File::exists("images/users")){
            File::makeDirectory("images/users");
        }

        if ($image != $customName){
            if (File::exists("images/users/{$image}") && !File::delete("images/users/{$image}")){
                throw new \ErrorException('An error occurred, please try again later', 400);
            }
        }

        return true;
    }
}
