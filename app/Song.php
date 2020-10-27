<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    protected $fillable = ['name','file','musictype_id','album_id'];

     public function artists($value=''){

    	return $this->belongsToMany('App\Artist','song_artists')
    			->withTimestamps();	
    }

    public function musictype($value=""){

    	return $this->belongsTo('App\Musictype');
    }

    public function album($value="")
    {
    	return $this->belongsTo('App\Album');
    }
}
