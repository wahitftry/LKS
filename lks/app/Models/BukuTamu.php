<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    // Tentukan nama tabel agar sesuai dengan migration
    protected $table = 'bukutamus';

    protected $fillable = [
        'nama', 'email', 'phone', 'city', 'status', 'gambar'
    ];
}
