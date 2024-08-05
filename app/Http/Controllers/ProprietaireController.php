<?php

namespace App\Http\Controllers;

use App\Models\Proprietaire;
use Illuminate\Http\Request;

class ProprietaireController extends Controller
{


    public function index()
    {
        $proprietaires = Proprietaire::all();
        return view('admin.proprietaires.index', compact('proprietaires'));
    }


    public function toggleStatus($id)
    {
        $proprietaire = Proprietaire::findOrFail($id);
        $proprietaire->is_activee = !$proprietaire->is_activee;
        $proprietaire->save();

        return redirect()->route('proprietaires.index')->with('success', 'Statut du propriétaire mis à jour');
    }


    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
