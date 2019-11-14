<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoledanPermission::class);
        $this->call(MakeAdminUser::class);
        $this->call(InsertTahundanKategori::class);
    }
}
