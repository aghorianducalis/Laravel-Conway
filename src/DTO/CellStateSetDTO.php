<?php

namespace Babylon\DTO;

use Babylon\Interfaces\DTO\DTO;

/**
 *
 * @property array|CellStateDTO[] $dtoSet
 */
class CellStateSetDTO implements DTO
{
    /** @var array|CellStateDTO[] $dtoSet */
    public $dtoSet;

    /**
     * @param array|CellStateDTO[] $dtoSet
     */
    public function __construct(
        array $dtoSet
    )
    {
        $this->dtoSet = $dtoSet;
    }
}
