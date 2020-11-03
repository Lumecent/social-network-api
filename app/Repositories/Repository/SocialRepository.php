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
}
