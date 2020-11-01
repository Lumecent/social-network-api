<?php

namespace App\Services\Service;

use App\Factory;
use App\Services\Service\User\CreateSocialService;
use App\Services\Service\User\DeleteAvatarService;
use App\Services\Service\User\DeleteCoverService;
use App\Services\Service\User\DeleteSocialService;
use App\Services\Service\User\LoginService;
use App\Services\Service\User\RegisterService;
use App\Services\Service\User\UpdateAvatarService;
use App\Services\Service\User\UpdateCoverService;
use App\Services\Service\User\UpdatePasswordService;
use App\Services\Service\User\UpdateProfileService;
use App\Services\Service\User\UpdateSocialService;

/**
 * @property CreateSocialService $createSocial
 * @property DeleteAvatarService $deleteAvatar
 * @property DeleteCoverService $deleteCover
 * @property DeleteSocialService $deleteSocial
 * @property LoginService $login
 * @property RegisterService $register
 * @property UpdateAvatarService $updateAvatar
 * @property UpdateCoverService $updateCover
 * @property UpdatePasswordService $updatePassword
 * @property UpdateProfileService $updateProfile
 * @property UpdateSocialService $updateSocial
 *
 * Class UserService
 * @package App\Services\Service
 */
class UserService extends Factory
{
    protected function aliases()
    {
        return [
            'createSocial' => CreateSocialService::class,
            'deleteAvatar' => DeleteAvatarService::class,
            'deleteCover' => DeleteCoverService::class,
            'deleteSocial' => DeleteSocialService::class,
            'login' => LoginService::class,
            'register' => RegisterService::class,
            'updateAvatar' => UpdateAvatarService::class,
            'updateCover' => UpdateCoverService::class,
            'updatePassword' => UpdatePasswordService::class,
            'updateProfile' => UpdateProfileService::class,
            'updateSocial' => UpdateSocialService::class,
        ];
    }
}
