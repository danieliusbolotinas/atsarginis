<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    protected $fillable = ['name', 'race', 'power_level', 'description'];
    protected $table = 'characters';
}
