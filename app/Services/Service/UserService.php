<?php

namespace App\Services\Service;

use App\Factory;
use App\Services\Service\User\DeleteAvatarService;
use App\Services\Service\User\DeleteCoverService;
use App\Services\Service\User\LoginService;
use App\Services\Service\User\RegisterService;
use App\Services\Service\User\UpdateAvatarService;
use App\Services\Service\User\UpdateCoverService;
use App\Services\Service\User\UpdateProfileService;

/**
 * @property DeleteAvatarService $deleteAvatar
 * @property DeleteCoverService $deleteCover
 * @property LoginService $login
 * @property RegisterService $register
 * @property UpdateAvatarService $updateAvatar
 * @property UpdateCoverService $updateCover
 * @property UpdateProfileService $updateProfile
 *
 * Class UserService
 * @package App\Services\Service
 */
class UserService extends Factory
{
    protected function aliases()
    {
        return [
            'deleteAvatar' => DeleteAvatarService::class,
            'deleteCover' => DeleteCoverService::class,
            'login' => LoginService::class,
            'register' => RegisterService::class,
            'updateAvatar' => UpdateAvatarService::class,
            'updateCover' => UpdateCoverService::class,
            'updateProfile' => UpdateProfileService::class
        ];
    }
}
