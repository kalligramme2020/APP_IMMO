<?php


namespace App\Ripositories;

use App\Events\TenantEvent;
use App\Models\Locataire;
use Illuminate\Support\Facades\Auth;
class LocataireRepository
{
    //add tenant

    public function addTenant( $data){

           $data->validate([
               'email' => ['required', 'string', 'email', 'max:255'],
               'nom' => ['required', 'string', 'max:255'],
               'cni' => ['required' , 'max:255', 'min:6'],

           ]);

        if ( $data->hasFile('file')) {
            $imageName = time() . '.' . $data->file->extension();
            $data->file->move(public_path('profil'), $imageName);

            $store = Locataire::create([
                'users_id' => Auth::id(),
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'numero' => $data['phone'],
                'ville' => $data['ville'],
                'profession' => $data['proff'],
                'cni' => $data['cni'],
                'nationalite' => $data['pays'],
                'photo' => $imageName,
            ]);
        }else{
            $store = Locataire::create([
                'users_id' => Auth::id(),
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'numero' => $data['phone'],
                'ville' => $data['ville'],
                'profession' => $data['proff'],
                'cni' => $data['cni'],
                'nationalite' => $data['pays'],
            ]);

        }

        $events = new TenantEvent($store);
        event($events);

    }

    public function updateTenant( $data, $id){

        $data->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:locataire'],
            'name' => ['required', 'string', 'max:255'],
            'cni' => ['required', 'int' , 'max:255', 'min:6'],

        ]);

        $tenantUp = Locataire::find($id);

        if ($data->hasFile('file')) {
            $imageName = time() . '.' . $data->file->extension();
            $data->file->move(public_path('profil'), $imageName);

            $tenantUp->update([
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'numero' => $data['phone'],
                'ville' => $data['ville'],
                'profession' => $data['proff'],
                'cni' => $data['cni'],
                'nationalite' => $data['pays'],
                'photo' => $imageName,
            ]);

        }else{

            $tenantUp->update([
                'nom' => $data['nom'],
                'prenom' => $data['prenom'],
                'email' => $data['email'],
                'numero' => $data['phone'],
                'ville' => $data['ville'],
                'profession' => $data['proff'],
                'cni' => $data['cni'],
                'nationalite' => $data['pays'],
            ]);
        }

    }



}
