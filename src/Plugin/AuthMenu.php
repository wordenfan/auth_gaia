<?php

namespace Labsys\GaiaAuth\Plugin;

use DB;
use Illuminate\Support\Facades\Config;

class AuthMenu extends AbstractPermission
{
    /*
     * Tips:
     * 1.插件类的方法只有public方法会被检测到从而继承
     * 2.各插件间名字不能重复
    */

    public function __construct()
    {
        parent::__construct();
        $this->table_name = Config::get('auth_gaia.menu_table');
    }

    //一维数组
    public function menu(Array $select=[]){
        $select = empty($select) ? ['*'] : array_merge($select,['id','level','pid']);

        $oneDimensionalMenu = [];
        foreach($this->base_permission as $perm){
            $itemVal = $perm->where('status',1)->select($select)->get()->toArray();
            $itemKey = array_column($itemVal,'id');
            $res = array_combine($itemKey,$itemVal);
            $oneDimensionalMenu = $oneDimensionalMenu + $res;
        }

        return array_values($oneDimensionalMenu);
    }


    //树形排序数组
    public function menuWithRank(Array $select=[]){
        $originalMenu = $this->menu($select);
        $rankMenuArr = $this->rankMenuList($originalMenu,$this->menu_level);

        return $rankMenuArr;
    }

}
