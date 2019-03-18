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
            ['id'=>1,'pid'=>0,'type'=>1,'level'=>1,'name'=>'jigouguanli','label'=>'机构管理','url'=>'/admin/hospital/index','icon'=>'fa-hospital-o','description'=>'','sort'=>1,'status'=>1],
            ['id'=>2,'pid'=>0,'type'=>1,'level'=>1,'name'=>'yishiguanli','label'=>'医师管理','url'=>'/admin/doctor/index','icon'=>'fa-male','description'=>'','sort'=>2,'status'=>1],
            ['id'=>3,'pid'=>0,'type'=>1,'level'=>1,'name'=>'yonghuguanli','label'=>'用户管理','url'=>'/admin/doctor/index','icon'=>'fa-user','description'=>'','sort'=>3,'status'=>1],
            ['id'=>4,'pid'=>0,'type'=>1,'level'=>1,'name'=>'tieziguanli','label'=>'帖子管理','url'=>'/admin/doctor/index','icon'=>'fa-file-text','description'=>'','sort'=>4,'status'=>1],
            ['id'=>5,'pid'=>0,'type'=>1,'level'=>1,'name'=>'fankuiguanli','label'=>'反馈管理','url'=>'/admin/feedback/index','icon'=>'fa-medkit','description'=>'','sort'=>5,'status'=>1],
            ['id'=>6,'pid'=>0,'type'=>1,'level'=>1,'name'=>'xitongshezhi','label'=>'系统设置','url'=>'#','icon'=>'fa-gears','description'=>'','sort'=>6,'status'=>1],
            ['id'=>7,'pid'=>6,'type'=>1,'level'=>2,'name'=>'shouyehuandengpian','label'=>'首页幻灯片','url'=>'/admin/slide/index','icon'=>'fa-circle-o','description'=>'','sort'=>7,'status'=>1],
            ['id'=>8,'pid'=>6,'type'=>1,'level'=>2,'name'=>'shouyetongzhi','label'=>'首页通知','url'=>'/admin/notice/index','icon'=>'fa-circle-o','description'=>'','sort'=>8,'status'=>1],

            //
            ['id'=>9,'pid'=>0,'type'=>1,'level'=>1,'name'=>'dingdanguanli','label'=>'订单管理','url'=>'#','icon'=>'fa-shopping-cart','description'=>'','sort'=>9,'status'=>1],
            ['id'=>10,'pid'=>9,'type'=>1,'level'=>2,'name'=>'dingdanliebiao','label'=>'订单列表','url'=>'/admin/order/index','icon'=>'fa-circle-o','description'=>'','sort'=>10,'status'=>1],
            ['id'=>11,'pid'=>9,'type'=>1,'level'=>2,'name'=>'tuikuanliebiao','label'=>'退款列表','url'=>'/admin/order/refund','icon'=>'fa-circle-o','description'=>'','sort'=>11,'status'=>1],
            ['id'=>12,'pid'=>11,'type'=>2,'level'=>3,'name'=>'tongyituikuan','label'=>'同意退款','url'=>'#','icon'=>'fa-circle-o','description'=>'','sort'=>12,'status'=>1],
            ['id'=>13,'pid'=>11,'type'=>2,'level'=>3,'name'=>'jujuetuikuang','label'=>'拒绝退款','url'=>'#','icon'=>'fa-circle-o','description'=>'','sort'=>13,'status'=>1],

            //
            ['id'=>19,'pid'=>0,'type'=>1,'level'=>1,'name'=>'quanxianguanli','label'=>'权限管理','url'=>'#','icon'=>'fa-cubes','description'=>'','sort'=>19,'status'=>1],
            ['id'=>20,'pid'=>19,'type'=>1,'level'=>2,'name'=>'guanliyuanliebiao','label'=>'管理员列表','url'=>'/admin/auth/adminList','icon'=>'fa-circle-o','description'=>'','sort'=>20,'status'=>1],
            ['id'=>21,'pid'=>19,'type'=>1,'level'=>2,'name'=>'jueseguanli','label'=>'角色管理','url'=>'/admin/auth/roleList','icon'=>'fa-circle-o','description'=>'','sort'=>21,'status'=>1],
            ['id'=>22,'pid'=>19,'type'=>1,'level'=>2,'name'=>'jiedianguanli','label'=>'节点管理','url'=>'/admin/auth/nodeIndex','icon'=>'fa-circle-o','description'=>'','sort'=>22,'status'=>1],

        ];

        // DB::table(self::TableName)->truncate();
        foreach($menuArr as $k => $item){
            DB::table($tableName)->insert([
                'id'     => $item['id'],
                'pid'    => $item['pid'],
                'type'   => $item['type'],
                'level'   => $item['level'],
                'name'   => $item['name'],
                'label'  => $item['label'],
                'url'    => $item['url'],
                'icon'   => $item['icon'],
                'description' => $item['description'],
                'sort'   => $item['sort'],
                'status' => $item['status'],
            ]);
        }
    }
}
