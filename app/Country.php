<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['name', 'domain', 'code'];

    public function pages()
    {
        return $this->hasMany('App\Page')->orderBy('created_at', 'DESC');
    }

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($country) { // before delete() method call this
             $country->pages()->delete();
             // do the rest of the cleanup...
        });
    }
}
