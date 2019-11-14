<?php

use Illuminate\Database\Seeder;
use App\Tahun;
use App\Kategori;

class InsertTahundanKategori extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tahun::create([
            'tahun' => '2015'
        ]);
        Kategori::create([
            'nama_kategori' => 'Programming'
        ]);
    }
}
