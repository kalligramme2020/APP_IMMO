<?php

namespace App\Http\Controllers;
use App\Models\Pays;
use App\Models\Type_bien;
use Illuminate\Http\Request;

class PaysController extends Controller
{


    public function getpays(){
        $pays = Pays:: all();
        $tbiens = Type_bien::all();
        return response()->json([
            'land' => $pays ,  'peol' => $tbiens
        ]);
    }
}
