<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePeminjaman extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_peminjaman', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_pinjam');
            $table->date('tgl_kembali');
            $table->string('keterangan');
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
        Schema::dropIfExists('table_peminjaman');
    }
}
