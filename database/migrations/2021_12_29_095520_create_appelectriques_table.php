<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppelectriquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('appelectriques', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('fiche_id');
            $table->uuid('audit_id');
            $table->string('emplacement')->nullable();
            $table->string('designation')->nullable();
            $table->string('quantite')->nullable();
            $table->string('puissance_electrique')->nullable();
            $table->string('duree')->nullable();
            $table->string('etat_fonctionnement')->nullable();
            $table->string('Observations')->nullable();
            $table->foreign('fiche_id')->references('id')->on('fiches')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('audit_id')->references('id')->on('audits')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('appelectriques');
    }
}
