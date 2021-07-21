<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = 'uploads';
    
    // relacion polimorfica uno a muchos polomorfica
    public function uploadable(){
        return $this->morphTo();
    }
}
