<?php

namespace App\Repositories\Repository;

use App\Models\Published as Model;
use App\Repositories\BaseRepository;
use Ramsey\Collection\Collection;

class PublishedRepository extends BaseRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Getting type published by id
     *
     * @param $id
     * @return Model|Collection
     */
    public function findById($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Getting all type published
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getAll()
    {
        return $this->startConditions()->all();
    }
}
