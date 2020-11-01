<?php

namespace App\Services\Service\General;

use App\Repositories\Repository;
use App\Services\BaseService;

class ResourceBelongsTo extends BaseService
{
    private $authUser;

    public function init()
    {
        $this->authUser = Repository::getInstance()->user->getAuthUser();
    }

    /**
     * Checks whether the resource exists and belongs to the current user
     *
     * @param string $nameResource
     * @param integer $resourceID
     * @return false|mixed
     */
    public function belongsTo(string $nameResource, int $resourceID)
    {
        $methodName = 'resource' . ucfirst($nameResource);

        if (method_exists($this, $methodName)){
            return call_user_func_array([$this, $methodName], [Repository::getInstance()->user->getAuthUser()->id, $resourceID]);
        }

        throw new \InvalidArgumentException("Resource '{$nameResource}' not found", 400);
    }

    /**
     * Resource social
     *
     * @param int $userID
     * @param int $resourceID
     * @return mixed
     */
    protected function resourceSocial(int $userID, int $resourceID)
    {
        return Repository::getInstance()->userSocial->findByUpdate($resourceID, $userID);
    }
}
