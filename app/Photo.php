<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\PhotoHelper;

class Photo extends Model
{
    protected $fillable = [
      'file_name',
      'character_id'
    ];
    public function getUrlAttribute(){
      // return $this->file_name;
    $photoHelper = app(PhotoHelper::class);
    return $photoHelper->generateUrl($this);
    }
}
