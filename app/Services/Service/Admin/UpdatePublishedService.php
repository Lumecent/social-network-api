<?php

namespace App\Services\Service\Admin;

use App\Http\Requests\Admin\Published\UpdatePublishedRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class UpdatePublishedService extends BaseService
{
    /**
     * Update type published
     *
     * @param UpdatePublishedRequest $request
     * @return bool
     */
    public function run(UpdatePublishedRequest $request)
    {
        $published = Repository::getInstance()->published->findById($request->id);

        $published->name = $request->name;

        return $published->save();
    }
}
