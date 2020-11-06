<?php

namespace App\Repositories\Repository;

use App\Models\Access as Model;
use App\Repositories\BaseRepository;

class AccessRepository extends BaseRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Getting access by id
     *
     * @param $id
     * @return Model
     */
    public function findById($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Getting all access
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getAll()
    {
        return $this->startConditions()->all();
    }
}
