<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class SocialProfile extends Model
{
    protected $table = 'social_profiles';

    // muchos a uno (uno a muchos inverso)
    public function user(){
        return $this->belongsTo('App\User', 'users_id');
    }

}
