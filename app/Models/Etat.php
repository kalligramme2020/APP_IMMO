<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etat extends Model
{
    protected $table ='etat_lieux';

    protected $fillable = ['photo','description', 'location_id', 'users_id'];

    public function  location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id');
    }
}
