<?php

namespace App\Services\Service\Admin;

use App\Http\Requests\Admin\Social\DeleteSocialRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class DeleteSocialService extends BaseService
{
    /**
     * Delete social
     *
     * @param DeleteSocialRequest $request
     * @return bool|null
     * @throws \Exception
     */
    public function run(DeleteSocialRequest $request)
    {
        $social = Repository::getInstance()->social->findById($request->id);

        return $social->delete();
    }
}
