<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sender_id');
            $table->unsignedInteger('reciever_id');
            $table->string('message');
            $table->string('time');
            $table->timestamps();
            $table->softDeletes();
            

            $table->foreign('sender_id')
                  ->references('id')
                  ->on('users');
            $table->foreign('reciever_id')
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
        Schema::table('inboxes', function (Blueprint $table){
            $table->dropForeign(['sender_id']);
            $table->dropForeign(['reciever_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('personal_messages');
    }
}
