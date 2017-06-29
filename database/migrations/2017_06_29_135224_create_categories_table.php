<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',63);
            $table->integer('feed_id')->unsigned();
            $table->string('replacer',63)->nullable();
            $table->integer('parent')->unsigned()->nullable();
            //$table->timestamps();

            $table->foreign('feed_id')->references('id')->on('feeds')
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
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign('categories_feed_id_foreign');
        });        
        Schema::dropIfExists('categories');
    }
}
