<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_carreras', function (Blueprint $table) {
            //$table->integer('id');
            $table->increments('id');	
            $table->string('alias_carrera');
            $table->char('id_inei',11)->nullable();
            $table->string('cod1')->nullable();
            $table->string('campo_educacion')->nullable();
            $table->string('cod2')->nullable();
            $table->string('campo_especifico')->nullable();
            $table->string('cod3')->nullable();
            $table->string('campo_detallado')->nullable();
            $table->string('cod4')->nullable();
            $table->string('carrera',255)->nullable();
            $table->string('codnivel')->nullable();
            $table->string('nivel_estudio')->nullable();
            $table->string('carrera_digitacion')->nullable();
            $table->string('cod_carrera',22)->nullable();
            $table->char('cod_generado',6)->nullable();
            $table->string('observacion')->nullable();
            $table->char('cnof',11)->nullable();
            $table->string('sector_economico',255)->nullable();
            $table->string('familia_productiva',255)->nullable();
            $table->string('actividad_economica',255)->nullable();
            $table->string('nivel_profesional')->nullable();
            $table->string('cod_cnof',50)->nullable();
            $table->string('denominacion')->nullable();
            $table->string('titulacion')->nullable();
            $table->string('grado_academico')->nullable();
            $table->string('fuente_minedu',255)->nullable();
            $table->char('creditos',11)->nullable();
            $table->char('nro_horas',11)->nullable();
            $table->char('vigencia',11)->nullable();
            $table->string('cod_censo')->nullable();
            $table->string('nom_censo')->nullable();
            $table->string('activ_economica_censo',500)->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            //$table->primary('id');	
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
        Schema::dropIfExists('t_carreras');
    }
}
