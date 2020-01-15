<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text("name");
            $table->text("addres_text");
            $table->integer('time');
            $table->integer('date');
            $table->timestamps();
        });

        Schema::create('authors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->text('surname');
            $table->timestamps();
        });

        Schema::create('book', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->integer('isbn');
            $table->integer('count_page');
            $table->timestamps();
        });

        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name');
            $table->timestamps();
        });

        Schema::create('news_to_author', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_news');
            $table->integer('id_authors');
            $table->timestamps();
        });

        Schema::create('news_to_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_news');
            $table->integer('id_category');
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
        Schema::dropIfExists('news');
    }
}
