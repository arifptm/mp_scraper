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
            $table->string('image_url')->nullable();
            $table->integer('city_id')->unsigned();            
            //$table->timestamps();

            $table->foreign('city_id')->references('id')->on('cities')
            ->onDelete('cascade');

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
        });         
        Schema::dropIfExists('sellers');
    }
}
