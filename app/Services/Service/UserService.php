<?php

namespace App\Services\Service;

use App\Factory;

use App\Services\Service\User\Avatar\UpdateAvatarService;
use App\Services\Service\User\Avatar\DeleteAvatarService;

use App\Services\Service\User\Cover\UpdateCoverService;
use App\Services\Service\User\Cover\DeleteCoverService;

use App\Services\Service\User\Social\CreateSocialService;
use App\Services\Service\User\Social\UpdateSocialService;
use App\Services\Service\User\Social\DeleteSocialService;

use App\Services\Service\User\LoginService;

use App\Services\Service\User\RegisterService;

use App\Services\Service\User\UpdatePasswordService;

use App\Services\Service\User\UpdateProfileService;

/**
 * @property UpdateAvatarService $updateAvatar
 * @property DeleteAvatarService $deleteAvatar
 *
 * @property UpdateCoverService $updateCover
 * @property DeleteCoverService $deleteCover
 *
 * @property CreateSocialService $createSocial
 * @property UpdateSocialService $updateSocial
 * @property DeleteSocialService $deleteSocial
 *
 * @property LoginService $login
 *
 * @property RegisterService $register
 *
 * @property UpdatePasswordService $updatePassword
 *
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
            'updateAvatar' => UpdateAvatarService::class,
            'deleteAvatar' => DeleteAvatarService::class,

            'updateCover' => UpdateCoverService::class,
            'deleteCover' => DeleteCoverService::class,

            'createSocial' => CreateSocialService::class,
            'updateSocial' => UpdateSocialService::class,
            'deleteSocial' => DeleteSocialService::class,

            'login' => LoginService::class,

            'register' => RegisterService::class,

            'updatePassword' => UpdatePasswordService::class,

            'updateProfile' => UpdateProfileService::class,
        ];
    }
}
