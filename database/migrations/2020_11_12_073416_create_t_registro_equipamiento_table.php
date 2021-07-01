<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTRegistroEquipamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_registro_equipamiento', function (Blueprint $table) {
            //$table->bigIncrements('id');
            //$table->integer('id');
            $table->increments('id');	
            $table->integer('id_instituto_carrera')->unsigned()->nullable();
            //$table->integer('id_instituto')->nullable();
            //$table->integer('id_carrera')->nullable();
            $table->integer('id_equipamiento')->nullable();
            $table->integer('id_matriz')->nullable();
            $table->integer('p1_flag')->nullable();
            $table->string('otro_equipamiento',500)->nullable();
            $table->string('clase_equipamiento_sbn',100)->nullable();
            $table->string('clase_equipamiento_opt',100)->nullable();
            $table->string('p1_tiene',22)->nullable();
            $table->integer('p2_cant')->nullable();
            $table->integer('p2_cant_operativa')->nullable();
            $table->integer('p2_cant_bueno')->nullable();
            $table->integer('p2_cant_regular')->nullable();
            $table->integer('p2_cant_malo')->nullable();
            $table->string('p3_observacion',2000)->nullable();
            $table->string('cant_definida',100)->nullable();
            $table->integer('cant_requerida')->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            //$table->primary('id');	
            $table->timestamps();
            $table->foreign('id_instituto_carrera')->references('id')->on('t_institutos_carreras')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_registro_equipamiento');
    }
}
