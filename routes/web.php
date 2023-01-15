<?php

use App\Http\Controllers\DataSetController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::namespace('conway')
    /*->middleware('')*/
    ->name('conway')
    ->prefix('conway')
    ->as('conway.')
    ->group(function () {

//        Route::get('/', [DataSetController::class, 'home'])->name('home');
        Route::get('/{id}', [DataSetController::class, 'show'])->name('show');
//        Route::post('/', [DataSetController::class, 'store'])->name('save');

    });
