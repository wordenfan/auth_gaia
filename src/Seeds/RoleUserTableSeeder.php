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
        ];

        // DB::table(self::TableName)->truncate();
        foreach($menuArr as $k => $item){
            DB::table($tableName)->insert([
                'user_id' => $item['user_id'],
                'role_id' => $item['role_id']
            ]);
        }
    }
}
