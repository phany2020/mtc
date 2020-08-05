<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_sites', function (Blueprint $table) {
            $table->bigIncrements('news_sites_id');
            $table->unsignedBigInteger('new_id');
            $table->unsignedBigInteger('site_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('new_id')->references('new_id')->on('news');
            $table->foreign('site_id')->references('site_id')->on('sites');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news_sites');
    }
}
