<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Locataire;
use App\Models\Location;
use App\Models\Paiement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Paiement::all()->where('bailleur' , '==' ,Auth::id());

//        dd($payments);
        return  view('Payment.finance',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tenants = Locataire::all()->where('users_id' , '== ', Auth::id());
        $biens = Bien::all()->where('users_id' , '== ', Auth::id());
        $rentals = Location::all()->where('users_id' , '== ', Auth::id());
        return  view('Payment.payment', compact('tenants', 'biens', 'rentals'));
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
            'location' => ['required', 'string', 'max:255'],
            'locataire' => ['required', 'string', 'max:255'],
            'addresse' => ['required', 'string'],

        ]);

        $Addinvoice = Paiement::create([
           'bailleur' => Auth::id(),
            'location_id' => $request['location'],
            'locataire' => $request['locataire'],
            'bien' => $request['bien'],
            'debut' => $request['debut'],
            'fin' => $request['fin'],
            'fait_le' => $request['date'],
            'reste' => $request['reste'],
            'avance' => $request['avance'],
            'total' => $request['total'],
            'description' => $request['description'],

        ]);

        Flashy::message('enregistrer avec succeé!');
        redirect()->route('payment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $showInvice = Paiement::find($id);
         return view('Payment.showInvoice',  compact('showInvice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biens = Bien::all()->where('users_id' , '== ', Auth::id());
        $rentals = Location::all()->where('users_id' , '== ', Auth::id());
        $tenants = Locataire::all()->where('users_id' , '== ', Auth::id());
        $editinvoice = Paiement::find($id);

        return view('Payment.edit',compact('editinvoice', 'biens' , 'rentals','tenants'));
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
        $upadateInvoice = Paiement::find($id);
        $this->valid($request);
        $upadateInvoice->update([
            'bailleur' => Auth::id(),
            'location_id' => $request['location'],
            'locataire' => $request['locataire'],
            'bien' => $request['bien'],
            'debut' => $request['debut'],
            'fin' => $request['fin'],
            'fait_le' => $request['date'],
            'reste' => $request['reste'],
            'avance' => $request['avance'],
            'total' => $request['total'],
            'description' => $request['description'],
        ]);

        Flashy::message(' changement reussit');
        redirect()->route('payment.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteInvoice = Paiement::destroy($id);
        if ($deleteInvoice->destroy($id)){
            Flashy::message('supprimé avec succeé!');
            redirect()->route('payment.index');
        }
    }


    private function valid($request){
        return $this->validate($request, [
            'total' => ['required', 'int', 'max:255', 'min:5'],
            'bien' => ['string', 'max:255', 'min:5'],
            'locataire' => ['required', 'int' , 'max:255', 'min:5'],
//            '' => ['required', 'string', 'email', 'max:255', ],
        ]);
    }
}
