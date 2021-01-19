<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stages', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('nom')->nullable();
            $table->date('date_fin')->nullable();
            $table->date('date_debut')->nullable();
            $table->string('fichier_join')->nullable();
            $table->enum('portee', ["INFINI","ANNUELLE"]);
            $table->integer('entreprise')->unsigned();
            $table->foreign('entreprise')->references('id')->on('entreprises')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stages');
    }
}
