<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Chambres;
use App\Models\Reservation;
use App\Services\CommissionService;
use Illuminate\Http\Request;

class PayerController extends Controller
{
    public function index()
    {
        $proprietaire = auth('proprietaire')->user();
        $chambres = Chambres::where('proprietaire_id', $proprietaire->id)->get() ;
        $reservations = Reservation::WhereIn('chambre_id', $chambres->pluck('id'))
            ->where('commission_paid', false)
            ->get() ;
        $totalCommission = $reservations->sum(function($reservation) {
            return \App\Services\CommissionService::calculateCommission($reservation);
        });
        $revenuGeneres = Reservation::whereHas("chambre", function($query) use ($proprietaire){
            $query->where('proprietaire_id', $proprietaire->id);
        })->sum('prix_total');



        $paiements = $proprietaire->paiements;

        return view('dashboard.proprietaire.paiement', compact('reservations','revenuGeneres', 'totalCommission', 'paiements'));
    }

    public function payCommission(Request $request)
    {
        $proprietaire = auth('proprietaire')->user();

            // Récupérer toutes les réservations non payées pour le propriétaire connecté
            $chambres = Chambres::where('proprietaire_id', $proprietaire->id)->get() ;
            $reservations = Reservation::WhereIn('chambre_id', $chambres->pluck('id'))
                ->where('commission_paid', false)
                ->get() ;

            $totalCommission = $reservations->sum(function($reservation) {
                return CommissionService::calculateCommission($reservation); // Méthode pour calculer la commission
            });

            // Créer un nouveau paiement
            $paiement = new Paiement();
            $paiement->proprietaire_id = $proprietaire->id;
            $paiement->montant = $request->montant;
            $paiement->statut = 'Payée';
            $paiement->save();

            // Marquer les commissions comme payées
            foreach ($reservations as $reservation) {
            $reservation->commission_paid = true;
            $reservation->save();
            }

            return redirect()->route('paiementCommision')->with('success', 'Commission payée avec succès.');
    }


}
