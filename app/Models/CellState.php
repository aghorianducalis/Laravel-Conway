<?php

namespace App\Models;

use Babylon\Interfaces\Manifolds\Manifold;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $id
 * @property int $cell_id
 * @property int $state_id
 * @property int $generation
 */
class CellState extends Pivot implements Manifold
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    public $timestamps = false;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->cell_id = $attributes['cell_id'] ?? 0;
        $this->state_id = $attributes['state_id'] ?? 0;
        $this->generation = $attributes['generation'] ?? 0;
    }

    public function getDimension(): int
    {
        return 3;
    }
}
