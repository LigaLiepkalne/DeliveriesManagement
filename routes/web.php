<?php

use App\Http\Controllers\ProfileController;
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
    return view('/dashboard');
});

Route::get('/clients', [\App\Http\Controllers\ClientListController::class, 'index'])->name('clients');
Route::get('/clients/delivery-types', [\App\Http\Controllers\DeliveryTypeController::class, 'index'])->name('delivery-types');
Route::get('/clients/last-deliveries', [\App\Http\Controllers\LastDeliveryController::class, 'index'])->name('last-deliveries');

Route::get('/client/{id}/addresses', [\App\Http\Controllers\ClientListController::class, 'show'])->name('client-show');
Route::get('/client/{id}/deliveries', [\App\Http\Controllers\DeliveryController::class, 'index'])->name('deliveries');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
