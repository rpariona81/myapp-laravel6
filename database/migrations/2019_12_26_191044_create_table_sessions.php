<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_sessions', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->unsignedInteger('user_id')->nullable();
            //$table->foreignId('user_id')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->unsignedInteger('timestamp')->default(0);
            $table->text('user_agent')->nullable();
            $table->text('payload');
            $table->binary('data')->nullable();
            $table->integer('last_activity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_sessions');
    }
}
