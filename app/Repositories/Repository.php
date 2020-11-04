<?php

namespace App\Repositories;

use App\Factory;
use App\Repositories\Repository\BlogCategoryRepository;
use App\Repositories\Repository\RoleRepository;
use App\Repositories\Repository\SocialRepository;
use App\Repositories\Repository\UserRepository;
use App\Repositories\Repository\UserRoleRepository;
use App\Repositories\Repository\UserSocialRepository;

/**
 * @property BlogCategoryRepository $blogCategory
 * @property RoleRepository $role
 * @property SocialRepository $social
 * @property UserRepository $user
 * @property UserRoleRepository $userRole
 * @property UserSocialRepository $userSocial
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
            'blogCategory' => BlogCategoryRepository::class,
            'role' => RoleRepository::class,
            'social' => SocialRepository::class,
            'user' => UserRepository::class,
            'userRole' => UserRoleRepository::class,
            'userSocial' => UserSocialRepository::class,
        ];
    }
}
