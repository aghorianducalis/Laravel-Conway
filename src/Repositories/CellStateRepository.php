<?php

namespace Babylon\Repositories;

use App\Models\CellState;
use Babylon\DTO\CellStateDTO;
use Babylon\DTO\CellStateSetDTO;
use Babylon\Interfaces\DTO\DTO;
use Babylon\Interfaces\Manifolds\Manifold;
use Babylon\Interfaces\Repositories\Repository;

class CellStateRepository implements Repository
{
    /**
     * @param $id
     * @return CellStateDTO
     */
    public function getDTO($id): CellStateDTO
    {
        /** @var Manifold|CellState $model */
        $model = CellState::query()->find($id);

        $dto = new CellStateDTO(
            $model->id,
            $model->cell_id,
            $model->state_id,
            $model->generation
        );

        return $dto;
    }

    /**
     * @param array $ids
     * @return CellStateSetDTO
     */
    public function getDTOSet(array $ids = []): CellStateSetDTO
    {
        $dtoSet = [];

        foreach ($ids as $id) {
            $dto = $this->getDTO($id);

            $dtoSet[] = $dto;
        }

        return new CellStateSetDTO($dtoSet);
    }

    /**
     * @param DTO|CellStateDTO $entity
     * @return void
     */
    public function saveEntity(DTO $entity): void
    {
        if (get_class($entity) === CellStateDTO::class) {
            /** @var CellState $record */
            $record = CellStateRepository::toManifold($entity);

            $record->save();
        } else {
//            throw new \Exception();
        }
    }

    /**
     * @param DTO|CellStateSetDTO $entitySet
     * @return void
     */
    public function saveEntitySet(DTO $entitySet): void
    {
        if (get_class($entitySet) === CellStateSetDTO::class) {
            $entities = $entitySet->dtoSet;

            /** @var CellStateDTO $entity */
            foreach ($entities as $i => $entity) {
                $this->saveEntity($entity);
            }
        } else {
//            throw new \Exception();
        }
    }

    /**
     * @param Manifold|CellState $entity
     * @return DTO|CellStateDTO
     */
    public static function toDTO(Manifold $entity): DTO
    {
        $dto = new CellStateDTO(
            $entity->getAttribute('id'),
            $entity->getAttribute('cell_id'),
            $entity->getAttribute('state_id'),
            $entity->getAttribute('generation')
        );

        return $dto;
    }

    /**
     * @param DTO|CellStateDTO $entity
     * @return Manifold|CellState
     */
    public static function toManifold(DTO $entity): Manifold
    {
        $data = [
            'id' => $entity->id,
            'cell_id' => $entity->cell_id,
            'state_id' => $entity->state_id,
            'generation' => $entity->generation,
        ];

        $object = new CellState($data);

        return $object;
    }
}
