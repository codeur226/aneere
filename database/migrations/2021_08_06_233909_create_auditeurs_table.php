<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditeursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('auditeurs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('ville_id');
            $table->string('nom');
            $table->uuid('personne_id');
            $table->string('num_ifu')->nullable();
            $table->string('num_rccm')->nullable();
            $table->integer('secteur')->nullable();
            $table->integer('rue')->nullable();
            $table->integer('num_porte')->nullable();
            $table->integer('num_bp')->nullable();
            $table->string('tel_fixe')->nullable();
            $table->string('tel_mobile');
            $table->string('email')->unique();
            $table->date('date_creation')->nullable();
            $table->date('date_declaration');
            $table->foreign('personne_id')->references('id')->on('personnes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ville_id')->references('id')->on('villes')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('auditeurs');
    }
}
