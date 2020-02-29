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
            ['id'=>1,'pinyin'=>'chaojiguanliyuan','label'=>'超级管理员','description'=>'所有权限','status'=>1],
            ['id'=>2,'pinyin'=>'ceshiguanliyuan','label'=>'测试客服','description'=>'测试权限','status'=>1],
            ['id'=>3,'pinyin'=>'xinduguanliyuan','label'=>'新都管理员','description'=>'新都管理员','status'=>1],
            ['id'=>4,'pinyin'=>'rizhaoguanliyuan','label'=>'日照管理员','description'=>'日照管理员','status'=>1],
            ['id'=>5,'pinyin'=>'yantaiguanliyuan','label'=>'烟台管理员','description'=>'烟台管理员','status'=>1],
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table($tableName)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
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
