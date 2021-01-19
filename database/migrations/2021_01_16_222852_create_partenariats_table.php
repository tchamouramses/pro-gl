<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartenariatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partenariats', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('date_debut')->nullable();
            $table->integer('duree')->nullable();
            $table->date('date_signature')->nullable();
            $table->integer('entreprise')->unsigned();
            $table->integer('etablissement')->unsigned();
            $table->foreign('entreprise')->references('id')->on('entreprises')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('partenariats');
    }
}
