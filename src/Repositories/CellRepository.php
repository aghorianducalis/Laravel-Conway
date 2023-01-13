<?php

namespace Babylon\Repositories;

use App\Models\Cell;
use Babylon\DTO\CellDTO;
use Babylon\DTO\CellSetDTO;
use Babylon\Interfaces\DTO\DTO;
use Babylon\Interfaces\Manifolds\Manifold;
use Babylon\Interfaces\Repositories\Repository;

class CellRepository implements Repository
{
    /**
     * @param DTO|CellDTO $entity
     * @return void
     */
    public function saveEntity(DTO $entity): void
    {
        if (get_class($entity) === CellDTO::class) {
            /** @var Cell $record */
            $record = CellRepository::toManifold($entity);

            $record->save();
        } else {
//            throw new \Exception();
        }
    }

    /**
     * @param DTO|CellSetDTO $entitySet
     * @return void
     */
    public function saveEntitySet(DTO $entitySet): void
    {
        if (get_class($entitySet) === CellSetDTO::class) {
            $entities = $entitySet->dtoSet;

            /** @var CellDTO $entity */
            foreach ($entities as $i => $entity) {
                $this->saveEntity($entity);
            }
        } else {
//            throw new \Exception();
        }
    }

    /**
     * @param Manifold|Cell $entity
     * @return DTO|CellDTO
     */
    public static function toDTO(Manifold $entity): DTO
    {
        $dto = new CellDTO(
            $entity->getAttribute('id'),
            $entity->getAttribute('ct'),
            $entity->getAttribute('x'),
            $entity->getAttribute('y'),
            $entity->getAttribute('z')
        );

        return $dto;
    }

    /**
     * @param DTO|CellDTO $entity
     * @return Manifold|Cell
     */
    public static function toManifold(DTO $entity): Manifold
    {
        $data = [
            'id' => $entity->id,
            'ct' => $entity->ct,
            'x' => $entity->x,
            'y' => $entity->y,
            'z' => $entity->z,
        ];

        $object = new Cell($data);

        return $object;
    }
}
