<?php

namespace App\Http\Controllers;

use App\Models\Chambres;
use App\Models\Paiement;
use App\Models\Proprietaire;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $nombreProprietaire = Proprietaire::count();

        $nombreLocataire = User::where('is_admin', 0)->count();

        $nombreChambre = Chambres::count();

        $nombreReservation = Reservation::count();

        $revenuGeneres = Paiement::sum('montant');


        return view('admin.dashbord.home' , compact(
            'nombreProprietaire',
            'nombreLocataire',
            'nombreChambre',
            'nombreReservation',
            'revenuGeneres'
        ));
    }

    public function paiement(){

        $paiements = Paiement::with('proprietaire')->get();



        return view('admin.paiements.paiement', compact('paiements',));
    }
}
