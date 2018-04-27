<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('birthday');
            $table->enum('sex', ['male', 'female']);
            $table->string('tel');
            $table->text('address');
            $table->unsignedInteger('coin');
            $table->string('image_path')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
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
        Schema::table('profiles', function (Blueprint $table){
            $table->dropForeign(['user_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('profiles');
    }
}
