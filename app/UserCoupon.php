<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCoupon extends Model
{
  use SoftDeletes;

    /**
         * The attributes that should be mutated to dates.
         *
         * @var array
         */
        protected $dates = ['deleted_at'];

        public function user(){
			return $this->belongsTo('App\User', 'user_id');
		}
        public function coupon(){
			return $this->belongsTo('App\Coupon', 'coupon_id');
		}
}
