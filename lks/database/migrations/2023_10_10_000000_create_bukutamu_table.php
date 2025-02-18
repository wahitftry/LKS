<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Algoritma: 
// 1. Membuat tabel 'bukutamus' dengan field yang diperlukan untuk menyimpan data buku tamu.
// 2. Field 'gambar' bersifat nullable karena tidak wajib ada untuk setiap record.
class CreateBukutamuTable extends Migration
{
    public function up()
    {
        Schema::create('bukutamus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('city');
            $table->enum('status', ['Active','Inactive']);
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bukutamus');
    }
}
