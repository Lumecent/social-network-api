<?php

namespace App\Repositories\Repository;

use App\Models\BlogCategory as Model;
use App\Repositories\BaseRepository;

class BlogCategoryRepository extends BaseRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Getting all category for blog
     *
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]
     */
    public function getAll()
    {
        return $this->startConditions()->all();
    }

    /**
     * Getting category by id
     *
     * @param int $id
     * @return Model
     */
    public function findById(int $id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Getting category by name
     *
     * @param string $name
     * @return Model
     */
    public function findByName(string $name)
    {
        return $this->startConditions()->where('name', $name)->first();
    }
}
