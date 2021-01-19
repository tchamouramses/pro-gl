<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEntreprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('nom')->nullable();
            $table->string('adresse')->nullable();
            $table->string('tel_entreprise')->nullable();
            $table->string('responsable')->nullable();
            $table->string('ville')->nullable();
            $table->string('logo')->nullable();
            $table->string('pays')->nullable();
            $table->integer('administrateur')->unsigned();
            $table->foreign('administrateur')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entreprises');
    }
}
