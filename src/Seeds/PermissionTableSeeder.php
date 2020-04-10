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
        //type:（1:页面,2:按钮,10:数据权限,20:所属医院,200:平湖)

        $tableName = Config::get('auth_gaia.table_prefix').Config::get('auth_gaia.permissions_table');

        $menuArr = [
            ['id'=>1,'pid'=>0,'type'=>10,'pinyin'=>'tuominxianshi','label'=>'明文不脱敏','description'=>'是否脱敏,勾选则显示明文','url'=>'','icon'=>'fa-circle-o','sort'=>1,'status'=>1],
            //==医院
            ['id'=>2,'pid'=>0,'type'=>20,'pinyin'=>'xd_hospital','label'=>'新都医院','description'=>'分配新都医院管理权限','url'=>'#','icon'=>'fa-circle-o','sort'=>2,'status'=>1],
            ['id'=>3,'pid'=>0,'type'=>20,'pinyin'=>'rz_hospital','label'=>'日照医院','description'=>'分配日照医院管理权限','url'=>'#','icon'=>'fa-circle-o','sort'=>2,'status'=>1],
            ['id'=>4,'pid'=>0,'type'=>20,'pinyin'=>'yt_hospital','label'=>'烟台医院','description'=>'分配烟台医院管理权限','url'=>'#','icon'=>'fa-circle-o','sort'=>2,'status'=>1],
            //==
            ['id'=>51,'pid'=>0,'type'=>1,'pinyin'=>'jiuzhenrenguanli','label'=>'就诊人管理','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>52,'pid'=>51,'type'=>1,'pinyin'=>'jiuzhenrenliebiao','label'=>'就诊人列表','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>53,'pid'=>51,'type'=>1,'pinyin'=>'jiuzhenrentongji','label'=>'就诊人统计','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            //
            ['id'=>71,'pid'=>0,'type'=>1,'pinyin'=>'yiyuanguanli','label'=>'医院管理','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>72,'pid'=>71,'type'=>1,'pinyin'=>'yiyuanliebiao','label'=>'医院列表','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>73,'pid'=>71,'type'=>1,'pinyin'=>'zhenshiliebiao','label'=>'诊室列表','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>74,'pid'=>71,'type'=>1,'pinyin'=>'yishengliebiao','label'=>'医生列表','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>75,'pid'=>72,'type'=>2,'pinyin'=>'yylb_add_tb','label'=>'添加','url'=>'#','icon'=>'','description'=>'','sort'=>4,'status'=>1],
            ['id'=>76,'pid'=>72,'type'=>2,'pinyin'=>'zslb_add_tb','label'=>'添加','url'=>'#','icon'=>'','description'=>'','sort'=>4,'status'=>1],
            ['id'=>77,'pid'=>72,'type'=>2,'pinyin'=>'yslb_add_tb','label'=>'添加','url'=>'#','icon'=>'','description'=>'','sort'=>4,'status'=>1],
            //
            ['id'=>91,'pid'=>0,'type'=>1,'pinyin'=>'wenzhenguanli','label'=>'问诊管理','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>92,'pid'=>91,'type'=>1,'pinyin'=>'wenzhenliebiao','label'=>'问诊列表','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>93,'pid'=>91,'type'=>1,'pinyin'=>'dianzibingli','label'=>'电子病历','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>94,'pid'=>92,'type'=>2,'pinyin'=>'wzlb_search_tb','label'=>'搜索','url'=>'#','icon'=>'','description'=>'','sort'=>4,'status'=>1],
            ['id'=>95,'pid'=>93,'type'=>2,'pinyin'=>'dzbl_search_tb','label'=>'搜索','url'=>'#','icon'=>'','description'=>'','sort'=>4,'status'=>1],

            //
            ['id'=>111,'pid'=>0,'type'=>1,'pinyin'=>'xitongguanli','label'=>'系统管理','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>112,'pid'=>111,'type'=>1,'pinyin'=>'caozuorizhi','label'=>'操作日志','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>113,'pid'=>111,'type'=>1,'pinyin'=>'guanliyuanliebiao','label'=>'管理员列表','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>114,'pid'=>111,'type'=>1,'pinyin'=>'jueseguanli','label'=>'角色管理','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>115,'pid'=>111,'type'=>1,'pinyin'=>'jiedianguanli','label'=>'节点管理','description'=>'','url'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],

            //========pinghu,id介于(200,300)================================
            //
            ['id'=>201,'pid'=>0,'type'=>200,'pinyin'=>'shangpinguanli','label'=>'商品管理','url'=>'','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>202,'pid'=>201,'type'=>200,'pinyin'=>'shangpintianjia','label'=>'商品添加','url'=>'/v1/goods/add','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>203,'pid'=>201,'type'=>200,'pinyin'=>'shangpinchaxun','label'=>'商品查询','url'=>'/v1/goods/query','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>204,'pid'=>201,'type'=>200,'pinyin'=>'shangpinliebiao','label'=>'商品列表','url'=>'/v1/goods/list','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>205,'pid'=>201,'type'=>200,'pinyin'=>'shangpinbianji','label'=>'商品编辑','url'=>'/v1/goods/update','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>206,'pid'=>201,'type'=>200,'pinyin'=>'shangpinfenleitianjia','label'=>'商品分类添加','url'=>'/v1/goods/cate/add','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>207,'pid'=>201,'type'=>200,'pinyin'=>'shangpinfenleichaxun','label'=>'商品分类查询','url'=>'/v1/goods/cate/query','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>208,'pid'=>201,'type'=>200,'pinyin'=>'shangpinfenleiliebiao','label'=>'商品分类列表','url'=>'/v1/goods/cate/list','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            //
            ['id'=>211,'pid'=>0,'type'=>200,'pinyin'=>'dingdanguanli','label'=>'订单管理','url'=>'','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>212,'pid'=>211,'type'=>200,'pinyin'=>'dingdantianjia','label'=>'订单添加','url'=>'/v1/order/add','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>213,'pid'=>211,'type'=>200,'pinyin'=>'dingdanchaxun','label'=>'订单查询','url'=>'/v1/order/query','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>214,'pid'=>211,'type'=>200,'pinyin'=>'dingdanliebiao','label'=>'订单列表','url'=>'/v1/order/list','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>215,'pid'=>211,'type'=>200,'pinyin'=>'dingdangengxin','label'=>'订单更新','url'=>'/v1/order/update','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            //
            ['id'=>221,'pid'=>0,'type'=>200,'pinyin'=>'wuliuguanli','label'=>'物流管理','url'=>'','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>222,'pid'=>221,'type'=>200,'pinyin'=>'wuliugongsichaxun','label'=>'物流公司查询','url'=>'/v1/express/query','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],
            ['id'=>223,'pid'=>221,'type'=>200,'pinyin'=>'wuliugongsiliebiao','label'=>'物流公司列表','url'=>'/v1/express/list','description'=>'','icon'=>'fa-circle-o','sort'=>3,'status'=>1],

        ];

        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table($tableName)->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
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
