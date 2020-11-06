<?php

namespace App\Services\Service\Admin\Published;

use App\Http\Requests\Admin\Published\DeletePublishedRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class DeletePublishedService extends BaseService
{
    /**
     * Delete type published
     *
     * @param DeletePublishedRequest $request
     * @return bool|null
     * @throws \Exception
     */
    public function run(DeletePublishedRequest $request)
    {
        $published = Repository::getInstance()->published->findById($request->id);

        return $published->delete();
    }
}
