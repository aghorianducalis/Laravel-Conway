<?php

namespace Babylon\Interfaces\Repositories;

use Babylon\Interfaces\DTO\DTO;
use Babylon\Interfaces\Manifolds\Manifold;

interface Repository
{
    public function saveEntity(DTO $entity): void;

    public function saveEntitySet(DTO $entitySet): void;

    public function getDTO($id);

    /**
     * @param array $ids
     * @return mixed|array|DTO|DTO[]
     */
    public function getDTOSet(array $ids = []);

//    public function getEntity($id): Manifold;

//    public function getEntitySet(array $ids = []): array;


    // todo move to another layer (mapper)
    public static function toDTO(Manifold $entity): DTO;

    public static function toManifold(DTO $entity): Manifold;
}
