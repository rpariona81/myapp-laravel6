<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRoleUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_role_user', function (Blueprint $table) {
            /*$table->bigIncrements('id');
            $table->biginteger('role_id')->unsigned();
            $table->biginteger('user_id')->unsigned();*/
            $table->increments('id');
            $table->integer('user_id')->unsigned();  //Primero define usuario
            $table->integer('role_id')->unsigned();  //Luego rol
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_role_user');
    }
}
