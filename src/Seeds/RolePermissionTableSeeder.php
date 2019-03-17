<?php

use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{
    private $tableName;

    //
    public function __construct(){
        parent::__construct();
        $this->tableName = Config::get('auth_gaia.table_prefix').Config::get('auth_gaia.role_permission_table');
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuArr = [
            ['permission_id'=>1,'role_id'=>1],
            ['permission_id'=>2,'role_id'=>1],
            ['permission_id'=>3,'role_id'=>1],
            ['permission_id'=>4,'role_id'=>1],
            ['permission_id'=>5,'role_id'=>1],
            ['permission_id'=>6,'role_id'=>1],
            ['permission_id'=>7,'role_id'=>1],
            ['permission_id'=>8,'role_id'=>1],
            ['permission_id'=>9,'role_id'=>1],
            ['permission_id'=>10,'role_id'=>1],
            ['permission_id'=>11,'role_id'=>1],
            ['permission_id'=>1,'role_id'=>2],
            ['permission_id'=>2,'role_id'=>2],
            ['permission_id'=>3,'role_id'=>2],
            ['permission_id'=>4,'role_id'=>2],
            ['permission_id'=>5,'role_id'=>2],
            ['permission_id'=>6,'role_id'=>2],
            ['permission_id'=>7,'role_id'=>2],
            ['permission_id'=>8,'role_id'=>2],
        ];

        // DB::table(self::TableName)->truncate();
        foreach($menuArr as $k => $item){
            DB::table($this->tableName)->insert([
                'permission_id' => $item['permission_id'],
                'role_id'       => $item['role_id']
            ]);
        }
    }
}
