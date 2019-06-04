<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tableName = Config::get('auth_gaia.table_prefix').Config::get('auth_gaia.permissions_table');

        $menuArr = [
            ['id'=>1,'pid'=>0,'type'=>1,'pinyin'=>'shangjiaguanli','label'=>'商家管理','url'=>'','icon'=>'fa-hospital-o','description'=>'','sort'=>1,'status'=>1],
            //==订单
            ['id'=>2,'pid'=>0,'type'=>1,'pinyin'=>'dingdanguanli','label'=>'订单管理','url'=>'#','icon'=>'fa-shopping-cart','description'=>'','sort'=>2,'status'=>1],
            //==
            ['id'=>3,'pid'=>2,'type'=>1,'pinyin'=>'dingdanliebiao','label'=>'订单列表','url'=>'/admin/order/index','icon'=>'fa-circle-o','description'=>'','sort'=>3,'status'=>1],
            ['id'=>4,'pid'=>3,'type'=>2,'pinyin'=>'ddlb_ss','label'=>'搜索','url'=>'#','icon'=>'','description'=>'','sort'=>4,'status'=>1],
            ['id'=>5,'pid'=>3,'type'=>2,'pinyin'=>'ddlb_xq','label'=>'详情','url'=>'#','icon'=>'','description'=>'','sort'=>5,'status'=>1],
            //==
            ['id'=>6,'pid'=>2,'type'=>1,'pinyin'=>'tuikuanliebiao','label'=>'退款列表','url'=>'/admin/order/refund','icon'=>'fa-circle-o','description'=>'','sort'=>6,'status'=>1],
            ['id'=>7,'pid'=>6,'type'=>2,'pinyin'=>'tklb_tytk','label'=>'同意退款','url'=>'#','icon'=>'','description'=>'','sort'=>7,'status'=>1],
            ['id'=>8,'pid'=>6,'type'=>2,'pinyin'=>'tklb_jjtk','label'=>'拒绝退款','url'=>'#','icon'=>'','description'=>'','sort'=>8,'status'=>1],
            ['id'=>9,'pid'=>6,'type'=>2,'pinyin'=>'tklb_ss','label'=>'搜索','url'=>'#','icon'=>'','description'=>'','sort'=>9,'status'=>1],
        ];

        // DB::table(self::TableName)->truncate();
        foreach($menuArr as $k => $item){
            DB::table($tableName)->insert([
                'id'     => $item['id'],
                'pid'    => $item['pid'],
                'type'   => $item['type'],
                'label'  => $item['label'],
                'pinyin' => $item['pinyin'],
                'url'    => $item['url'],
                'icon'   => $item['icon'],
                'description' => $item['description'],
                'sort'   => $item['sort'],
                'status' => $item['status'],
            ]);
        }
    }
}
