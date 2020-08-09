<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->where('id', '==', Auth::id());
        return view('User.profil', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edituser = User::find($id);
        return  view ('User.edituser', compact('edituser'));
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
        if($request->hasFile('file')) {


            $imageName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('profil'), $imageName);

            $updateuser = User::find($id);

            $updateuser->update([
                "name" => $request['username'],
                "prenom" => $request['userprenom'],
                "email" => $request['useremail'],
                "ville" => $request['userville'],
                "pays" => $request['userpays'],
                "numero" => $request['userphone'],
                "cni" => $request['usercni'],
                "profil" => $imageName,
            ]);
        }else{
            $updateuser->update([
                "name" => $request['username'],
                "prenom" => $request['userprenom'],
                "email" => $request['useremail'],
                "ville" => $request['userville'],
                "pays" => $request['userpays'],
                "numero" => $request['userphone'],
                "cni" => $request['usercni'],
            ]);
        }

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Flashy::message('supprimé avec succeé!');
        redirect()->route('login');
    }
}
