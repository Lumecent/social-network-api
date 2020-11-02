<?php

namespace App\Repositories\Repository;

use App\Models\Role as Model;
use App\Repositories\BaseRepository;

class RoleRepository extends BaseRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Getting role by name
     *
     * @param string $name
     * @return mixed
     */
    public function findByName(string $name)
    {
        return $this->startConditions()->where('name', $name)->first();
    }

    /**
     * Getting roles by name
     *
     * @param string|array $name
     * @return mixed
     */
    public function findByNameWhereIn($name)
    {
        return $this->startConditions()->whereIn('name', $name)->get();
    }
}
