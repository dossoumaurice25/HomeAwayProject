<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{
    public function index(){
        return view('dashboard.proprietaire.paiement');
    }
    public function indeex()
    {
        $proprietaire = auth('proprietaire')->user();
        $reservations = Reservation::where('proprietaire_id', $proprietaire->id)->get();
        $totalCommission = $reservations->sum(function($reservation) {
            return \App\Services\CommissionService::calculateCommission($reservation);
        });

        return view('dashboard.proprietaire.paiement', compact('reservations', 'totalCommission'));
    }

    public function processPayment()
    {
        $proprietaire = Auth::guard('proprietaire')->user();
        $reservations = Reservation::where('proprietaire_id', $proprietaire->id)->get();
        $totalCommission = $reservations->sum(function($reservation) {
            return \App\Services\CommissionService::calculateCommission($reservation);
        });

        // Intégrer le service de paiement ici (Stripe, PayPal, etc.)
        // Par exemple, avec Stripe:
        // \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // $paymentIntent = \Stripe\PaymentIntent::create([
        //     'amount' => $totalCommission * 100, // en centimes
        //     'currency' => 'eur',
        //     'metadata' => ['proprietaire_id' => $proprietaire->id],
        // ]);

        // Créer une entrée de paiement
        Paiement::create([
            'proprietaire_id' => $proprietaire->id,
            'montant' => $totalCommission,
            'statut' => 'en_attente',
        ]);

        return redirect()->route('proprietaires.paiements.index')->with('success', 'Paiement lancé avec succès.');
    }
}
