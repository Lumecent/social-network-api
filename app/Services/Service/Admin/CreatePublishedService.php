<?php

namespace App\Services\Service\Admin;

use App\Http\Requests\Admin\Published\CreatePublishedRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class CreatePublishedService extends BaseService
{
    /**
     * Create a new type published resources
     *
     * @param CreatePublishedRequest $request
     * @return bool
     */
    public function run(CreatePublishedRequest $request)
    {
        $published = Repository::getInstance()->published->startConditions();

        $published->name = $request->name;

        return $published->save();
    }
}
