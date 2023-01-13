<?php

namespace Babylon\DTO;

use Babylon\Interfaces\DTO\DTO;

/**
 *
 * @property array|CellDTO[] $dtoSet
 */
class CellSetDTO implements DTO
{
    /** @var array|CellDTO[] $dtoSet */
    public $dtoSet;

    /**
     * @param array|CellDTO[] $dtoSet
     */
    public function __construct(
        array $dtoSet
    )
    {
        $this->dtoSet = $dtoSet;
    }
}
