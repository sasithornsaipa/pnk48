<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('reportor_id');
            $table->unsignedInteger('reported_id');
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign('reportor_id')
                  ->references('id')
                  ->on('users');
            $table->foreign('reported_id')
                  ->references('id')
                  ->on('users');
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
        Schema::table('reports', function (Blueprint $table){
            $table->dropForeign(['reportor_id']);
            $table->dropForeign(['reported_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('reports');
    }
}
