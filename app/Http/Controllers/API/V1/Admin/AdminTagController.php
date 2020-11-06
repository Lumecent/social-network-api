<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\API\V1\BaseController;
use App\Http\Requests\Admin\Tag\CreateTagRequest;
use App\Http\Requests\Admin\Tag\DeleteTagRequest;
use App\Http\Requests\Admin\Tag\UpdateTagRequest;
use App\Repositories\Repository;
use App\Services\Service;

class AdminTagController extends BaseController
{
    /**
     * Show all tags
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tag = Repository::getInstance()->tag->getAll();

        return $this->response($tag, $tag);
    }

    /**
     * Create a new tag
     *
     * @param CreateTagRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateTagRequest $request)
    {
        $result = Service::getInstance()->admin->createTag->run($request);

        return $this->response($result);
    }

    /**
     * Update tag
     *
     * @param UpdateTagRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTagRequest $request)
    {
        $result = Service::getInstance()->admin->updateTag->run($request);

        return $this->response($result);
    }

    /**
     * Delete tag
     *
     * @param DeleteTagRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(DeleteTagRequest $request)
    {
        $result = Service::getInstance()->admin->deleteTag->run($request);

        return $this->response($result);
    }
}
