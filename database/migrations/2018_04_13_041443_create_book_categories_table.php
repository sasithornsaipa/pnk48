<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('book_id');
            $table->enum('category', ['scifi', 'drama', 'action&adventure', 'romance', 'mystery', 'horror', 'health', 'guide',
                         'travel', 'children', 'newage', 'science', 'history', 'math', 'anthology', 'poetry', 'encyclopedias',
                         'dictionaries', 'comics', 'art', 'cookbooks', 'diaries', 'journals', 'prayerbooks', 'series', 'trilogy',
                         'biographies', 'autobiographies', 'fantasy']);
            $table->timestamps();

            $table->foreign('book_id')
                  ->references('id')
                  ->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::table('book_categories', function (Blueprint $table){
            $table->dropForeign(['book_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('book_categories');
    }
}
