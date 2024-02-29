<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;

Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::patch('/vehicles/{id}', [VehicleController::class, 'update'])->name('vehicles.update');
Route::delete('/vehicles/{id}', [VehicleController::class, 'delete'])->name('vehicles.delete');
