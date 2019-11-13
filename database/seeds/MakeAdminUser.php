<?php

use Illuminate\Database\Seeder;
use App\User;

class MakeAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
            ]);

        $user->assignRole('admin');
    }
}
