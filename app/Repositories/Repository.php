<?php

namespace App\Repositories;

use App\Factory;
use App\Repositories\Repository\AccessRepository;
use App\Repositories\Repository\BlogCategoryRepository;
use App\Repositories\Repository\BlogRepository;
use App\Repositories\Repository\PublishedRepository;
use App\Repositories\Repository\RoleRepository;
use App\Repositories\Repository\SocialRepository;
use App\Repositories\Repository\TagRelationsRepository;
use App\Repositories\Repository\TagRepository;
use App\Repositories\Repository\UserRepository;
use App\Repositories\Repository\UserRoleRepository;
use App\Repositories\Repository\UserSocialRepository;

/**
 * @property AccessRepository $access
 * @property BlogCategoryRepository $blogCategory
 * @property BlogRepository $blog
 * @property PublishedRepository $published
 * @property RoleRepository $role
 * @property SocialRepository $social
 * @property TagRepository $tag
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
            'access' => AccessRepository::class,
            'blogCategory' => BlogCategoryRepository::class,
            'blog' => BlogRepository::class,
            'published' => PublishedRepository::class,
            'role' => RoleRepository::class,
            'social' => SocialRepository::class,
            'tag' => TagRepository::class,
            'user' => UserRepository::class,
            'userRole' => UserRoleRepository::class,
            'userSocial' => UserSocialRepository::class,
        ];
    }
}
