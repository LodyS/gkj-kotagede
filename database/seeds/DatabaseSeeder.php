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
        $this->call(GerejaSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        //$this->call(UsahaSeeder::class);
        $this->call(UserSeeder::class);
    }
}
