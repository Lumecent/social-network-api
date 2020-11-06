<?php

namespace App\Services\Service\Admin\Tag;

use App\Http\Requests\Admin\Tag\DeleteTagRequest;
use App\Repositories\Repository;
use App\Services\BaseService;

class DeleteTagService extends BaseService
{
    /**
     * Delete tag
     *
     * @param DeleteTagRequest $request
     * @return bool|null
     * @throws \Exception
     */
    public function run(DeleteTagRequest $request)
    {
        $tag = Repository::getInstance()->tag->findById($request->id);

        return $tag->delete();
    }
}
