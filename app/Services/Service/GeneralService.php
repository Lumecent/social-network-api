<?php

namespace App\Services\Service;

use App\Factory;
use App\Services\Service\General\AliasBelongsTo;

/**
 * @property AliasBelongsTo $alias
 *
 * Class GeneralService
 * @package App\Services\Service
 */
class GeneralService extends Factory
{
    protected function aliases()
    {
        return [
            'alias' => AliasBelongsTo::class
        ];
    }
}
