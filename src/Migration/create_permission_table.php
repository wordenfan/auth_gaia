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
        Schema::create('auth_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type')->unsigned()->comment('1菜单2按钮3其他');
            $table->integer('pid')->comment('父id');
            $table->string('name',30)->unique()->comment('拼音标识');
            $table->string('label',30)->comment('展示的名称');
            $table->string('description',60)->comment('概要');
            $table->string('icon',20)->comment('adminlte图标');
            $table->string('url',60)->comment('url链接');
            $table->tinyInteger('level')->comment('级别');
            $table->integer('sort')->comment('排序');
            $table->tinyInteger('status')->comment('状态');
            $table->integer('creator')->comment('创建人员id');
            $table->timestamps();
            //Comment表中post_id字段作为外键，与Post一对多关系
            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth_permissions');
    }
}
