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
            $table->engine = "MyISAM";
            $table->bigIncrements('art_id');
            $table->string('art_title',255);
            $table->text('art_text');
            $table->text('art_desc');
            $table->string('art_alias',150)->unique();
            $table->string('art_img');

            $table->integer('user_id')->unsigned()->default(1);
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('category_id')->unsigned()->default(1);
            $table->foreign('category_id')->references('cat_id')->on('categories');
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
