<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_roles', function (Blueprint $table) {
            //$table->bigIncrements('id');
            $table->increments('id');
            $table->string('rolename');
            $table->string('slug', 255)->nullable();
            $table->string('description')->nullable();
            $table->integer('level')->default(1);
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
        Schema::dropIfExists('t_roles');
    }
}
