<?php

namespace App\Providers;

use Babylon\Factories\CellContactFactory;
use Babylon\Factories\CellFactory;
use Babylon\Factories\CellStateFactory;
use Babylon\Factories\StateFactory;
use Babylon\Repositories\CellContactRepository;
use Babylon\Repositories\CellRepository;
use Babylon\Repositories\CellStateRepository;
use Babylon\Repositories\StateRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * All the container singletons that should be registered.
     *
     * @var array|string[] $singletons
     */
    public $singletons = [
        // services

        CellRepository::class           => CellRepository::class,
        CellContactRepository::class    => CellContactRepository::class,
        StateRepository::class          => StateRepository::class,
        CellStateRepository::class      => CellStateRepository::class,

        CellFactory::class              => CellFactory::class,
        CellContactFactory::class       => CellContactFactory::class,
        StateFactory::class             => StateFactory::class,
        CellStateFactory::class         => CellStateFactory::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
