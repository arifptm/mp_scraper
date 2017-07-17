<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',63);
            $table->string('slug',63);
            $table->string('image_url')->nullable();
            $table->integer('city_id')->unsigned();
            $table->integer('marketplace_id')->unsigned();

            $table->foreign('city_id')->references('id')->on('cities')
            ->onDelete('cascade');

            $table->foreign('marketplace_id')->references('id')->on('marketplaces')
            ->onDelete('cascade');

            $table->index(['slug', 'name']);

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sellers', function (Blueprint $table) {
            $table->dropForeign('sellers_city_id_foreign');
            $table->dropForeign('sellers_marketplace_id_foreign');
        });         
        Schema::dropIfExists('sellers');
    }
}
