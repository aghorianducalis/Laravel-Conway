<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $ct
 * @property int $x
 * @property int $y
 * @property int $z
 */
class Cell extends Model
{
    protected $table = 'cells';

    public $timestamps = false;

    /** @var int $ct */
    protected $ct; // ct

    /** @var int $x */
    protected $x; // x

    /** @var int $y */
    protected $y; // y

    /** @var int $z */
    protected $z; // z

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->ct = $attributes['ct'] ?? 0;
        $this->x = $attributes['x'] ?? 0;
        $this->y = $attributes['y'] ?? 0;
        $this->z = $attributes['z'] ?? 0;
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
