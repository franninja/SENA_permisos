<?php

namespace App;

// permisos y roles
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasRoles;
    protected $table = 'challenges';

    public function user(){
    	return $this->belongsTo('App\User', 'user_id');
    }

    // relacion uno a muchos polimorfica
    public function uploads(){
        return $this->morphMany('App\Upload', 'uploadable');
    }

    //muchos a uno
    public function area(){
    	return $this->belongsTo('App\Area', 'area_id');
    }
}
