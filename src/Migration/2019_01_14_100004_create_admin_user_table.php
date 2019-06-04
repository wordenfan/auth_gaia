<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = Config::get('auth_gaia.users_table');
        Schema::create($tableName, function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name',30)->unique()->comment('姓名');
            $table->string('password',50)->comment('密码');
            $table->string('avatar',100)->comment('头像');
            $table->string('email',50)->unique()->comment('邮箱');
            $table->tinyInteger('status')->default(1)->comment('1正常2禁用');
            $table->string('remember_token',100)->comment('记住我');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Config::get('auth_gaia.users_table'));
    }
}
