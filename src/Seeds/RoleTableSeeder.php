<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = Config::get('auth_gaia.roles_table');
        $menuArr = [
            ['id'=>1,'pinyin'=>'chaojiguanliyuan','label'=>'超级管理员A','description'=>'所有权限','status'=>1],
            ['id'=>2,'pinyin'=>'ceshiguanliyuan','label'=>'测试管理员B','description'=>'测试权限','status'=>1],
        ];

        // DB::table(self::TableName)->truncate();
        foreach($menuArr as $k => $item){
            DB::table($tableName)->insert([
                'id'         => $item['id'],
                'pinyin'     => $item['pinyin'],
                'label'      => $item['label'],
                'description' => $item['description'],
                'status'     => $item['status'],
            ]);
        }
    }
}
