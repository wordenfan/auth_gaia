<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = Config::get('auth_gaia.permissions_table');
        if (!Schema::hasTable($tableName)) {
            Schema::create($tableName, function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->tinyInteger('type')->unsigned()->comment('1页面链接2按钮3其他');
                $table->integer('pid')->comment('父id');
                $table->string('label', 30)->comment('展示的名称');
                $table->string('pinyin', 30)->unique()->comment('唯一拼音标识');
                $table->string('description', 60)->comment('概要');
                $table->string('icon', 20)->comment('icon图标');
                $table->string('url', 60)->default('#')->comment('url链接,非页面类可为空');
                $table->integer('sort')->default(1)->comment('排序');
                $table->tinyInteger('status')->default(1)->comment('状态1正常2禁用');
                $table->integer('creator')->default(0)->comment('创建人员id');
                $table->timestamps();
            });
        }
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('auth_gaia.permissions_table'));
    }
}
