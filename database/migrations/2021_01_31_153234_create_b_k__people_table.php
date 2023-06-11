<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBKPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bk_people', function (Blueprint $table) {
            $table->bigIncrements('id_backup');
            $table->bigInteger('id')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->date('birthdate')->nullable();
            $table->biginteger('created_by')->nullable();
            $table->biginteger('updated_by')->nullable();
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
        Schema::dropIfExists('bk_people');
    }
}
