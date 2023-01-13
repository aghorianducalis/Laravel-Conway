<?php

namespace App\Models;

use Babylon\Interfaces\Manifolds\Manifold;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $id
 * @property int $a
 */
class State extends Model implements Manifold
{
    protected $table = 'states';

    public $timestamps = false;

    /** @var int $a */
    public $a;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->a = $attributes['a'] ?? 0;
    }

    public function getDimension(): int
    {
        return 1;
    }

    /**
     * The cells associated with the state.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function cells(): BelongsToMany
    {
        return $this->belongsToMany(Cell::class)->using(CellState::class);
    }
}
