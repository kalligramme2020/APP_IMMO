<?php

namespace App\Ripositories;
use App\Models\Bien;
use App\Models\Piece;
use Illuminate\Support\Facades\Auth;

class BienRipository
{

    public function addbien($data){

//        $data->validate([
//            'typebien' => ['required'],
//            'name' => ['required', 'string', 'max:255'],
//            'addresse' => ['required', 'string'],
//
//        ]);

        if($data->hasFile('file')) {
            $imageName = time() . '.' . $data->file->extension();
            $data->file->move(public_path('profil'), $imageName);

            $databien = Bien::create([

                'bien_id' => $data['bienParent'],
                'users_id' => Auth::id(),
                'type_bien_id' => $data['typebien'],
                'name' => $data['name'],
                'pays_id' => $data['pays'],
                'ville' => $data['ville'],
                'region' => $data['region'],
                'surface' => $data['surface'],
                'addresse' => $data['addresse'],
                'description' => $data['description'],
                'photo' => $imageName,
            ]);
        }else{
            $databien = Bien::create([

                'bien_id' => $data['bienParent'],
                'users_id' => Auth::id(),
                'type_bien_id' => $data['typebien'],
                'name' => $data['name'],
                'pays_id' => $data['pays'],
                'ville' => $data['ville'],
                'region' => $data['region'],
                'surface' => $data['surface'],
                'addresse' => $data['addresse'],
                'description' => $data['description'],
            ]);

        }

       $datapiece = Piece::create([
           'type_bien_id' => $data['typebien'],
            'chambre' => $data['chambre'],
            'salon'  => $data['salon'],
            'salle_bain'  => $data['bain'],
            'cuisine' => $data['cuisine'],
            'parking' => $data['parking'],
            'appartement' => $data['appart'],
            'appart_meuble' => $data['appart_meuble'],
            'studio' => $data ['studio'],
            'studio_meuble' => $data['studio_meuble'],
            'magasin' => $data['magasin'],
            'terasse' => $data['terasse'],
        ]);

       $databien->pieces()->attach($datapiece);
    }

    public function updateBien($data, $id){

        if($data->hasFile('file')) {

            $imageName = time() . '.' . $data->file->extension();
            $data->file->move(public_path('profil'), $imageName);

            $bienupdate = Bien::find($id);
            $bienupdate->update([
                'users_id' => Auth::id(),
                'type_bien_id' => $data['typebien'],
                'name' => $data['name'],
                'pays' => $data['pays'],
                'ville' => $data['ville'],
                'region' => $data['region'],
                'surface' => $data['surface'],
                'addresse' => $data['addresse'],
                'description' => $data['description'],
                'photo' => $imageName,

            ]);

        }else{
            $bienupdate = Bien::find($id);
            $bienupdate->update([
                'users_id' => Auth::id(),
                'type_bien_id' => $data['typebien'],
                'name' => $data['name'],
                'pays' => $data['pays'],
                'ville' => $data['ville'],
                'region' => $data['region'],
                'surface' => $data['surface'],
                'addresse' => $data['addresse'],
                'description' => $data['description'],

            ]);
        }

        $pieceUpdate = Piece::find($id);
//        $pieceUpdate->update([
//            'chambre' => $data['chambre'],
//            'salon'  => $data['salon'],
//            'salle_bain'  => $data['bain'],
//            'cuisine' => $data['cuisine'],
//            'parking' => $data['parking'],
//            'appartement' => $data['appart'],
//            'appart_meuble' => $data['appart_meuble'],
//            'studio' => $data ['studio'],
//            'studio_meuble' => $data['studio_meuble'],
//            'magasin' => $data['magasin'],
//            'terasse' => $data['terasse'],
//        ]);

        $bienupdate->pieces()->attach($pieceUpdate);

    }

}
