<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// permisos y roles
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;


class Idea extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'archivo'];

    use HasRoles;
    protected $table = 'ideas';

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


