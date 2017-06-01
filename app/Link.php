<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	protected $fillable = ['menu_id', 'parent_id', 'country_id', 'name', 'link', 'orden'];

    public function menu()
    {
        return $this->belongsTo('App\Menu');
    }
    public function country()
    {
        return $this->belongsTo('App\Country', 'country_id');
    }
    public function parent()
    {
        return $this->belongsTo('App\Link', 'parent_id');
    }
    public function children()
    {
        return $this->hasMany('App\Link', 'parent_id')->orderBy('orden', 'asc');
    }

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($link) { // before delete() method call this
             $link->children()->delete();
             // do the rest of the cleanup...
        });
    }
}
