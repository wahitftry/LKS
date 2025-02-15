<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('bukutamu', BukuTamuController::class);
