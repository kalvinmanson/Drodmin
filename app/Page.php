<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	
    protected $fillable = ['category_id', 'country_id', 'name', 'slug', 'content'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function country()
    {
        return $this->belongsTo('App\Country');
    }
    
    public function fields()
    {
        return $this->hasMany('App\Field');
    }
}
