<?php

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
    return redirect('login');
});

Route::group(['middleware' => 'auth'], function () {

    //Dashboard routes
    Route::get('/dashboard', [\App\Http\Controllers\Dashboard\DashboardController::class, 'index'])->name('dashboard');

    //Address redirect setting
    Route::get('/set-address', [\App\Http\Controllers\Setting\SetAddressController::class, 'create'])->name('address_set.create');
    Route::post('/set-address', [\App\Http\Controllers\Setting\SetAddressController::class, 'store'])->name('address_set.store');

    //Test controller
    Route::get('/test', [\App\Http\Controllers\Test\TestController::class, 'index'])->name('test.index');
    Route::get('/test-table', [\App\Http\Controllers\Test\TestController::class, 'test'])->name('test.table');
    Route::post('/test-data', [\App\Http\Controllers\Test\TestController::class, 'create'])->name('test.data');
    Route::delete('/test-data/delete/{id}', [\App\Http\Controllers\Test\TestController::class, 'delete'])->name('test.delete');
});

require __DIR__.'/auth.php';
