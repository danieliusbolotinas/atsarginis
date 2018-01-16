<?php

namespace App\Helpers;

class PhotoHelper{    //vardų sritis
  public function deleteOne($photo){
    $this->deleteOneFromFileSystem($photo);
    $photo->delete();
  }
  protected function deleteOneFromFileSystem($photo){
    $path = storage_path('app/' .$photo->file_name);
    if (file_exists($path)){
      unlink($path);
      // echo $photo." was deleted";
    }
  }
}

 ?>
