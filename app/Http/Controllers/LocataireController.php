<?php

namespace App\Http\Controllers;

use App\Events\TenantEvent;
use App\Models\Locataire;
use App\Ripositories\LocataireRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MercurySeries\Flashy\Flashy;

class LocataireController extends Controller
{
    /**
     * The user repository instance.
     */
    protected $Repo;

    /**
     * Create a new controller instance.
     *
     * @param  LocataireRepository  $Repo
     * @return void
     */
    public function __construct(LocataireRepository $Repo)
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
        $tenants = Locataire::all()->where('users_id' , '==' , Auth::id());
        return view('pages.locataire' , compact('tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.new_locataire');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->Repo->addTenant($request);
        Flashy::primary('nouveau locataire enregistrer avec succeé!');

        return redirect()->route('tenant.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $TenentSchow = Locataire::find($id);

        return view('pages.showTenant', compact('TenentSchow'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editTenent = Locataire::find($id);
        return view('pages.editTenant', compact('editTenent'));
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
        $this->Repo->updateTenant($request, $id);
        Flashy::message('locataire modifier avec succeé!');
        return redirect()->route('tenant.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Locataire::destroy($id);
        Flashy::message('locataire supprimé avec succeé!');
        return redirect()->route('tenant.index');
    }


}
