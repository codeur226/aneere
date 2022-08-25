<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRqcmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('rqcms', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('qcm_id');
            $table->string('etiquette');
            $table->boolean('reponse')->nullable();
            $table->foreign('qcm_id')->references('id')->on('qcms')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('rqcms');
    }
}
