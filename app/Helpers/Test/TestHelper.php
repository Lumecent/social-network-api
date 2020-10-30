<?php

namespace App\Helpers\Test;

class TestHelper
{
    public static function authToken()
    {
        $user = \App\Repositories\Repository::getInstance()->user->startConditions()->latest()->first();

        return $user->createToken($user->alias)->plainTextToken;
    }
}
