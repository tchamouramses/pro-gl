<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donnees', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date')->nullable();
            $table->string('valeur')->nullable();
            $table->integer('performance')->nullable();
            $table->enum('type_perf', ["ETOILE","NOMBRE"]);
            $table->enum('type_val', ["CHAINE","FICHIER"]);
            $table->string('description')->nullable();
            $table->integer('etudiant')->unsigned();
            $table->integer('categorie')->unsigned();
            $table->foreign('etudiant')->references('id')->on('etudiants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('categorie')->references('id')->on('categorie_donnees')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('donnees');
    }
}
