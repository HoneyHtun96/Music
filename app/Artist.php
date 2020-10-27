<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $fillable = ['name','photo','gender','biography'];

  public function songs($values=""){

  	return $this->belognsToMany('App\Songs');

  }
}
