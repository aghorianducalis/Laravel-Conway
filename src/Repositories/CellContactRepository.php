<?php

namespace Babylon\Repositories;

use App\Models\CellContact;
use Babylon\DTO\CellContactDTO;
use Babylon\DTO\CellContactSetDTO;
use Babylon\Interfaces\DTO\DTO;
use Babylon\Interfaces\Manifolds\Manifold;
use Babylon\Interfaces\Repositories\Repository;

class CellContactRepository implements Repository
{
    /**
     * @param $entityId
     * @return CellContactDTO
     */
    public function getEntityDTO($entityId): CellContactDTO
    {
        /** @var Manifold|CellContact $model */
        $model = CellContact::query()->find($entityId);

        $dto = new CellContactDTO(
            $model->getAttribute('id'),
            $model->getAttribute('cell_1_id'),
            $model->getAttribute('cell_2_id'),
        );

        return $dto;
    }

    /**
     * @param array $entityIds
     * @return CellContactSetDTO
     */
    public function getEntityDTOSet(array $entityIds = []): CellContactSetDTO
    {
        $dtoSet = [];

        foreach ($entityIds as $id) {
            $dto = $this->getEntityDTO($id);

            $dtoSet[] = $dto;
        }

        return new CellContactSetDTO($dtoSet);
    }

    /**
     * @param DTO|CellContactDTO $entity
     * @return void
     */
    public function saveEntity(DTO $entity): void
    {
        if (get_class($entity) === CellContactDTO::class) {
            /** @var CellContact $record */
            $record = CellContactRepository::toManifold($entity);

            $record->save();
        } else {
//            throw new \Exception();
        }
    }

    /**
     * @param DTO|CellContactSetDTO $entitySet
     * @return void
     */
    public function saveEntitySet(DTO $entitySet): void
    {
        if (get_class($entitySet) === CellContactSetDTO::class) {
            $entities = $entitySet->dtoSet;

            /** @var CellContactDTO $entity */
            foreach ($entities as $i => $entity) {
                $this->saveEntity($entity);
            }
        } else {
//            throw new \Exception();
        }
    }

    /**
     * @param Manifold|CellContact $entity
     * @return DTO|CellContactDTO
     */
    public static function toDTO(Manifold $entity): DTO
    {
        $dto = new CellContactDTO(
            $entity->getAttribute('id'),
            $entity->getAttribute('cell_1_id'),
            $entity->getAttribute('cell_2_id')
        );

        return $dto;
    }

    /**
     * @param DTO|CellContactDTO $entity
     * @return Manifold|CellContact
     */
    public static function toManifold(DTO $entity): Manifold
    {
        $data = [
            'id' => $entity->id,
            'cell_1_id' => $entity->cell_1_id,
            'cell_2_id' => $entity->cell_2_id,
        ];

        $object = new CellContact($data);

        return $object;
    }
}
