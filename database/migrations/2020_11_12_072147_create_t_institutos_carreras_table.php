<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTInstitutosCarrerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_institutos_carreras', function (Blueprint $table) {
            //$table->integer('id');
            $table->increments('id');	
            //$table->string('cod_mod')->nullable();
            $table->integer('id_instituto')->unsigned()->nullable();
            //$table->string('cod_generado')->nullable();
            $table->integer('id_carrera')->unsigned()->nullable();
            $table->tinyInteger('activo')->default(1);
            $table->date('fecha_autorizacion')->nullable();
            $table->string('resol_autorizacion')->nullable();
            $table->string('informacion_adicional',1000)->nullable();
            $table->tinyInteger('ind_aer')->nullable();
            $table->string('d_ind_aer',20)->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->string('programa_anterior')->nullable();
            $table->timestamps();
            $table->foreign('id_instituto')->references('id')->on('t_institutos')->onDelete('SET NULL');
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
        Schema::dropIfExists('t_institutos_carreras');
    }
}
