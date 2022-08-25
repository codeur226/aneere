<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgrementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('agrements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('auditeur_id');
            $table->uuid('etat_id');
            $table->uuid('domaine_id');
            // $table->string('nom');
            $table->string('num_agrement')->unique();
            $table->date('date_delivrance');
            $table->foreign('auditeur_id')->references('id')->on('auditeurs')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('etat_id')->references('id')->on('etats')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('domaine_id')->references('id')->on('domaines')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('agrements');
    }
}
