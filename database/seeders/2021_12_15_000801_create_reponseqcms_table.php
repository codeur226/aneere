<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponsesqcmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('reponseqcms', function (Blueprint $table) {
        //     $table->uuid('id')->primary();
        //     $table->uuid('options_qcm_id');
        //     $table->uuid('audit_id');
        //     $table->boolean('reponse')->nullable();
        //     $table->foreign('options_qcm_id')->references('id')->on('optionsqcms')->onUpdate('cascade')->onDelete('cascade');
        //     $table->foreign('audit_id')->references('id')->on('audits')->onUpdate('cascade')->onDelete('cascade');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reponsesqcms');
    }
}
