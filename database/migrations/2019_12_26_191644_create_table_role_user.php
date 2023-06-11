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
<<<<<<< HEAD
            $table->bigIncrements('id');
            //$table->biginteger('role_id')->unsigned();
            //$table->biginteger('user_id')->unsigned();
            $table->biginteger('role_id')->unsigned();//->index();
            $table->biginteger('user_id')->unsigned();//->index();
            $table->foreign('role_id')->references('id')->on('t_roles');
            
            $table->foreign('user_id')->references('id')->on('t_users');
            $table->timestamps();
=======
            /*$table->bigIncrements('id');
            $table->biginteger('role_id')->unsigned();
            $table->biginteger('user_id')->unsigned();*/
            $table->increments('id');
            $table->integer('user_id')->unsigned();  //Primero define usuario
            $table->integer('role_id')->unsigned();  //Luego rol
>>>>>>> 754d150d2b279b46aa6e9a981ca54e36aae82791
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
