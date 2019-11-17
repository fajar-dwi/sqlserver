<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Buku;
use Faker\Generator as Faker;

$factory->define(Buku::class, function (Faker $faker) {
    return [
        'isbn' => $faker->numberBetween(111111111,999999999),
        'judul' => $faker->jobTitle,
        'penerbit' => $faker->company,
        'pengarang' => $faker->name,
        'jml_halaman' => $faker->numberBetween(100,200),
        'id_tahun' => 1,
        'stok' => $faker->numberBetween(10,60),
        'no_rak' => $faker->title,
        'id_kategori' => 1,
    ];
});
