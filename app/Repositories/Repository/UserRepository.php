<?php

namespace App\Repositories\Repository;

use App\Models\User as Model;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Auth;

class UserRepository extends BaseRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Getting authorise user
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function getAuthUser()
    {
        return Auth::user();
    }

    /**
     * Getting user by id
     *
     * @param string|array $id
     * @return mixed
     */
    public function findByID($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Find users by email address
     *
     * @param $email
     * @return Model
     */
    public function findByEmail($email)
    {
        return $this->startConditions()->where('email', $email)->first();
    }
}
