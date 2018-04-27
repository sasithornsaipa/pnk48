<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sale_id');
            $table->string('path');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('sale_id')
                  ->references('id')
                  ->on('sales');
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
        Schema::table('images', function (Blueprint $table){
            $table->dropForeign(['sale_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('images');
    }
}
