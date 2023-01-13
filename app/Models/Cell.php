<?php

namespace App\Models;

use Babylon\Interfaces\Manifolds\Manifold;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $ct
 * @property int $x
 * @property int $y
 * @property int $z
 */
class Cell extends Model implements Manifold
{
    protected $table = 'cells';

    public $timestamps = false;

    /** @var int $ct */
    public $ct; // ct

    /** @var int $x */
    public $x; // x

    /** @var int $y */
    public $y; // y

    /** @var int $z */
    public $z; // z

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->ct = $attributes['ct'] ?? 0;
        $this->x = $attributes['x'] ?? 0;
        $this->y = $attributes['y'] ?? 0;
        $this->z = $attributes['z'] ?? 0;
    }

    public function getDimension(): int
    {
        return 4;
    }

    /**
     * The cells associated with the cell.
     * The cell's neighbours.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cellContacts(): BelongsToMany
    {
        return $this->belongsToMany(
            Cell::class,
            'cell_cell',
            'cell_1_id',
            'cell_2_id')
            ->using(CellContact::class)
            ->wherePivot('cell_1_id', '!=', 'cell_2_id')
            ->withPivot(
                'id',
                'cell_1_id',
                'cell_2_id',
            )
            ->as('contact');
    }

    /**
     * The states associated with the cell.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function states(): BelongsToMany
    {
        return $this->belongsToMany(State::class)->using(CellState::class);
    }
}
