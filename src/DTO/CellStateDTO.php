<?php

namespace Babylon\DTO;

use Babylon\Interfaces\DTO\DTO;

/**
 * @property int $id
 * @property int $cell_id
 * @property int $state_id
 * @property int $generation
 */
class CellStateDTO implements DTO
{
    /** @var int $id */
    public $id;

    /** @var int $cell_id */
    public $cell_id;

    /** @var int $state_id */
    public $state_id;

    /** @var int $generation */
    public $generation;

    public function __construct(
        int $id,
        int $cell_id,
        int $state_id,
        int $generation
    )
    {
        $this->id = $id;
        $this->cell_id = $cell_id;
        $this->state_id = $state_id;
        $this->generation = $generation;
    }
}
