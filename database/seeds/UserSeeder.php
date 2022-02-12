<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permission
        Permission::create(['name' => 'jemaat']);
        Permission::create(['name' => 'pekerjaan']);
        Permission::create(['name' => 'gereja']);
        Permission::create(['name' => 'babtis']);
        Permission::create(['name' => 'pernikahan']);
        Permission::create(['name' => 'usaha']);
        Permission::create(['name' => 'pendidikan']);
        Permission::create(['name' => 'meninggal']);
        Permission::create(['name' => 'atestasi']);
        Permission::create(['name' => 'perjamuan_kudus']);

        //create role and assigned permssion
        $role_superadmin = Role::create(['name'=>'Admin wilayah']);
        $role_superadmin->givePermissionTo([
            'jemaat',
            'pekerjaan',
            'gereja',
            'babtis',
            'pernikahan',
            'usaha',
            'pendidikan',
            'meninggal',
            'atestasi',
            'perjamuan_kudus'
        ]);


        // buat user dan assigne role
        $superadmin_user = User::create([
            'name'=>'Superadministrator',
            'email'=>'superadmin@gkj_koge.com',
            'password'=>bcrypt('12345678')
        ]);
        $superadmin_user->assignRole($role_superadmin);
    }
}
