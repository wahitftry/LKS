<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Algoritma: Model BukuTamu mewakili tabel 'bukutamus' dan mendefinisikan field yang dapat diisi (fillable)
// sehingga memudahkan dalam operasi create dan update.
class BukuTamu extends Model
{
    protected $table = 'bukutamus';

    protected $fillable = [
        'nama', 'email', 'phone', 'city', 'status', 'gambar'
    ];
}
