<?php

namespace Babylon\DTO;

use Babylon\Interfaces\DTO\DTO;

/**
 * @property int $id
 * @property int $cell_1_id
 * @property int $cell_2_id
 */
class CellContactDTO implements DTO
{
    /** @var int $id */
    public $id;

    /** @var int $cell_1_id */
    public $cell_1_id;

    /** @var int $cell_2_id */
    public $cell_2_id;

    public function __construct(
        int $id,
        int $cell_1_id,
        int $cell_2_id
    )
    {
        $this->id = $id;
        $this->cell_1_id = $cell_1_id;
        $this->cell_2_id = $cell_2_id;
    }
}
