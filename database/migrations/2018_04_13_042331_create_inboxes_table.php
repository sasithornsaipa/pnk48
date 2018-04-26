<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInboxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inboxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('sender_id');
            $table->unsignedInteger('reciever_id');
            $table->unsignedInteger('coupon_id')->nuallable();
            $table->unsignedInteger('event_id')->nuallable();
            $table->boolean('is_recieved');
            $table->timestamps();

            $table->foreign('sender_id')
                  ->references('id')
                  ->on('users');
            $table->foreign('reciever_id')
                  ->references('id')
                  ->on('users');
            $table->foreign('event_id')
                  ->references('id')
                  ->on('events');
            $table->foreign('coupon_id')
                  ->references('id')
                  ->on('coupons');
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
        Schema::table('inboxes', function (Blueprint $table){
            $table->dropForeign(['sender_id']);
            $table->dropForeign(['reciever_id']);
            $table->dropForeign(['event_id']);
            $table->dropForeign(['coupon_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('inboxes');
    }
}
