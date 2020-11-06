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

    public static function getAdminLastSocial()
    {
        return Repository::getInstance()->social->startConditions()->orderBy('id', 'desc')->first();
    }

    public static function addedRole(string $role)
    {
        $user = self::getUser();

        $userRole = Repository::getInstance()->userRole->startConditions();
        $userRole->user_id = $user->id;
        $userRole->role = $role;
        $userRole->save();
    }

    public static function getAdminLastBlogCategory()
    {
        return Repository::getInstance()->blogCategory->startConditions()->orderBy('id', 'desc')->first();
    }

    public static function getLastAccess()
    {
        return Repository::getInstance()->access->startConditions()->orderBy('id', 'desc')->first();
    }

    public static function getLastPublished()
    {
        return Repository::getInstance()->published->startConditions()->orderBy('id', 'desc')->first();
    }
}
