<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrokerController;


Route::get('/', function () {
    return view('dashboard.index');
});

// Route::get('/all', function () {
//     return view('brokers.allbroker');
// })->name('broker.all');

Route::get('/broker', [BrokerController::class, 'index'])->name('broker.all');
Route::get('/broker/{id}', [BrokerController::class, 'show'])->name('broker.show');
Route::post('/broker/{id}', [BrokerController::class, 'edit'])->name('broker.edit');
Route::get('/broker', [BrokerController::class, 'destroy'])->name('broker.destroy');