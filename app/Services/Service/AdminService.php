<?php

namespace App\Services\Service;

use App\Factory;
use App\Services\Service\Admin\CreateSocialService;
use App\Services\Service\Admin\DeleteSocialService;
use App\Services\Service\Admin\UpdateSocialService;

/**
 * @property CreateSocialService $createSocial
 * @property DeleteSocialService $deleteSocial
 * @property UpdateSocialService $updateSocial
 *
 * Class AdminService
 * @package App\Services\Service
 */
class AdminService extends Factory
{
    protected function aliases()
    {
        return [
            'createSocial' => CreateSocialService::class,
            'deleteSocial' => DeleteSocialService::class,
            'updateSocial' => UpdateSocialService::class,
        ];
    }
}
