<?php

namespace Babylon\Factories;

use Babylon\DTO\CellDTO;
use Babylon\DTO\CellStateDTO;
use Babylon\DTO\CellStateSetDTO;
use Babylon\Interfaces\DTO\DTO;
use Babylon\Interfaces\Factories\Factory;
use Babylon\Interfaces\Manifolds\Manifold;

class CellStateFactory implements Factory
{
    /**
     * @return DTO|CellStateDTO
     */
    public function generateEntity(): DTO
    {
        $dto = new CellStateDTO(1, 1, 1, 1);

        return $dto;
    }

    /**
     * @return DTO|CellStateSetDTO
     */
    public function generateEntitySet(): DTO
    {
        /** @var \Babylon\Interfaces\Factories\Factory|CellFactory $factory */
        $factory = resolve(CellFactory::class);

        /** @var \App\Models\Cell[]|array|Manifold[] $entitySet */
        $entitySet = $factory->getEntitySet();

        /** @var array|DTO|CellStateDTO[] $dtoArray */
        $dtoArray = [];

        $id = 1;
        $state_id = 1;
        $generation = 1;

        /** @var Manifold|CellDTO $entity */
        foreach ($entitySet as $entity) {

            $dto = new CellStateDTO($id, $entity->id, $state_id, $generation);

            $dtoArray[] = $dto;

            $id = $id + 1;
        }

        $set = new CellStateSetDTO($dtoArray);

        return $set;
    }
}
