<?php

namespace App\Repositories\Repository;

use App\Models\UserRole as Model;
use App\Repositories\BaseRepository;

class UserRoleRepository extends BaseRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Getting user role by name and user ID
     *
     * @param string $name
     * @param int $userID
     * @return mixed
     */
    public function findByNameAndUserId(string $name, int $userID)
    {
        return $this->startConditions()->where('role', $name)->where('user_id', $userID)->first();
    }
}
