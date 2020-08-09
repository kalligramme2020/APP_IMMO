<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\CanResetPassword;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','prenom','ville', 'cni', 'pays','profil','numero',
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

    public function biens()
    {
        return $this->hasMany('App\Models\Bien', 'users_id');
    }

    public function locataires()
    {
        return $this->hasMany('App\Models\Locataire', 'users_id');
    }

    public function locations()
    {
        return $this->hasMany('App\Models\Location', 'users_id');
    }






    protected $table = 'users';
}
