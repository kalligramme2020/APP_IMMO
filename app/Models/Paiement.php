<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
        protected $table ="paiement";

        protected $fillable = ['location_id', 'locataire', 'bien',  'bailleur' , 'total', 'avance', 'reste', 'debut','fin', 'description','fait_le'];

        public function  location()
        {
            return $this->belongsTo('App\Models\Location', 'location_id');
        }
}
