<?php

namespace Babylon\DTO;

use Babylon\Interfaces\DTO\DTO;

/**
 *
 * @property array|StateDTO[] $dtoSet
 */
class StateSetDTO implements DTO
{
    /** @var array|StateDTO[] $dtoSet */
    public $dtoSet;

    public function __construct(
        array $dtoSet
    )
    {
        $this->dtoSet = $dtoSet;
    }
}
