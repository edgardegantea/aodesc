<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;


// Rutas personalizadas
Route::get('/vehicles/import', [VehicleController::class, 'import'])->name('/vehicles/import');
Route::post('/vehicles/importData', [VehicleController::class, 'importData'])->name('/vehicles/importData');
Route::get('/users/import', [UserController::class, 'import'])->name('/users/import');
Route::post('/users/importData', [UserController::class, 'importData'])->name('/users/importData');
Route::get('/vehicles/exportToXlsx', [VehicleController::class, 'exportToXlsx'])->name('/vehicles/exportToXlsx');
Route::get('/users/exportToXlsx', [UserController::class, 'exportToXlsx'])->name('/users/exportToXlsx');
Route::get('/vehicles/cards', [VehicleController::class, 'cards'])->name('/vehicles/cards');
Route::get('/vehicles/chart', [VehicleController::class, 'chart'])->name('/vehicles/chart');
Route::get('/exportVehiclesToCSV', [VehicleController::class, 'exportVehiclesToCSV'])->name('/exportVehiclesToCSV');


// Rutas del sistema y de tipo resource
Route::get('/', function () {
    return view('welcome');
});


Route::resources([
    'vehicles'  => VehicleController::class,
    'soporte'   => SupportController::class,
    'users'     => UserController::class,
]);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
