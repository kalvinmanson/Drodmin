<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'content'];

    public function pages()
    {
        return $this->hasMany('App\Page');
    }

    public function fields()
    {
        return $this->hasMany('App\Field');
    }

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($category) { // before delete() method call this
             $category->pages()->delete();
             // do the rest of the cleanup...
        });
    }
}
