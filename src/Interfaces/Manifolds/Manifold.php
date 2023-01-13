<?php

namespace Babylon\Interfaces\Manifolds;

interface Manifold
{
    /**
     * @return int number of variables
     */
    function getDimension(): int;
}
