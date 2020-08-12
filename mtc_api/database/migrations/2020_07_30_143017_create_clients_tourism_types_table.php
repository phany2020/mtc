<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTourismTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients_tourism_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tourism_type_id');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tourism_type_id')->references('id')->on('tourism_types')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients_tourism_types');
    }
}
