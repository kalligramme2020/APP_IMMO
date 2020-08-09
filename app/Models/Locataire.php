<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Locataire extends Model
{

    use Notifiable,HasApiTokens;

    protected $table ="locataire";

    protected $fillable = ['nom', 'prenom', 'email','numero', 'photo','cni','ville','nationalite', 'users_id'];

    public function user(){
        return $this->belongsTo('App\Models\User','users_id');
    }

    public function biens()
    {
        return $this->belongsToMany('App\Models\Bien', 'location','bien_id','locataire_id')->withTimestamps();
    }


}
