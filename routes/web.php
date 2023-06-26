<?php

use App\Http\Controllers\Backend\AcademieController;
use App\Http\Controllers\Backend\EcoleController;
use App\Http\Controllers\Backend\OptionController;
use App\Http\Controllers\Backend\ParametreController;
use App\Http\Controllers\Backend\PersonnelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('accueil');
})->name('accueil');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('admin')->name('admin.')->group(function () {

    Route::prefix('parametres')->name('parametres.')->group(function () {

        Route::get('information', [ParametreController::class, 'index'])->name('index');

        Route::resource('academie', AcademieController::class)->except('show', 'create', 'edit', 'update');

        Route::resource('ecole', EcoleController::class);

        Route::resource('personnel', PersonnelController::class);

        Route::get('details-personnel/{id}', [PersonnelController::class, 'creerPersonnel'])->name('creerPersonnel');

        Route::resource('option', OptionController::class);
    });
});
