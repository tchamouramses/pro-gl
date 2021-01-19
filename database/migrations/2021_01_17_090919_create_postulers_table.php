<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostulersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postulers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->string('piece_jointe')->nullable();
            $table->enum('statut', ["ACCEPTER","REJETER","ATTENTE"]);
            $table->integer('etudiant')->unsigned();
            $table->integer('stage')->unsigned();
            $table->foreign('etudiant')->references('id')->on('etudiants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('stage')->references('id')->on('stages')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('postulers');
    }
}
