<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type_bien extends Model
{
    protected $fillable =['name'];

    protected $table ="type_bien";

    public function pieces(){
        return $this->hasMany('App\Models\Piece','type_bien_id');
    }
}
