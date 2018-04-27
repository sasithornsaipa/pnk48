<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('seller_id');
            $table->unsignedInteger('buyer_id')->nullable();
            $table->unsignedInteger('book_id');
            $table->unsignedInteger('base_price');
            $table->unsignedInteger('total_price')->nullable();
            $table->enum('sale_type', ['retail', 'bid']);
            $table->enum('status', ['processing', 'deliverd', 'recieved']);
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->string('tracking_num')->nullable();
            $table->timestamps();
            $table->softDeletes();
            

            $table->foreign('seller_id')
                  ->references('id')
                  ->on('users');
            $table->foreign('buyer_id')
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
        Schema::table('sales', function (Blueprint $table){
          $table->dropForeign(['seller_id']);
          $table->dropForeign(['buyer_id']);
            $table->dropForeign(['book_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('sales');
    }
}
