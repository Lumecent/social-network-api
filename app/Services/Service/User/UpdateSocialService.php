<?php

namespace App\Services\Service\User;

use App\Http\Requests\User\Social\UpdateSocialRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class UpdateSocialService extends BaseService
{
    /**
     * Update user social
     *
     * @param UpdateSocialRequest $request
     * @return mixed
     */
    public function run(UpdateSocialRequest $request)
    {
        $user = Repository::getInstance()->user->getAuthUser();

        $social = Repository::getInstance()->userSocial->findByUpdate($request->id, $user->id);

        $social->social = $request->social;
        $social->url = $request->url;

        return $social->save();
    }
}
