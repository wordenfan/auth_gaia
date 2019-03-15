<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = Config::get('auth_gaia.table_prefix').Config::get('auth_gaia.role_permission_table');
        Schema::create($tableName, function (Blueprint $table) {
            $table->tinyInteger('permission_id')->unsigned()->comment('');
            $table->tinyInteger('role_id')->unsigned()->comment('');
            //
            $table->foreign('permission_id')
                ->references('id')
                ->on('auth_permissions')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('role_id')
                ->references('id')
                ->on('auth_roles')
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
        Schema::table(Config::get('auth_gaia.role_permission_table'), function(Blueprint $table){
            $table->dropForeign('permission_id');
            $table->dropForeign('role_id');
        });
        Schema::dropIfExists(Config::get('auth_gaia.role_permission_table'));
    }
}
