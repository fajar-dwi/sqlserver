<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoledanPermission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'edit buku']);
        Permission::create(['name' => 'delete buku']);
        Permission::create(['name' => 'tambah buku']);   //jenis permission
        Permission::create(['name' => 'lihat buku']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());   //admin permission

        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('lihat buku');      //user permission
    }
}
