<?php

namespace App\Services\Service\User;

use App\Helpers\PreparingFileSystem;
use App\Repositories\Repository;
use App\Services\BaseService;

class DeleteAvatarService extends BaseService
{
    /**
     * Change user avatar on default
     *
     * @return false|\Illuminate\Contracts\Auth\Authenticatable|null
     * @throws \ErrorException
     */
    public function run()
    {
        $user = Repository::getInstance()->user->getAuthUser();

        if (PreparingFileSystem::prepareForUser($user->avatar, 'avatar.jpg')){
            $user->avatar = 'avatar.jpg';
            $user->save();

            return $user;
        }

        return false;
    }
}
