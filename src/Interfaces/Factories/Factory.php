<?php

namespace Babylon\Interfaces\Factories;

use Babylon\Interfaces\DTO\DTO;

interface Factory
{
    function generateEntity(): DTO;

    function generateEntitySet(): DTO;
}
