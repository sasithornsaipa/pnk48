<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
  use SoftDeletes;

    /**
         * The attributes that should be mutated to dates.
         *
         * @var array
         */
        protected $dates = ['deleted_at'];

        public function seller(){
			return $this->belongsTo('App\User', 'seller_id');
		}

        public function buyer(){
			return $this->belongsTo('App\User', 'buyer_id');
		}

		public function books(){
			return $this->belongsTo('App\Book', 'book_id');
		}
}
