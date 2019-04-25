<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->engine = "MyISAM";
            $table->bigIncrements('com_id');
            $table->text('com_text');
            $table->string('com_name',255);
            $table->string('com_email',255);
            $table->string('com_site',255);
            $table->integer('parent_id');
            $table->integer('article_id')->unsigned()->default(1);
            $table->foreign('article_id')->references('art_id')->on('articles');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('comments');
    }
}
