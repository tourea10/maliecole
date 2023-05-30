<?php

use App\Http\Controllers\Backend\ParametreController;
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

    Route::get('/les-academies', [ParametreController::class, 'lesAcademies'])
        ->name('lesAcademies');

    Route::post('/nouvelle-academie', [ParametreController::class, 'enregistrerAcademie'])
        ->name('enregistrerAcademie');
});
