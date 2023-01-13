<?php

namespace Database\Seeders;

use Babylon\Factories\CellFactory;
use Babylon\Interfaces\Seeders\Seeder as SeederInterface;
use Babylon\Repositories\CellRepository;
use Illuminate\Database\Seeder;

class CellSeeder extends Seeder implements SeederInterface
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Babylon\Factories\CellFactory $factory */
        $factory = resolve(CellFactory::class);

        /** @var \Babylon\Repositories\CellRepository $repository */
        $repository = resolve(CellRepository::class);

        /** @var \Babylon\DTO\CellSetDTO $set */
        $set = $factory->generateEntitySet();

        $repository->saveEntitySet($set);
    }
}
