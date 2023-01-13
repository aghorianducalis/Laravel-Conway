<?php

namespace Babylon\Interfaces\Repositories;

use Babylon\Interfaces\DTO\DTO;
use Babylon\Interfaces\Manifolds\Manifold;

interface Repository
{
    public function saveEntity(DTO $entity): void;

    public function saveEntitySet(DTO $entitySet): void;

    // todo move to separate layer (mapper)
    public static function toDTO(Manifold $entity): DTO;

    public static function toManifold(DTO $entity): Manifold;
}
