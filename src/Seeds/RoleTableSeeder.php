<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    private $tableName;

    //
    public function __construct(){
        parent::__construct();
        $this->tableName = Config::get('auth_gaia.table_prefix').Config::get('auth_gaia.roles_table');
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuArr = [
            ['id'=>1,'pinyin'=>'chaojiguanliyuan','label'=>'超级管理员A','description'=>'所有权限','status'=>1],
            ['id'=>2,'pinyin'=>'putongguanliyuan','label'=>'普通管理员B','description'=>'大部分权限','status'=>1],
        ];

        // DB::table(self::TableName)->truncate();
        foreach($menuArr as $k => $item){
            DB::table($this->tableName)->insert([
                'id'         => $item['id'],
                'pinyin'     => $item['pinyin'],
                'label'      => $item['label'],
                'description' => $item['description'],
                'status'     => $item['status'],
            ]);
        }
    }
}
