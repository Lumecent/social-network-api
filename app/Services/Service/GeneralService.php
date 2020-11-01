<?php

namespace App\Services\Service;

use App\Factory;
use App\Services\Service\General\AliasBelongsTo;
use App\Services\Service\General\ResourceBelongsTo;

/**
 * @property AliasBelongsTo $alias
 * @property ResourceBelongsTo $resource
 *
 * Class GeneralService
 * @package App\Services\Service
 */
class GeneralService extends Factory
{
    protected function aliases()
    {
        return [
            'alias' => AliasBelongsTo::class,
            'resource' => ResourceBelongsTo::class
        ];
    }
}
