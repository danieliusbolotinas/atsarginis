<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = ['name', 'race', 'power_level', 'description'];
    protected $table = 'characters';
    public function photos(){
      return $this->hasMany('App\Photo');
    }
}
