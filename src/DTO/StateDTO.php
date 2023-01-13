<?php

namespace Babylon\DTO;

use Babylon\Interfaces\DTO\DTO;

/**
 * @property int $id
 * @property int $a
 */
class StateDTO implements DTO
{
    /** @var int $id */
    public $id;

    /** @var int $a */
    public $a;

    public function __construct(
        int $id,
        int $a
    )
    {
        $this->id = $id;
        $this->a = $a;
    }
}
