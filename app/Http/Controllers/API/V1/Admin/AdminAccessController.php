<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\Admin\Access\CreateAccessRequest;
use App\Http\Requests\Admin\Access\DeleteAccessRequest;
use App\Http\Requests\Admin\Access\UpdateAccessRequest;
use App\Repositories\Repository;
use App\Services\Service;

class AdminAccessController extends BaseController
{
    /**
     * Show all accesses
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $access = Repository::getInstance()->access->getAll();

        return $this->response($access, $access);
    }

    /**
     * Create a new access resources
     *
     * @param CreateAccessRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateAccessRequest $request)
    {
        $result = Service::getInstance()->admin->createAccess->run($request);

        return $this->response($result);
    }

    /**
     * Update access
     *
     * @param UpdateAccessRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateAccessRequest $request)
    {
        $result = Service::getInstance()->admin->updateAccess->run($request);

        return $this->response($result);
    }

    /**
     * Delete access
     *
     * @param DeleteAccessRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(DeleteAccessRequest $request)
    {
        $result = Service::getInstance()->admin->deleteAccess->run($request);

        return $this->response($result);
    }
}
