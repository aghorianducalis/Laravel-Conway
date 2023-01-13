<?php

namespace Babylon\Factories;

use Babylon\DTO\StateDTO;
use Babylon\DTO\StateSetDTO;
use Babylon\Interfaces\DTO\DTO;
use Babylon\Interfaces\Factories\Factory;

class StateFactory implements Factory
{
    /**
     * @return DTO|StateDTO
     */
    public function generateEntity(): DTO
    {
        $map = [0, 0];
        $map = [1, 1];

        $dto = new StateDTO(1, rand(0, 1));

        return $dto;
    }

    /**
     * @return DTO|StateSetDTO
     */
    public function generateEntitySet(): DTO
    {
        $map = [
            [0, 0],
            [1, 1],
        ];

        $set = new StateSetDTO(
            [
                new StateDTO(1, 0),
                new StateDTO(2, 1),
            ]
        );

        return $set;
    }
}
