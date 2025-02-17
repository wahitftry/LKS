<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;

Route::get('/', function () {
    return redirect()->route('bukutamu.index');
});

Route::resource('bukutamu', BukuTamuController::class);
