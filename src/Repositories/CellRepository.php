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
     * @param $entityId
     * @return CellDTO
     */
    public function getEntityDTO($entityId): CellDTO
    {
        /** @var Manifold|Cell $model */
        $model = Cell::query()->find($entityId);

        $dto = new CellDTO(
            $model->getAttribute('id'),
            $model->getAttribute('ct'),
            $model->getAttribute('x'),
            $model->getAttribute('y'),
            $model->getAttribute('z'),
        );

        return $dto;
    }

    /**
     * @param array $entityIds
     * @return CellSetDTO
     */
    public function getEntityDTOSet(array $entityIds = []): CellSetDTO
    {
        $dtoSet = [];

        foreach ($entityIds as $id) {
            $dto = $this->getEntityDTO($id);

            $dtoSet[] = $dto;
        }

        return new CellSetDTO($dtoSet);
    }

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
