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

    /**
     * @param $id
     * @param $userID
     * @return Model
     */
    public function findByUpdate($id, $userID)
    {
        return $this->startConditions()->where('id', $id)->where('user_id', $userID)->first();
    }

    /**
     * Getting social contact on user id
     *
     * @param $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findByUserId($userId)
    {
        return $this->startConditions()->where('user_id', $userId)->get();
    }
}
