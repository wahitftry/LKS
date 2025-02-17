<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;

Route::get('/', function () {
    return view('bukutamu.index');
});

Route::resource('bukutamu', BukuTamuController::class);
