<?php

namespace App\Services;

use App\Factory;
use App\Services\Service\AdminService;
use App\Services\Service\GeneralService;
use App\Services\Service\UserService;

/**
 * @property AdminService $admin
 * @property GeneralService $general
 * @property UserService $user
 *
 * Class Service
 * @package App\Services
 */
class Service extends Factory
{
    protected function aliases()
    {
        return [
            'admin' => AdminService::class,
            'general' => GeneralService::class,
            'user' => UserService::class,
        ];
    }
}
