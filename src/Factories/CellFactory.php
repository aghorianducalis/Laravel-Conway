<?php

namespace Babylon\Factories;

use Babylon\DTO\CellDTO;
use Babylon\DTO\CellSetDTO;
use Babylon\Interfaces\DTO\DTO;
use Babylon\Interfaces\Factories\Factory;
use Babylon\Interfaces\Manifolds\Manifold;
use Babylon\Repositories\CellRepository;

class CellFactory implements Factory
{
    /**
     * @return DTO|CellDTO
     */
    public function generateEntity(): DTO
    {
        $dto = new CellDTO(1, 1, 1, 1, 1);

        return $dto;
    }

    /**
     * @return DTO|CellSetDTO
     */
    public function generateEntitySet(): DTO
    {
        /** @var array|DTO|CellDTO[] $dtoArray */
        $dtoArray = [];

        $id = 1;
        $ctLength = 1;
        $xLength = 10;
        $yLength = 10;
        $zLength = 1;

        for ($ct = 0; $ct < $ctLength; $ct++) {
            for ($x = 0; $x < $xLength; $x++) {
                for ($y = 0; $y < $yLength; $y++) {
                    for ($z = 0; $z < $zLength; $z++) {

                        $dto = new CellDTO($id, $ct, $x, $y, $z);

                        $dtoArray[] = $dto;

                        $id = $id + 1;
                    }
                }
            }
        }

        $set = new CellSetDTO($dtoArray);

        return $set;
    }

    /**
     * @return array|DTO[]
     */
    public function getEntitySet(): array
    {
        /** @var \Illuminate\Database\Eloquent\Collection $entityArray */
        $entityArray = \App\Models\Cell::query()->get();

        /** @var array|DTO[] $entitySet */
        $entitySet = [];

        /** @var \App\Models\Cell|Manifold $entityItem */
        foreach ($entityArray as $entityItem) {

            $dto = CellRepository::toDTO($entityItem);

            $entitySet[] = $dto;
        }

        return $entitySet;
    }
}
