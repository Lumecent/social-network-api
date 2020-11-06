<?php

namespace App\Repositories\Repository;

use App\Models\Tag as Model;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class TagRepository extends BaseRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Getting tag by id
     *
     * @param $id
     * @return Model|Collection
     */
    public function findById($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Getting tag by name
     *
     * @param string $name
     * @return Model
     */
    public function findByName(string $name)
    {
        return $this->startConditions()->where('name', $name)->first();
    }

    /**
     * Getting all tags
     *
     * @return Collection
     */
    public function getAll()
    {
        return $this->startConditions()->paginate();
    }
}
