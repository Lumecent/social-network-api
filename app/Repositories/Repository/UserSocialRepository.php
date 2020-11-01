<?php

namespace App\Repositories\Repository;

use App\Models\UserSocial as Model;
use App\Repositories\BaseRepository;

class UserSocialRepository extends BaseRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }

    public function findByUpdate($id, $userID)
    {
        return $this->startConditions()->where('id', $id)->where('user_id', $userID)->first();
    }
}
