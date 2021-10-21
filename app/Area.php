<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "areas";

    // uno a muchos
    public function challenges(){
        return $this->hasMany("App\Challenge");
    }

    public function users(){
        return $this->hasMany("App\User");
    }
}
