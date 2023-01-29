<?php

use App\Http\Controllers\ClientDeliveries\ClientListController;
use App\Http\Controllers\ClientDeliveries\DeliveryController;
use App\Http\Controllers\ClientDeliveries\DeliveryTypeController;
use App\Http\Controllers\ClientDeliveries\InactiveClientController;
use App\Http\Controllers\ClientDeliveries\LastDeliveryController;
use Illuminate\Support\Facades\Route;

Route::get('/clients', [ClientListController::class, 'index'])->name('clients');

Route::get('/client/{id}/addresses', [ClientListController::class, 'show'])->name('client-show');
Route::get('/client/{id}/deliveries', [DeliveryController::class, 'index'])->name('deliveries');

Route::get('/clients/delivery-types', [DeliveryTypeController::class, 'index'])->name('delivery-types');
Route::get('/clients/last-deliveries', [LastDeliveryController::class, 'index'])->name('last-deliveries');
Route::get('/clients/inactive', [InactiveClientController::class, 'index'])->name('inactive-clients');

require __DIR__.'/auth.php';
