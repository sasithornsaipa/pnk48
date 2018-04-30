<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
  use SoftDeletes;
  
  /**
  * The attributes that should be mutated to dates.
  *
  * @var array
  */
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'reportor_id', 'reported_id', 'description'
];
  
  public function reportor(){
    return $this->belongsTo('App\User', 'reportor_id');
  }
  
  public function reported(){
    return $this->belongsTo('App\User', 'reported_id');
  }
}
