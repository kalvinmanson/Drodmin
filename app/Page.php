<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
  public function category()
  {
    return $this->belongsTo('App\Category');
  }
  public function fields()
  {
    return $this->hasMany('App\Field');
  }
}
