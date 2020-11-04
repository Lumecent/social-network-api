<?php

namespace App\Repositories\Repository;

use App\Models\Social as Model;
use App\Repositories\BaseRepository;

class SocialRepository extends BaseRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Getting all social
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getAll()
    {
        return $this->startConditions()->all();
    }

    /**
     * Getting social by id
     *
     * @param int $id
     * @return Model
     */
    public function findById(int $id)
    {
        print_r($id);
        return $this->startConditions()->find($id);
    }

    /**
     * Getting social by name
     *
     * @param string $name
     * @return Model
     */
    public function findByName(string $name)
    {
        return $this->startConditions()->where('name', $name)->first();
    }
}
