<?php

namespace App\Repositories;

use App\Factory;
use App\Repositories\Repository\UserRepository;
use App\Repositories\Repository\UserSocialRepository;
use App\Repositories\Repository\SocialRepository;

/**
 * @property UserRepository $user
 * @property UserSocialRepository $userSocial
 * @property SocialRepository $social
 *
 * Class Repository
 * @package App\Repositories
 */
class Repository extends Factory
{
    protected static $instance = null;

    protected function aliases()
    {
        return [
            'user' => UserRepository::class,
            'userSocial' => UserSocialRepository::class,
            'social' => SocialRepository::class,
        ];
    }
}
