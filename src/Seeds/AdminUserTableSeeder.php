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
            ['id'=>1,'name'=>'lxadmin','password'=>bcrypt('lxadminLX'),'email'=>'lxadmin@labsys.cn','avatar'=>'','remember_token'=>'','status'=>1],
            ['id'=>2,'name'=>'lxkefu', 'password'=>bcrypt('lxadminLX'),'email'=>'lxkefu@labsys.cn','avatar'=>'','remember_token'=>'','status'=>1],
            ['id'=>3,'name'=>'xdadmin','password'=>bcrypt('lxadminLX'),'email'=>'xdadmin@labsys.cn','avatar'=>'','remember_token'=>'','status'=>1],
            ['id'=>4,'name'=>'rzadmin','password'=>bcrypt('lxadminLX'),'email'=>'rzadmin@labsys.cn','avatar'=>'','remember_token'=>'','status'=>1],
            ['id'=>5,'name'=>'ytadmin','password'=>bcrypt('lxadminLX'),'email'=>'ytadmin@labsys.cn','avatar'=>'','remember_token'=>'','status'=>1],
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table($tableName)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
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
