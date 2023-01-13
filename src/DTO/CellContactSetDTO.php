<?php

namespace Babylon\DTO;

use Babylon\Interfaces\DTO\DTO;

/**
 *
 * @property array|CellContactDTO[] $dtoSet
 */
class CellContactSetDTO implements DTO
{
    /** @var array|CellContactDTO[] $dtoSet */
    public $dtoSet;

    /**
     * @param array|CellContactDTO[] $dtoSet
     */
    public function __construct(
        array $dtoSet
    )
    {
        $this->dtoSet = $dtoSet;
    }
}
