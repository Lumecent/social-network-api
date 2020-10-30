<?php

namespace App\Repositories;

use App\TSingleton;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    use TSingleton;

    private $model;

    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $model = $this->getModelClass();

        $this->model = new $model();
    }

    /**
     * @return Model
     */
    public function startConditions()
    {
        return clone $this->model;
    }

    /**
     * @return mixed
     */
    abstract protected function getModelClass();
}
