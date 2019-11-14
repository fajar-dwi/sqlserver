<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_buku', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('isbn');
            $table->string('judul');
            $table->string('penerbit');
            $table->string('pengarang');
            $table->integer('jml_halaman');
            $table->bigInteger('id_tahun');
            $table->integer('stok');
            $table->string('no_rak');
            $table->bigInteger('id_kategori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_buku');
    }
}
