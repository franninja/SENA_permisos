<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    protected $table = 'challenges';

    // relacion uno a muchos polimorfica
    public function uploads(){
        return $this->morphMany('App\Upload', 'uploadable');
    }
}
