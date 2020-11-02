<?php

namespace App\Services\Service\User;

use App\Http\Requests\User\Social\CreateSocialRequest;
use App\Repositories\Repository;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;

class CreateSocialService extends BaseService
{
    /**
     * Create social contact
     *
     * @param CreateSocialRequest $request
     */
    public function run(CreateSocialRequest $request)
    {
        DB::beginTransaction();

        $user = Repository::getInstance()->user->getAuthUser();

        $social = Repository::getInstance()->userSocial->startConditions();

        $social->user_id = $user->id;
        $social->social = $request->social;
        $social->url = $request->url;
        $social->save();

        $user->increment('socials');

        DB::commit();

        return true;
    }
}
