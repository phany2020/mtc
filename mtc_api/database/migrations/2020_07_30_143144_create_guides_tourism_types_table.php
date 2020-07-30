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
            $table->bigIncrements('guides_tourism_type_id');
            $table->unsignedInteger('tourism_type_id');
            $table->unsignedInteger('guide_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tourism_type_id')->references('tourism_type_id')->on('tourism_types');
            $table->foreign('guide_id')->references('guide_id')->on('guides');
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
