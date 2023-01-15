<?php

namespace Babylon\Interfaces\Repositories;

use Babylon\Interfaces\DTO\DTO;
use Babylon\Interfaces\Manifolds\Manifold;

interface Repository
{
    public function saveEntity(DTO $entity): void;

    public function saveEntitySet(DTO $entitySet): void;

    public function getEntityDTO($entityId);

    /**
     * @param array $entityIds
     * @return mixed|array|DTO|DTO[]
     */
    public function getEntityDTOSet(array $entityIds = []);

//    public function getEntity($id): Manifold;

//    public function getEntitySet(array $ids = []): array;


    // todo move to another layer (mapper)
    public static function toDTO(Manifold $entity): DTO;

    public static function toManifold(DTO $entity): Manifold;
}
