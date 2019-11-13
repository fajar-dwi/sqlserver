<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePengembalian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_pengembalian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('denda');
            $table->date('tgl_kembali');
            $table->bigInteger('id_peminjaman');
            $table->bigInteger('id_anggota');
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
        Schema::dropIfExists('table_pengembalian');
    }
}
