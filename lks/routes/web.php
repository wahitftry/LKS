<?php

// Algoritma: 
// 1. Route "/" diarahkan ke halaman index buku tamu.
// 2. Mendefinisikan route resource untuk BukuTamuController yang menyediakan CRUD.
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuTamuController;

Route::get('/', function () {
    return redirect()->route('bukutamu.index');
});

Route::resource('bukutamu', BukuTamuController::class);
