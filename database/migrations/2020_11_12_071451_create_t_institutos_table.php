<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTInstitutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_institutos', function (Blueprint $table) {
            //$table->integer('id');
            $table->increments('id');	
            $table->integer('id_region')->unsigned()->nullable();
            //$table->string('region')->nullable();
            $table->char('cod_mod',7);
            $table->char('anexo',2)->nullable();
            $table->char('cod_local',6)->nullable();
            $table->string('cen_edu');
            $table->string('instituto')->nullable();
            $table->string('es_licenciado')->nullable();
            $table->integer('matricula_2020')->nullable();
            $table->string('rm_licenciamiento')->nullable();
            $table->string('es_idex')->nullable();
            $table->string('d_niv_mod')->nullable();
            $table->string('d_gestion')->nullable();
            $table->string('d_ges_dep')->nullable();
            $table->string('dareacenso')->nullable();
            $table->string('codgeo')->nullable();
            $table->string('d_dpto')->nullable();
            $table->string('d_prov')->nullable();
            $table->string('d_dist')->nullable();
            $table->string('d_region')->nullable();
            $table->string('codooii')->nullable();
            $table->string('d_dreugel')->nullable();
            $table->char('optimizacion',20)->nullable();
            $table->tinyInteger('estado')->default(1);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            //$table->primary('id');	
            $table->timestamps();
            $table->foreign('id_region')->references('id')->on('t_regiones')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_institutos');
    }
}
