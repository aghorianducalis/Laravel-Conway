<?php

use App\Http\Controllers\CellContactController;
use App\Http\Controllers\CellController;
use App\Http\Controllers\CellStateController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');

Route::namespace('conway')
    /*->middleware('')*/
    ->name('conway')
    ->prefix('conway')
    ->as('conway.')
    ->group(function () {
        Route::get('/', [PageController::class, 'create'])->name('create');
    });

Route::namespace('states')
    /*->middleware('')*/
    ->name('states')
    ->prefix('states')
    ->as('states.')
    ->group(function () {
        Route::get('/', [StateController::class, 'index'])->name('index');
    });

Route::namespace('cells')
    /*->middleware('')*/
    ->name('cells')
    ->prefix('cells')
    ->as('cells.')
    ->group(function () {
        Route::get('/', [CellController::class, 'index'])->name('index');
    });

Route::namespace('cell_contacts')
    /*->middleware('')*/
    ->name('cell_contacts')
    ->prefix('cell_contacts')
    ->as('cell_contacts.')
    ->group(function () {
        Route::get('/', [CellContactController::class, 'index'])->name('index');
    });

Route::namespace('cell_states')
    /*->middleware('')*/
    ->name('cell_states')
    ->prefix('cell_states')
    ->as('cell_states.')
    ->group(function () {
        Route::get('/{generation?}', [CellStateController::class, 'index'])->name('index');
        Route::post('/', [CellStateController::class, 'saveMany'])->name('save');
    });
