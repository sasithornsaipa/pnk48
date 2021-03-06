<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShelvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shelves', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('book_id');
            $table->timestamps();
            $table->softDeletes();
            

            $table->primary(array('user_id', 'book_id'));

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
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
        Schema::table('shelves', function (Blueprint $table){
            $table->dropForeign(['user_id']);
            $table->dropForeign(['book_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('shelves');
    }
}
