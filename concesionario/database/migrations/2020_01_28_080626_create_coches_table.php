<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCochesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matricula', 8)->unique();
            $table->string('modelo');
            $table->string('color')->default('blanco');
            $table->string('tipo')->default('Gasolina');
            $table->integer('klms');
            $table->float('pvp', 7,2);
            $table->string('foto')->default('/img/coches/default.jpg');
            $table->bigInteger('marca_id')->unsigned()->nullable();
            $table->foreign('marca_id')
            ->references('id')
            ->on('marcas')
            ->onDelete('set null')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('coches');
    }
}
