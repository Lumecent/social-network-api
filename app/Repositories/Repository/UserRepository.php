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
     * @param string $email
     * @return Model
     */
    public function findByEmail(string $email)
    {
        return $this->startConditions()->where('email', $email)->first();
    }

    /**
     * Getting users by alias
     *
     * @param string $alias
     * @return mixed
     */
    public function findByAlias(string $alias)
    {
        return $this->startConditions()->where('alias', $alias)->first();
    }

    /**
     * Getting user and checked relations
     *
     * @param string $alias
     * @param string|array $relations
     * @return mixed
     */
    public function findByAliasRelations(string $alias, $relations)
    {
        return $this->startConditions()->where('alias', $alias)->with($relations)->first();
    }
}
