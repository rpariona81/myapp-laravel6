<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCarrerasEquipamientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_carreras_equipamiento', function (Blueprint $table) {
            //$table->bigIncrements('id');
            //$table->integer('id');
            $table->increments('id');	
            $table->integer('id_carrera')->unsigned()->nullable();
            $table->integer('id_matriz')->nullable();
            $table->string('equipamiento',1000);
            $table->string('equipamiento_original',1000)->nullable();
            $table->string('categoria',50)->nullable();
            $table->string('ratio_estudiante',200)->nullable();
            $table->string('detalle_grupo_otros',200)->nullable();
            $table->string('tipo_ratio',200)->nullable();
            $table->smallInteger('ratio_numero')->nullable();
            $table->smallInteger('ratio_numerico')->nullable();
            $table->string('ambientes',500)->nullable();
            $table->string('modulo_programa',200)->nullable();
            $table->string('tipo_equipamiento')->nullable();
            $table->string('uso_equipamiento',2000)->nullable();
            $table->string('descripcion',3000)->nullable();
            $table->string('observaciones',3000)->nullable();
            $table->tinyInteger('activo')->default(1);
            $table->decimal('costo_unitario',10,2)->nullable();
            $table->string('fuente_consulta')->nullable();
            $table->string('equipo_costeado',4000)->nullable();
            $table->tinyInteger('referencia_matriz')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            //$table->primary('id');	
            $table->timestamps();
            $table->foreign('id_carrera')->references('id')->on('t_carreras')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_carreras_equipamiento');
    }
}
