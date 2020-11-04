<?php

namespace App\Services\Service\Admin;

use App\Http\Requests\Admin\Social\CreateSocialRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class CreateSocialService extends BaseService
{
    /**
     * Create new social
     *
     * @param CreateSocialRequest $request
     * @return bool
     */
    public function run(CreateSocialRequest $request)
    {
        $social = Repository::getInstance()->social->startConditions();

        $social->name = $request->name;
        $social->regex = $request->regex;

        return $social->save();
    }
}
