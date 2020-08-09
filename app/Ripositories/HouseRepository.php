<?php


namespace App\Ripositories;
use App\Models\Bien;
use Illuminate\Support\Facades\Auth;

class HouseRepository
{
    public function getHouses ()
    {
        return Bien::with('pieces','tbien')->get()->where('users_id', '==', Auth::id());
//        return Bien::all()->where('users_id', '==', Auth::id());

    }

    public function createHouse ($request)
    {

        return  Bien::create([
            'users_id' => Auth::id(),
            'typehouse_id' => $request['typehouseId'],
            'appellation' => $request['label'],
            'Pays' => $request['pays'],
            'Ville' => $request['ville'],
            'region' => $request['region'],
            'surface' => $request['surface'],
            'addresse' => $request['address'],
            'description' => $request['description'],
        ]);


    }

    public function deleteHouse ($id)
    {

        $drophouse = Bien::find($id);
            $drophouse->pieces()->detach($id);
            $drophouse->delete();
        if ($drophouse) {
            return response()->json([
                'status' => '1',
                'message' => 'supression avec succée'
            ]);
        } else {
            return response()->json([
                'status' => '0',
                'message' => 'erreur'
            ]);
        }

    }

    public function ShowHouse ($id)
    {
        $modifyHouse = Bien::find($id);
        if ($modifyHouse){
            return response()->json($modifyHouse);
        }
    }


    public function UpdateHouse ($id)
    {

    }


}
