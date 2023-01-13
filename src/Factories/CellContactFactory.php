<?php

namespace Babylon\Factories;

use Babylon\DTO\CellContactDTO;
use Babylon\DTO\CellContactSetDTO;
use Babylon\Interfaces\DTO\DTO;
use Babylon\Interfaces\Factories\Factory;

class CellContactFactory implements Factory
{
    /**
     * @return DTO|CellContactDTO
     */
    public function generateEntity(): DTO
    {
        $dto = new CellContactDTO(1, 1, 1);

        return $dto;
    }

    /**
     * @return DTO|CellContactSetDTO
     */
    public function generateEntitySet(): DTO
    {
        /** @var \Babylon\Interfaces\Factories\Factory|CellFactory $factory */
        $factory = resolve(CellFactory::class);

        /** @var array|DTO[] $entitySet */
        $entitySet = $factory->getEntitySet();

        /** @var array|DTO|CellContactDTO[] $dtoArray */
        $dtoArray = [];

        $id = 1;

        /** @var DTO|\Babylon\DTO\CellDTO $entity1 */
        foreach ($entitySet as $entity1) {

            /** @var DTO|\Babylon\DTO\CellDTO $entity2 */
            foreach ($entitySet as $entity2) {

                if ($entity1->isNeighbour($entity2)) {

                    $dto = new CellContactDTO($id, $entity1->id, $entity2->id);

                    $dtoArray[] = $dto;

                    $id = $id + 1;
                }
            }
        }

        $set = new CellContactSetDTO($dtoArray);

        return $set;
    }
}
