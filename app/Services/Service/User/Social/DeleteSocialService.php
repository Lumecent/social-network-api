<?php

namespace App\Services\Service\User\Social;

use App\Http\Requests\User\Social\DeleteSocialRequest;
use App\Repositories\Repository;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;

class DeleteSocialService extends BaseService
{
    /**
     * Delete user social
     *
     * @param DeleteSocialRequest $request
     * @return bool
     */
    public function run(DeleteSocialRequest $request)
    {
        $user = Repository::getInstance()->user->getAuthUser();
        $social = Repository::getInstance()->userSocial->findByUpdate($request->id, $user->id);

        DB::beginTransaction();

        $social->delete();

        $user->decrement('socials');

        DB::commit();

        return true;
    }
}
