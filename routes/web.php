<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrokerController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;





Route::get('/', [DashboardController::class, 'index'])->name('dash.index');





Route::get('/broker', [BrokerController::class, 'index'])->name('broker.all');
Route::get('/broker/{id}', [BrokerController::class, 'show'])->name('broker.show');
Route::get('/broker/create', [BrokerController::class, 'create'])->name('broker.create');
Route::post('/broker', [BrokerController::class, 'store'])->name('broker.store');
Route::get('/broker/{id}/edit', [BrokerController::class, 'edit'])->name('broker.edit');
Route::put('/broker/{id}', [BrokerController::class, 'update'])->name('broker.update');
Route::delete('/broker/{id}', [BrokerController::class, 'destroy'])->name('broker.destroy');
