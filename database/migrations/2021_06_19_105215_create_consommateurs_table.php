<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsommateursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consommateurs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('user_id');
            $table->uuid('ville_id');
            $table->uuid('domaine_id');
            $table->string('nom');
            $table->string('statut');
            $table->string('num_identification')->unique();
            $table->string('police')->nullable();
            $table->string('tel_mobile')->nullable();
            $table->string('tel_fixe')->nullable();
            $table->integer('bp')->nullable();
            $table->string('num_rccm')->nullable();
            $table->string('num_ifu')->nullable();
            $table->string('autre')->nullable();
            $table->integer('num_secteur')->nullable();
            $table->integer('rue')->nullable();
            $table->integer('num_porte')->nullable();
            $table->date('date_creation')->nullable();
            $table->foreign('ville_id')->references('id')->on('villes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('domaine_id')->references('id')->on('domaines')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('consommateurs');
    }
}
