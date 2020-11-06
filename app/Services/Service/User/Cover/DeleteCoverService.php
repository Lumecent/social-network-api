<?php

namespace App\Services\Service\User\Cover;

use App\Helpers\PreparingFileSystem;
use App\Repositories\Repository;
use App\Services\BaseService;

class DeleteCoverService extends BaseService
{
    /**
     * Change user cover on default
     *
     * @return false|\Illuminate\Contracts\Auth\Authenticatable|null
     * @throws \ErrorException
     */
    public function run()
    {
        $user = Repository::getInstance()->user->getAuthUser();

        if (PreparingFileSystem::prepareForUser($user->cover, 'cover.jpg')){
            $user->cover = 'cover.jpg';
            $user->save();

            return $user;
        }

        return false;
    }
}
