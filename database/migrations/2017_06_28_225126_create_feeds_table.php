<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFeedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feeds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('marketplace_id')->unsigned();
            $table->string('url');
            $table->string('department',63);
            $table->string('replacer',63);
            $table->boolean('processed')->default(0);
            $table->boolean('enabled')->default(1);
            $table->timestamps();

            $table->foreign('marketplace_id')->references('id')
            ->on('marketplaces')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('feeds', function (Blueprint $table) {
            $table->dropForeign('feeds_marketplace_id_foreign');
        });        
        Schema::dropIfExists('feeds');
    }
}
