<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Piece extends Model
{
    protected $table = "piece";

    protected $fillable = ['cuisine' , 'chambre', 'salon', 'parking', 'studio', 'salle_bain', 'appartement','type_bien_id', 'terrasse','magasin'];

    public static function boot() {
        parent::boot();

        static::deleting(function($tag) { // before delete() method call this
            $tag->biens()->detach();
        });
    }

    public function biens()
    {
        return $this->belongsToMany('App\Models\Bien', 'bien_piece','bien_id','piece_id')->withPivot('nombre')->withTimestamps();
    }



    public function tBiens(){
        return $this->belongsTo('App\Models\Type_bien');
    }
}
