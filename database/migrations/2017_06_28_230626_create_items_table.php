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
            $table->string('item_url');
            $table->string('title')->nullable();
            $table->text('body')->nullable();
            $table->text('details')->nullable();
            $table->text('se')->nullable();
            $table->integer('category_id')->nullable();
            $table->decimal('raw_price')->nullable();
            $table->decimal('sell_price')->nullable();
            $table->string('discount',3)->nullable();
            $table->text('images')->nullable();
            $table->integer('seller_id')->unsigned()->nullable();
            $table->boolean('processed')->default(0);

            $table->timestamps();

            $table->foreign('feed_id')->references('id')->on('feeds')
            ->onDelete('cascade');
            $table->foreign('seller_id')->references('id')->on('sellers')
            ->onDelete('cascade');

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
        
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('items_feed_id_foreign');
            $table->dropForeign('items_seller_id_foreign');
        });    

        Schema::dropIfExists('items');
    }
}
