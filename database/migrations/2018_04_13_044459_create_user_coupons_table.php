<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_coupons', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('coupon_id');
            $table->timestamps();
            $table->softDeletes();


            $table->primary(array('user_id', 'coupon_id'));

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users');
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
        Schema::table('user_coupons', function (Blueprint $table){
          $table->dropForeign(['user_id']);
          $table->dropForeign(['coupon_id']);
        });
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('user_coupons');
    }
}
