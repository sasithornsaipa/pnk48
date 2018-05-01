<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
  use SoftDeletes;

    /**
         * The attributes that should be mutated to dates.
         *
         * @var array
         */

        protected $fillable = [
             'fname', 'lname', 'birthday', 'sex', 'tel', 'address','coin'
         ];


        protected $dates = ['deleted_at'];

        public function user() {
          return $this->belongsTo('App\User', 'id');
        }
}
