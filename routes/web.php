<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('dashboard.dashboard');
// });
Route::get('/', function () {
    return view('dashboard.index');
});
Route::get('/', function () {
    return view('dashboard.sidebar');
});