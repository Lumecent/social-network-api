<?php

namespace App\Services\Service\Admin\Access;

use App\Helpers\StringClean;
use App\Http\Requests\Admin\Access\CreateAccessRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class CreateAccessService extends BaseService
{
    /**
     * Create a new access resources
     *
     * @param CreateAccessRequest $request
     * @return bool
     */
    public function run(CreateAccessRequest $request)
    {
        $access = Repository::getInstance()->access->startConditions();

        $access->name = StringClean::cleanSpace($request->name);;

        return $access->save();
    }
}
