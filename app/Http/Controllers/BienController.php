<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Pays;
use App\Models\Type_bien;
use App\Ripositories\BienRipository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class BienController extends Controller
{

    protected $Repo;

    public function  __construct(BienRipository $Repo)
    {
        $this->middleware('auth');
        $this->Repo = $Repo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biens = Bien::with('pieces','parentid')->get()->where('users_id', '==', Auth::id());
//        dd($biens);
        return view('Bien.bien', compact('biens'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pays = Pays::all();
        $tbiens = Type_bien::all();
        $parents = Bien::all()->where('users_id',  '==', Auth::id());
        return view('Bien.new_bien', compact('pays', 'tbiens', 'parents'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->valid($request);
        $this->Repo->addbien($request);
        Flashy::message('nouveau bien enregistrer avec succeé!');
        return redirect()->route('house.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showbien = Bien::with('pieces','tbien','parentid', 'enfantsid')->find($id);
//        dd($showbien);
        return view(' Bien.show_bien', compact('showbien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pays = Pays::all();
        $tbiens = Type_bien::all();
        $editbien = Bien::with('pieces','tbien','parentid','countrie')->find($id);
//dd($editbien);
        return view('Bien.bien_edit', compact('editbien','pays', 'tbiens'));
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
        $this->valid($request);
        $this->Repo->updateBien($request, $id);
        Flashy::message('modifier avec succeé!');
        return redirect()->route('house.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//       $delete = Bien::find($id);

        $delete = Bien::findOrFail($id);

        $delete->pieces()->detach();

        $delete->delete();

        Flashy::message( 'bien supprimé avec succeé!');
        return redirect()->route('house.index');
    }

    private function valid($request){
        return $this->validate($request, [
            'pays' => ['required', 'string', 'max:255', 'min:5'],
            'addresse' => ['required','string', 'max:255', 'min:5'],
            'name' => ['required', 'string' , 'max:255', 'min:5'],
            'typebien' => ['required', 'string', 'max:255', ],
        ]);
    }
}
