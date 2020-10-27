<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musictype extends Model
{
    protected $fillable=['name'];

    public function songs($value=""){

    	return $this->hasMany('App\Songs');
    }
}
