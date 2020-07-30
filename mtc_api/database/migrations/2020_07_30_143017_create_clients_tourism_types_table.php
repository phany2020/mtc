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
            $table->bigIncrements('client_tourism_type_id');
            $table->unsignedInteger('tourism_type_id');
            $table->unsignedInteger('client_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('tourism_type_id')->references('tourism_type_id')->on('tourism_types');
            $table->foreign('client_id')->references('client_id')->on('clients');
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
