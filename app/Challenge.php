<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

// permisos y roles
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;


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

    // public function roles1(){
    //     return $this->hasOne(Role::class, "privacity");
    // }
}
