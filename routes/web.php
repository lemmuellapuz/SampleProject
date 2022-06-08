<?php

use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;
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

Route::controller(VehicleController::class)->group(function(){
    Route::get('/dashboard', 'index');
    Route::get('/create-vehicle', 'create_vehicle')->name('vehicle.create');
    Route::get('/edit-vehicle/{id}', 'edit_vehicle')->name('vehicle.edit');

    Route::post('/add', 'add')->name('vehicle.add');
    Route::post('/update-vehicle', 'update')->name('vehicle.update');
    Route::get('/delete-vehicle/{id}', 'delete')->name('vehicle.delete');
});