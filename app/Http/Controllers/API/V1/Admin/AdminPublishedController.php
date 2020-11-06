<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\Admin\Published\CreatePublishedRequest;
use App\Http\Requests\Admin\Published\DeletePublishedRequest;
use App\Http\Requests\Admin\Published\UpdatePublishedRequest;
use App\Repositories\Repository;
use App\Services\Service;

class AdminPublishedController extends BaseController
{
    /**
     * Show all types published resources
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $published = Repository::getInstance()->published->getAll();

        return $this->response($published, $published);
    }

    /**
     * Create a new type published resources
     *
     * @param CreatePublishedRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreatePublishedRequest $request)
    {
        $result = Service::getInstance()->admin->createPublished->run($request);

        return $this->response($result);
    }

    /**
     * Update type published
     *
     * @param UpdatePublishedRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdatePublishedRequest $request)
    {
        $result = Service::getInstance()->admin->updatePublished->run($request);

        return $this->response($result);
    }

    /**
     * Delete type published
     *
     * @param DeletePublishedRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(DeletePublishedRequest $request)
    {
        $result = Service::getInstance()->admin->deletePublished->run($request);

        return $this->response($result);
    }
}
