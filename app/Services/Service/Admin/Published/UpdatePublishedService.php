<?php

namespace App\Services\Service\Admin\Published;

use App\Helpers\StringClean;
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

        $published->name = StringClean::cleanSpace($request->name);;

        return $published->save();
    }
}
