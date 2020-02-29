<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionBaseTableSeeder extends Seeder
{

    //TODO php artisan db:seed --class=PermissionBaseTableSeeder

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        $this->call(AdminUserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

        Model::reguard();
    }
}
