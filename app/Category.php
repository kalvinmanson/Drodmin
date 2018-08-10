<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function pages()
  {
    return $this->hasMany('App\Page')->orderBy('weight', 'desc');
  }
  public function blocks()
  {
    return $this->hasMany('App\Page')->orderBy('weight', 'desc');
  }
}
