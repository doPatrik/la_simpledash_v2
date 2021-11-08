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
});

require __DIR__.'/auth.php';
