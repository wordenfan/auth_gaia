<?php

use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = Config::get('auth_gaia.role_user_table');
        $menuArr = [
            ['user_id'=>1,'role_id'=>1],
            ['user_id'=>2,'role_id'=>2],
            ['user_id'=>3,'role_id'=>3],
            ['user_id'=>4,'role_id'=>4],
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table($tableName)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        foreach($menuArr as $k => $item){
            DB::table($tableName)->insert([
                'user_id' => $item['user_id'],
                'role_id' => $item['role_id']
            ]);
        }
    }
}
