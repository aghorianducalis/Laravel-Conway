<?php

namespace Database\Seeders;

use Babylon\Factories\StateFactory;
use Babylon\Interfaces\Seeders\Seeder as SeederInterface;
use Babylon\Repositories\StateRepository;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder implements SeederInterface
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Babylon\Factories\StateFactory $factory */
        $factory = resolve(StateFactory::class);

        /** @var \Babylon\Repositories\StateRepository $repository */
        $repository = resolve(StateRepository::class);

        /** @var \Babylon\DTO\StateSetDTO $set */
        $set = $factory->generateEntitySet();

        $repository->saveEntitySet($set);
    }
}
