<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Locataire;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::with('bien','locataire')->get()->where('users_id', '==', Auth::id());
//        dd($locations);
       return view('Location.location',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locataires = Locataire::all()->where('users_id', '==', Auth::id());
        $biens = Bien::with('pieces', 'tbien')->get()->where('users_id', '==', Auth::id());
        return view('Location.new_location' ,compact('biens','locataires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'bienlouer' => ['required', 'string', 'max:255'],
            'identifiant' => ['required', 'string', 'max:255'],
        ]);

        $Addlocation = Location::create([
            'locataire_id' => $request['locataire_id'],
            'users_id' => Auth::id(),
            'bien_id' => $request['bienlouer'],
            'activiter_proprio' => $request['proprioDescription'],
            'activiter_locataire' => $request['locataireDescription'],
            'conditions' => $request['condition'],
            'description' => $request['description'],
            'montant_proprio' => $request['proprio'],
            'montant_locataire' => $request['locataire'],
            'residence1' => $request['residence1'],
            'residence2' => $request['residence2'],
            'loyer_hc' => $request['loyerhc'],
            'loyer_ac' => $request['loyerac'],
            'charge' => $request['charge'],
            'debut_bail' => $request['debutb'],
            'fin_bail' => $request['finb'],
            'duree_bail' => $request['dureeb'],
            'activiter' => $request['activite'],
            'type_bail' => $request['typebail'],
            'identifiant' => $request['identifiant'],
            'garantir' => $request['garantir'],
            'payment_date' => $request['paiement_date'],

        ]);

        Flashy::message(' location enregistrée avec succeé!');

        return redirect()->route('rental.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showlocation = Location::with('bailler', 'etats','locataire', 'bien')->find($id);
//        dd($showlocation);
        return view('Location.showlocation', compact('showlocation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $locataires = Location::all()->where('users_id', '==', Auth::id());
        $biens = Bien::all()->where('users_id', '==', Auth::id());
        $editloation = Location::find($id);
        return view('Location.editlocation', compact('editloation', 'biens','locataires'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updateLocation = Location::find($id);
        $updateLocation->update([
            'locataire_id' => $request['locataire_id'],
            'users_id' => Auth::id(),
            'bien_id' => $request['bienlouer'],
            'activiter_proprio' => $request['proprioDescription'],
            'activiter_locataire' => $request['locataireDescription'],
            'conditions' => $request['condition'],
            'description' => $request['description'],
            'montant_proprio' => $request['proprio'],
            'montant_locataire' => $request['locataire'],
            'residence1' => $request['residence1'],
            'residence2' => $request['residence2'],
            'loyer_hc' => $request['loyerhc'],
            'loyer_ac' => $request['loyerac'],
            'charge' => $request['charge'],
            'debut_bail' => $request['debutb'],
            'fin_bail' => $request['finb'],
            'duree_bail' => $request['dureeb'],
            'activiter' => $request['activite'],
            'type_bail' => $request['typebail'],
            'identifiant' => $request['identifiant'],
            'garantir' => $request['garantir'],
            'payment_date' => $request['paiement_date'],
        ]);

        Flashy::message('location modifier avec succeé!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $location = Location::with('etats')->find($id);
        $location->etats()->delete();
        $location->paiments()->delete();
        $location->delete();
        Flashy::message(' location supprimé avec succeé!');
        return redirect()->route('house.index');
    }

    private function valid($request){
        return $this->validate($request, [
            'bienlouer' => ['required', 'int', 'max:255', 'min:5'],
            'locataire_id' => ['required','int'],
            'name' => ['required', 'string' , 'max:255', 'min:5'],
            'typebien' => ['required', 'string', 'max:255', ],
        ]);
    }
}
