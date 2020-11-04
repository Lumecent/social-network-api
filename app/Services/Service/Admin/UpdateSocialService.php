<?php

namespace App\Services\Service\Admin;

use App\Http\Requests\Admin\Social\UpdateSocialRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class UpdateSocialService extends BaseService
{
    /**
     * Update social
     *
     * @param UpdateSocialRequest $request
     * @return bool
     */
    public function run(UpdateSocialRequest $request)
    {
        $social = Repository::getInstance()->social->findById($request->get('id'));

        $social->name = $request->name;
        $social->regex = $request->regex;

        return $social->save();
    }
}
