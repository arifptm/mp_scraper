<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('feed_id')->unsigned();
            $table->string('title');
            $table->text('details')->nullable();
            $table->text('body')->nullable();
            $table->string('categories')->nullable();
            $table->decimal('raw_price')->nullable();
            $table->decimal('sell_price')->nullable();
            $table->string('discount',3)->nullable();
            $table->text('images')->nullable();
            $table->string('seller')->nullable();
            $table->string('seller_image')->nullable();
            $table->integer('city_id')->unsigned()->nullable();

            $table->timestamps();

            $table->foreign('feed_id')->references('id')->on('feeds')
            ->onDelete('cascade');
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
        
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('items_city_id_foreign');
            $table->dropForeign('items_feed_id_foreign');
        });    

        Schema::dropIfExists('items');
    }
}
