<?php

namespace Babylon\DTO;

use Babylon\Interfaces\DTO\DTO;

/**
 * @property int $id
 * @property int $ct
 * @property int $x
 * @property int $y
 * @property int $z
 */
class CellDTO implements DTO
{
    /** @var int $id */
    public $id;

    /** @var int $ct */
    public $ct; // ct

    /** @var int $x */
    public $x; // x

    /** @var int $y */
    public $y; // y

    /** @var int $z */
    public $z; // z

    public function __construct(
        int $id,
        int $ct,
        int $x,
        int $y,
        int $z
    )
    {
        $this->id = $id;
        $this->ct = $ct;
        $this->x = $x;
        $this->y = $y;
        $this->z = $z;
    }

    /**
     * Determines whether the current entity and another entity are neighbours.
     *
     * @param CellDTO $entity
     * @return bool true if entities are neighbours
     */
    public function isNeighbour(CellDTO $entity): bool
    {
        $distance = ($this->ct - $entity->ct) * ($this->ct - $entity->ct)
            + ($this->x - $entity->x) * ($this->x - $entity->x)
            + ($this->y - $entity->y) * ($this->y - $entity->y)
            + ($this->z - $entity->z) * ($this->z - $entity->z);

        $result = (self::class === get_class($entity)) && ($distance > 0) && ($distance <= 3);

        return $result;
    }
}
