<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = Config::get('auth_gaia.role_user_table');
        $foreignTableUser = Config::get('auth_gaia.users_table');
        $foreignTableRole = Config::get('auth_gaia.roles_table');
        if (!Schema::hasTable($tableName)){
            Schema::create($tableName, function (Blueprint $table)use($foreignTableUser,$foreignTableRole){
                $table->integer('user_id')->unsigned()->comment('');
                $table->integer('role_id')->unsigned()->comment('');
                //
                $table->foreign('user_id')
                    ->references('id')
                    ->on($foreignTableUser)
                    ->onUpdate('cascade')
                    ->onDelete('cascade');

                $table->foreign('role_id')
                    ->references('id')
                    ->on($foreignTableRole)
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
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
        Schema::table(Config::get('auth_gaia.role_user_table'), function(Blueprint $table){
            $table->dropForeign('user_id');
            $table->dropForeign('role_id');
        });
        Schema::dropIfExists(Config::get('auth_gaia.role_user_table'));
    }
}
