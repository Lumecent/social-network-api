<?php

namespace App\Services;

use App\Factory;
use App\Services\Service\UserService;

/**
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
            'user' => UserService::class,
        ];
    }
}
