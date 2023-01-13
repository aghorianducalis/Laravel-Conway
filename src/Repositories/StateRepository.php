<?php

namespace Babylon\Repositories;

use App\Models\State;
use Babylon\DTO\StateDTO;
use Babylon\DTO\StateSetDTO;
use Babylon\Interfaces\DTO\DTO;
use Babylon\Interfaces\Manifolds\Manifold;
use Babylon\Interfaces\Repositories\Repository;

class StateRepository implements Repository
{
    /**
     * @param DTO|StateDTO $entity
     * @return void
     */
    public function saveEntity(DTO $entity): void
    {
        if (get_class($entity) === StateDTO::class) {
            /** @var State $record */
            $record = StateRepository::toManifold($entity);

            $record->save();
        } else {
//            throw new \Exception();
        }
    }

    /**
     * @param DTO|StateSetDTO $entitySet
     * @return void
     */
    public function saveEntitySet(DTO $entitySet): void
    {
        if (get_class($entitySet) === StateSetDTO::class) {
            $entities = $entitySet->dtoSet;

            /** @var StateDTO $entity */
            foreach ($entities as $i => $entity) {
                $this->saveEntity($entity);
            }
        } else {
//            throw new \Exception();
        }
    }

    /**
     * @param Manifold|State $entity
     * @return DTO|StateDTO
     */
    public static function toDTO(Manifold $entity): DTO
    {
        $dto = new StateDTO(
            $entity->getAttribute('id'),
            $entity->getAttribute('a')
        );

        return $dto;
    }

    /**
     * @param DTO|StateDTO $entity
     * @return Manifold|State
     */
    public static function toManifold(DTO $entity): Manifold
    {
        $data = [
            'id' => $entity->id,
            'a' => $entity->a,
        ];

        $object = new State($data);

        return $object;
    }
}
