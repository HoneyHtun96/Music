<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name','photo','start_date'];

    public function artists($value=''){

    	return $this->belongsToMany('App\Artist','album_artists')
    			->withTimestamps();	
    }

    public function songs($value="")
    {
    	return $this->hasMany('App\Songs');
    }
}
