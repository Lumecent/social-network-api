<?php

namespace App\Helpers\Test;

use App\Repositories\Repository;

class TestHelper
{
    public static function authToken()
    {
        $user = Repository::getInstance()->user->startConditions()->latest()->first();

        return $user->createToken($user->alias)->plainTextToken;
    }

    public static function getUser()
    {
        return Repository::getInstance()->user->startConditions()->latest()->first();
    }

    public static function getSocial($userID)
    {
        return Repository::getInstance()->userSocial->startConditions()->where('user_id', $userID)->first();
    }

    public static function getRandomUser()
    {
        return Repository::getInstance()->user->startConditions()->first();
    }
}
