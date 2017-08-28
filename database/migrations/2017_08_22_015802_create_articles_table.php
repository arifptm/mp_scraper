<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',191);
            $table->string('slug',191);
            $table->string('marketplace',63)->nullable();            
            $table->text('teaser')->nullable();
            $table->text('body')->nullable();
            $table->string('image')->nullable();
            $table->string('views',9)->default(1);
            
            $table->index(['slug', 'title']);            
            $table->engine = 'InnoDB';
            
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
