<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilLocataire extends Controller
{
    public function profilLocataire(){
        $user = Auth::user();
        return view('dashboard.locataire.profil',compact('user'));
    }

    public function updateProfilLocataire(Request $request) {
        $user =Auth::user();

        $request->validate([
            'name' => 'string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'profession' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:15',
            'bio' => 'nullable|string|max:1000',
            'email'=>'string',
            'carte_id' => 'nullable|mimes:pdf,jpeg,png,jpg|max:2048',
        ]);



        $input = $request->all();

        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $photoName);
            $input['photo'] = $photoName;
        }

        if ($request->hasFile('carte_id')) {
            $carte_idName = time() . '.' . $request->carte_id->extension();
            $request->carte_id->move(public_path('documents'), $carte_idName);
            $input['carte_id'] = $carte_idName;
        }

        $user->update($input);

         return redirect()->route('ProfilLocataire')->with('success', 'Profil mis à jour avec succès.');
    }
}
