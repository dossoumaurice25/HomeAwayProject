<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class LocataireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locataires = User::all()->where('is_admin', 0);
        return view('admin.locataires.index', compact('locataires'));
    }


    // public function activateLocataire(  $id)
    //     {

    //         $locataire = User::findOrFail($id);
    //         $locataire->is_active = 1;
    //         $locataire->save();

    //         return redirect()->route('locataires.index')->with('success', 'Compte activé avec succès');
    //     }

    // public function deactivateLocataire( $id)
    //         {

    //             $locataire = User::findOrFail($id);
    //             $locataire->is_active = 0;
    //             $locataire->save();

    //             return redirect()->route('locataires.index')->with('success', 'Compte désactivé avec succès');
    //         }

    public function toggleUserStatus($id)
    {
        $locataire = User::findOrFail($id);
        $locataire->is_active = !$locataire->is_active;
        $locataire->save();

        return redirect()->back()->with('success', 'Le statut de l\'utilisateur a été mis à jour.');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
