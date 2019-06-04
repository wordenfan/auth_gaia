<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = Config::get('auth_gaia.table_prefix').Config::get('auth_gaia.users_table');

        $menuArr = [
            ['id'=>1,'name'=>'lxadmin','password'=>bcrypt('lxadminLX'),'email'=>'','avatar'=>'','remember_token'=>'','status'=>1],
            ['id'=>2,'name'=>'lxtest','password'=>bcrypt('lxtestLX'),'email'=>'','avatar'=>'','remember_token'=>'','status'=>1],
        ];

        // DB::table(self::TableName)->truncate();
        foreach($menuArr as $k => $item){
            DB::table($tableName)->insert([
                'id'    => $item['id'],
                'name'  => $item['name'],
                'password'  => $item['password'],
                'email'     => $item['email'],
                'avatar'    => $item['avatar'],
                'remember_token' => $item['remember_token'],
                'status'    => $item['status'],
            ]);
        }
    }
}
