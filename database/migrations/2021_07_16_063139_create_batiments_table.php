<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatimentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('batiments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('num_compteur')->nullable();
            $table->uuid('consommateur_id');
            $table->date('date_declaration');
            $table->string('niveau')->nullable();
            $table->foreign('consommateur_id')->references('id')->on('consommateurs')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('batiments');
    }
}
