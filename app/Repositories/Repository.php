<?php

namespace App\Repositories;

use App\Factory;
use App\Repositories\Repository\UserRepository;

/**
 * @property UserRepository $user
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
            'user' => UserRepository::class
        ];
    }
}
