<?php

namespace App\Services\Service\Admin;

use App\Http\Requests\Admin\Access\UpdateAccessRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class UpdateAccessService extends BaseService
{
    /**
     * Update access
     *
     * @param UpdateAccessRequest $request
     * @return bool
     */
    public function run(UpdateAccessRequest $request)
    {
        $access = Repository::getInstance()->access->findById($request->id);

        $access->name = $request->name;

        return $access->save();
    }
}
