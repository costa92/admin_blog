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
        Schema::create('articles' , function (Blueprint $table) {
            $table->increments('id');
            $table->string('title' , 50);
            $table->string("describe")->default('');
            $table->integer('category_id')->default(0);
            $table->text('content');
            $table->timestamps();
            $table->integer('user_id');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('comment_status')->default(0);
            $table->integer('like_count')->default(0);
            $table->integer('comment_count')->default(0);
            $table->integer('page_view')->default(0);
            $table->softDeletes();
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
