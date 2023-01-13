<?php

namespace Database\Seeders;

use Babylon\Factories\CellContactFactory;
use Babylon\Interfaces\Seeders\Seeder as SeederInterface;
use Babylon\Repositories\CellContactRepository;
use Illuminate\Database\Seeder;

class CellContactSeeder extends Seeder implements SeederInterface
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Babylon\Factories\CellContactFactory $factory */
        $factory = resolve(CellContactFactory::class);

        /** @var \Babylon\Repositories\CellContactRepository $repository */
        $repository = resolve(CellContactRepository::class);

        /** @var \Babylon\DTO\CellContactSetDTO $set */
        $set = $factory->generateEntitySet();

        $repository->saveEntitySet($set);
    }
}
