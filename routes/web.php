<?php

use App\Http\Controllers\Backend\AcademieController;
use App\Http\Controllers\Backend\AnneeScolaireController;
use App\Http\Controllers\Backend\CycleController;
use App\Http\Controllers\Backend\EcoleController;
use App\Http\Controllers\Backend\FiliereController;
use App\Http\Controllers\Backend\OptionController;
use App\Http\Controllers\Backend\ParametreController;
use App\Http\Controllers\Backend\PeriodeScolaireController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\PersonnelController;
use App\Http\Controllers\Backend\RoleController;
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

        Route::get('utilisateurs-roles/{personnel}', [PersonnelController::class, 'creerRolePersonnel'])->name('creerRolePersonnel');
        Route::post('utilisateurs-roles', [PersonnelController::class, 'enregistrerRolePersonnel'])->name('enregistrerRolePersonnel');

        Route::get('details-personnel/{id}', [PersonnelController::class, 'creerPersonnel'])->name('creerPersonnel');

        Route::resource('option', OptionController::class);

        Route::resource('cycle', CycleController::class);

        Route::resource('annee-scolaire', AnneeScolaireController::class);

        Route::resource('periode-scolaire', PeriodeScolaireController::class);

        Route::resource('role', RoleController::class);

        Route::get('roles-et-permissions', [RoleController::class, 'liste'])->name('roleEtPermission.liste');

        Route::resource('permission', PermissionController::class);
    });
});

Route::resource('filiere', FiliereController::class);
