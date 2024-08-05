<?php

namespace App\Http\Controllers\Proprietaire;

use App\Http\Controllers\Controller;
use App\Models\Chambres;
use App\Models\Proprietaire;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProprietaireDashboardController extends Controller
{

    public function index()
    {
        $proprietaire = auth('proprietaire')->user();

        // Nombre de chambres ajoutées par le propriétaire
        $nombreDeChambres = Chambres::where('proprietaire_id', $proprietaire->id)->count();

        // Nombre de chambres réservées
        $nombreDeChambresReservees = Chambres::where('proprietaire_id', $proprietaire->id)
            ->where('statut', 'Chambre Réservée')->count();

        //Nombre de reservation
        $nombreReservation =  Reservation::count() ;

        // Revenu générés par le propriétaire
        $revenuGeneres = Reservation::whereHas("chambre", function($query) use ($proprietaire){
            $query->where('proprietaire_id', $proprietaire->id);
        })->sum('prix_total');

        // // Nombre de chambres disponibles
        // $nombreDeChambresDisponibles = Chambres::where('proprietaire_id', $proprietaire->id)
        //     ->where('status', 'disponible')->count();

        // Nombre de chambres disponibles dans le futur
        $nombreDeChambresDisponibleDans = Chambres::where('proprietaire_id', $proprietaire->id)
            ->where('statut', 'Disponible_dans')
            ->where('available_at', '>', Carbon::now())->count();

        // Nombre de locataires ayant réservé les chambres du propriétaire
        $nombreDeLocataires = Reservation::whereHas('chambre', function($query) use ($proprietaire) {
            $query->where('proprietaire_id', $proprietaire->id);
        })->distinct('user_id')->count('user_id');

        return view('dashboard.proprietaire.home', compact(
            'nombreDeChambres',
            'nombreDeChambresReservees',
            // 'nombreDeChambresDisponibles',
            'nombreDeChambresDisponibleDans',
            'nombreDeLocataires',
            'revenuGeneres',
            'nombreReservation'
        ));
    }

    public function profil(){
        $proprietaire = auth('proprietaire')->user();
        return view('dashboard.proprietaire.profil_proprio',compact('proprietaire'));
    }

    public function updateProfile(Request $request)
    {
        $proprietaire = auth('proprietaire')->user();

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
        // $proprietaire = Proprietaire::find($request->proprietaire_id);
        $proprietaire->update($input);

        return redirect()->route('ProprietaireProfil')->with('success', 'Profil mis à jour avec succès.');
    }

    public function faq(){
        return view('dashboard.proprietaire.faq');
    }

    public function contact(){
        return view('dashboard.proprietaire.contact');
    }

    public function logout()
    {
        Auth::guard('proprietaire')->logout();
        return redirect()->route('ProprietaireLogout');
    }
}
