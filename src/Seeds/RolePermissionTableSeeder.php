<?php

use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = Config::get('auth_gaia.table_prefix').Config::get('auth_gaia.role_permission_table');

        $menuArr = [
            ['permission_id'=>1,'role_id'=>1],
            ['permission_id'=>2,'role_id'=>1],
            ['permission_id'=>3,'role_id'=>1],
            ['permission_id'=>4,'role_id'=>1],
            //
            ['permission_id'=>51,'role_id'=>1],
            ['permission_id'=>52,'role_id'=>1],
            ['permission_id'=>53,'role_id'=>1],
            //
            ['permission_id'=>71,'role_id'=>1],
            ['permission_id'=>72,'role_id'=>1],
            ['permission_id'=>73,'role_id'=>1],
            ['permission_id'=>74,'role_id'=>1],
            ['permission_id'=>75,'role_id'=>1],
            ['permission_id'=>76,'role_id'=>1],
            //
            ['permission_id'=>91,'role_id'=>1],
            ['permission_id'=>92,'role_id'=>1],
            ['permission_id'=>93,'role_id'=>1],
            ['permission_id'=>94,'role_id'=>1],
            ['permission_id'=>95,'role_id'=>1],
            //
            ['permission_id'=>111,'role_id'=>1],
            ['permission_id'=>112,'role_id'=>1],
            ['permission_id'=>113,'role_id'=>1],
            ['permission_id'=>114,'role_id'=>1],
            ['permission_id'=>115,'role_id'=>1],

            //
            ['permission_id'=>1,'role_id'=>2],
            ['permission_id'=>2,'role_id'=>2],
            ['permission_id'=>3,'role_id'=>2],
            ['permission_id'=>4,'role_id'=>2],
            //
            ['permission_id'=>51,'role_id'=>2],
            ['permission_id'=>52,'role_id'=>2],
            ['permission_id'=>53,'role_id'=>2],
            //
            ['permission_id'=>71,'role_id'=>2],
            ['permission_id'=>72,'role_id'=>2],
            ['permission_id'=>73,'role_id'=>2],
            ['permission_id'=>74,'role_id'=>2],
            ['permission_id'=>75,'role_id'=>2],
            ['permission_id'=>76,'role_id'=>2],
            //
            ['permission_id'=>91,'role_id'=>2],
            ['permission_id'=>92,'role_id'=>2],
            ['permission_id'=>93,'role_id'=>2],
            ['permission_id'=>94,'role_id'=>2],
            ['permission_id'=>95,'role_id'=>2],

            //新都
            ['permission_id'=>1,'role_id'=>3],
            ['permission_id'=>2,'role_id'=>3],
            //
            ['permission_id'=>51,'role_id'=>3],
            ['permission_id'=>52,'role_id'=>3],
            ['permission_id'=>53,'role_id'=>3],
            //
            ['permission_id'=>71,'role_id'=>3],
            ['permission_id'=>72,'role_id'=>3],
            ['permission_id'=>73,'role_id'=>3],
            ['permission_id'=>74,'role_id'=>3],
            ['permission_id'=>75,'role_id'=>3],
            ['permission_id'=>76,'role_id'=>3],
            //
            ['permission_id'=>91,'role_id'=>3],
            ['permission_id'=>92,'role_id'=>3],
            ['permission_id'=>93,'role_id'=>3],
            ['permission_id'=>94,'role_id'=>3],
            ['permission_id'=>95,'role_id'=>3],
            //
            ['permission_id'=>111,'role_id'=>3],
            ['permission_id'=>112,'role_id'=>3],
            ['permission_id'=>113,'role_id'=>3],
            ['permission_id'=>114,'role_id'=>3],
            ['permission_id'=>115,'role_id'=>3],

            //日照
            ['permission_id'=>1,'role_id'=>4],
            ['permission_id'=>3,'role_id'=>4],
            //
            ['permission_id'=>51,'role_id'=>4],
            ['permission_id'=>52,'role_id'=>4],
            ['permission_id'=>53,'role_id'=>4],
            //
            ['permission_id'=>71,'role_id'=>4],
            ['permission_id'=>72,'role_id'=>4],
            ['permission_id'=>73,'role_id'=>4],
            ['permission_id'=>74,'role_id'=>4],
            ['permission_id'=>75,'role_id'=>4],
            ['permission_id'=>76,'role_id'=>4],
            //
            ['permission_id'=>91,'role_id'=>4],
            ['permission_id'=>92,'role_id'=>4],
            ['permission_id'=>93,'role_id'=>4],
            ['permission_id'=>94,'role_id'=>4],
            ['permission_id'=>95,'role_id'=>4],
            //
            ['permission_id'=>111,'role_id'=>4],
            ['permission_id'=>112,'role_id'=>4],
            ['permission_id'=>113,'role_id'=>4],
            ['permission_id'=>114,'role_id'=>4],
            ['permission_id'=>115,'role_id'=>4],
        ];

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table($tableName)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
        foreach($menuArr as $k => $item){
            DB::table($tableName)->insert([
                'permission_id' => $item['permission_id'],
                'role_id'       => $item['role_id']
            ]);
        }
    }
}
