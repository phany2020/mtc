<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidesTourismTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guides_tourism_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tourism_type_id');
            $table->unsignedBigInteger('guide_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tourism_type_id')->references('id')->on('tourism_types')->onDelete('cascade');
            $table->foreign('guide_id')->references('id')->on('guides')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guides_tourism_types');
    }
}
