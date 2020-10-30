<?php

namespace App\Services\Service;

use App\Factory;
use App\Services\Service\User\LoginService;
use App\Services\Service\User\RegisterService;

/**
 * @property RegisterService $register
 * @property LoginService $login
 *
 * Class UserService
 * @package App\Services\Service
 */
class UserService extends Factory
{
    protected function aliases()
    {
        return [
            'register' => RegisterService::class,
            'login' => LoginService::class,
        ];
    }
}
