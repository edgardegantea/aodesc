<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\UserController;

Route::get('/vehicles/chart', [VehicleController::class, 'chart'])->name('/vehicles/chart');
Route::get('/exportVehiclesToCSV', [VehicleController::class, 'exportVehiclesToCSV'])->name('/exportVehiclesToCSV');

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
