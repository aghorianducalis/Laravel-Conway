<?php

namespace App\Models;

use Babylon\Interfaces\Manifolds\Manifold;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @property int $id
 * @property int $cell_1_id
 * @property int $cell_2_id
 */
class CellContact extends Pivot implements Manifold
{
    protected $table = 'cell_cell';

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

        $this->cell_1_id = $attributes['cell_1_id'] ?? 0;
        $this->cell_2_id = $attributes['cell_2_id'] ?? 0;
    }

    public function getDimension(): int
    {
        return 2;
    }
}
