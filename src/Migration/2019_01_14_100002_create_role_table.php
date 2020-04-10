<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = Config::get('auth_gaia.roles_table');
        if (!Schema::hasTable($tableName)){
            Schema::create($tableName, function (Blueprint $table) {
                $table->increments('id')->unsigned();
                $table->string('label',30)->comment('展示的名称');
                $table->string('pinyin',30)->unique()->comment('唯一拼音标识');
                $table->string('description',60)->comment('概要');
                $table->tinyInteger('status')->default(1)->comment('状态1正常2禁用');
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists(Config::get('auth_gaia.roles_table'));
    }
}
