<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inbox extends Model
{
  use SoftDeletes;

    /**
         * The attributes that should be mutated to dates.
         *
         * @var array
         */
        protected $dates = ['deleted_at'];

		public function sender(){
			return $this->belongsTo('\App\User', 'sender_id');
		}
		public function reciever(){
			return $this->belongsTo('\App\User', 'reciever_id');
		}

		public function event(){
			return $this->belongsTo('App\Event', 'event_id');
		}

		public function coupon(){
			return $this->hasMany('App\Coupon', 'coupon_id');
		}
}
