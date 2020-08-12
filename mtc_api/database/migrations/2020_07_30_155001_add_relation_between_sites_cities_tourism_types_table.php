<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationBetweenSitesCitiesTourismTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sites', function (Blueprint $table) {
            $table->unsignedBigInteger('citie_id');
            $table->unsignedBigInteger('tourism_type_id');

            $table->foreign('citie_id')->references('id')->on('cities')->onDelete('cascade');
            $table->foreign('tourism_type_id')->references('id')->on('tourism_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
