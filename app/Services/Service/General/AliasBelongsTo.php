<?php

namespace App\Services\Service\General;

use App\Repositories\Repository;
use App\Services\BaseService;

class AliasBelongsTo extends BaseService
{
    /**
     * Checks whether the alias belongs to the current user and whether it can be used
     *
     * @param string $alias
     * @return bool
     */
    public function belongsToUpdate(string $alias)
    {
        $user = Repository::getInstance()->user->findByAlias($alias);
        $authUser = Repository::getInstance()->user->getAuthUser();

        if ($user && $user->id !== $authUser->id){
            return false;
        }

        return true;
    }

    /**
     * Checks whether the alias belongs to the current user
     *
     * @param string $alias
     * @return bool
     */
    public function belongsToUser(string $alias)
    {
        $user = Repository::getInstance()->user->findByAlias($alias);
        $authUser = Repository::getInstance()->user->getAuthUser();

        return $user && $user->id == $authUser->id;
    }
}
