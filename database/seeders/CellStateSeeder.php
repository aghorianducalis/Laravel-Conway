<?php

namespace Database\Seeders;

use Babylon\Factories\CellStateFactory;
use Babylon\Interfaces\Seeders\Seeder as SeederInterface;
use Babylon\Repositories\CellStateRepository;
use Illuminate\Database\Seeder;

class CellStateSeeder extends Seeder implements SeederInterface
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Babylon\Factories\CellStateFactory $factory */
        $factory = resolve(CellStateFactory::class);

        /** @var \Babylon\Repositories\CellStateRepository $repository */
        $repository = resolve(CellStateRepository::class);

        /** @var \Babylon\DTO\CellStateSetDTO $set */
        $set = $factory->generateEntitySet();

        $repository->saveEntitySet($set);
    }
}
