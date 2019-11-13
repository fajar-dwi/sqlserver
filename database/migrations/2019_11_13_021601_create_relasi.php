<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('id_role')->references('id')->on('table_role')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('table_buku', function (Blueprint $table) {
            $table->foreign('id_kategori')->references('id')->on('table_kategori')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('table_peminjaman', function (Blueprint $table) {
            $table->foreign('id_anggota')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('table_peminjaman_item', function (Blueprint $table) {
            $table->foreign('id_peminjaman')->references('id')->on('table_peminjaman')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_buku')->references('id')->on('table_buku')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('table_pengembalian', function (Blueprint $table) {
            $table->foreign('id_peminjaman')->references('id')->on('table_peminjaman')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_anggota')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relasi');
    }
}
