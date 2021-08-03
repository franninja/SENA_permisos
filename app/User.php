<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

// socialite
use App\SocialProfile;

// permisos y roles
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'n_documento','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function adminlte_image(){
        
        $social_profile = $this->socialProfiles->first();

        if($social_profile){
            return $social_profile->social_avatar;
        }else{
            return 'https://picsum.photos/300/300';
        }
        
    }

    public function adminlte_desc(){
        if (\Auth::user()->roles()->first()) {
            return \Auth::user()->roles()->first()->name;
        } else {
            return "usuario";
        }
        
        
    }

    public function adminlte_profile_url()
    {
        return 'profile/username';
    }

    // relacion uno a muchos
    public function socialProfiles(){
        return $this->hasMany('App\SocialProfile');
    }

    // muchos a muchos
    // public function Roles(){
    //     Return $this->
    // }

    // uno a muchos 
    public function challenges(){
        return $this->hasMany('App\Challenge');
    }

}
