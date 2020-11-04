<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\Admin\Social\CreateSocialRequest;
use App\Http\Requests\Admin\Social\DeleteSocialRequest;
use App\Http\Requests\Admin\Social\UpdateSocialRequest;
use App\Repositories\Repository;
use App\Services\Service;

class AdminSocialController extends BaseController
{
    /**
     * Getting all social
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $social = Repository::getInstance()->social->getAll();

        return $this->response($social, [$social]);
    }

    /**
     * Create new social
     *
     * @param CreateSocialRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateSocialRequest $request)
    {
        $result = Service::getInstance()->admin->createSocial->run($request);

        return $this->response($result);
    }

    /**
     * Update social
     *
     * @param UpdateSocialRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateSocialRequest $request)
    {
        $result = Service::getInstance()->admin->updateSocial->run($request);

        return $this->response($result);
    }

    /**
     * Delete social
     *
     * @param DeleteSocialRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(DeleteSocialRequest $request)
    {
        $result = Service::getInstance()->admin->deleteSocial->run($request);

        return $this->response($result);
    }
}
