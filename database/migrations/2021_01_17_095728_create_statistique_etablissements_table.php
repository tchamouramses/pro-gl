<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStatistiqueEtablissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistique_etablissements', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('nb_postuler')->nullable();
            $table->float('taux_reussite_examen')->nullable();
            $table->integer('nb_diplome_annuelle')->nullable();
            $table->integer('nb_etudiant_affilier')->nullable();
            $table->integer('nb_entreprise_part')->nullable();
            $table->integer('nb_stage_recus')->nullable();
            $table->float('f_m_j_programme')->nullable();
            $table->integer('etablissement')->unsigned();
            $table->foreign('etablissement')->references('id')->on('etablissements')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('statistique_etablissements');
    }
}
