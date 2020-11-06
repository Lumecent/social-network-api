<?php

namespace App\Services\Service\Admin\Access;

use App\Http\Requests\Admin\Access\DeleteAccessRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class DeleteAccessService extends BaseService
{
    /**
     * Delete access
     *
     * @param DeleteAccessRequest $request
     * @return bool|null
     * @throws \Exception
     */
    public function run(DeleteAccessRequest $request)
    {
        $access = Repository::getInstance()->access->findById($request->id);

        return $access->delete();
    }
}
