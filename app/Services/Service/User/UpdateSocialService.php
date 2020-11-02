<?php

namespace App\Services\Service\User;

use App\Http\Requests\User\Social\UserUpdateSocialRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class UpdateSocialService extends BaseService
{
    /**
     * Update user social
     *
     * @param UserUpdateSocialRequest $request
     * @return mixed
     */
    public function run(UserUpdateSocialRequest $request)
    {
        $user = Repository::getInstance()->user->getAuthUser();

        $social = Repository::getInstance()->userSocial->findByUpdate($request->id, $user->id);

        $social->social = $request->social;
        $social->url = $request->url;

        return $social->save();
    }
}
