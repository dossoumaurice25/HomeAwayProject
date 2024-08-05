<?php

namespace App\Http\Controllers;

use App\Models\Chambres;
use App\Models\Reservation;
use App\Notifications\ReservationConfirmed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{


    public function indexLocataire()
    {
        // Récupère l'utilisateur connecté
        $user = Auth::user();

        // Récupère les réservations de l'utilisateur
        $reservations = $user->reservations;

        // Retourne la vue avec les réservations
        return view('dashboard.locataire.reservation', compact('reservations'));
    }



    public function index()
    {
        $proprietaire = auth('proprietaire')->user();

        // $chambres = Chambres::latest()->where('proprietaire_id', auth('proprietaire')->user()->id)->get();;
        // $reservations = Reservation::with(['user', 'chambre'])->get();
        $chambres = Chambres::where('proprietaire_id', $proprietaire->id)->get() ;
        $reservations = Reservation::WhereIn('chambre_id', $chambres->pluck('id'))->get() ;
        return view('pages.reservations.index', compact('reservations'));
    }

    public function create($id){
        $chambre = Chambres::findOrFail($id);
        return view('pages.reservations.create', compact('chambre'));
    }

    public function store(Request $request){

        $chambreId = $request->input('chambre_id');
        $user_id = $request->user()->id;

        $ReservationExistante =  Reservation::where('chambre_id',$chambreId)
            ->where(function($query) use ($request) {
                $query->whereBetween('date_debut', [$request->date_debut, $request->date_fin])
                      ->orWhereBetween('date_fin',[$request->date_debut, $request->date_fin]);
            })->first();

        if($ReservationExistante){
            return redirect()->route('reservation.form' , $request->chambre_id)->with('error', 'La chambre est déjà réservée pour les dates sélectionnées');
        } 

        $userReservation = Reservation::where('chambre_id',$chambreId)
            ->where('user_id',$user_id)
            ->where(function($query) use ($request) {
                $query->whereBetween('date_debut', [$request->date_debut, $request->date_fin])
                      ->orWhereBetween('date_fin',[$request->date_debut, $request->date_fin]);
            })->first();
        
            if($userReservation){
                return redirect()->route('reservation.form' , $request->chambre_id)->with('error', 'Vous avez déjà réservée cette chambre pour les dates sélectionnées');
            } 

        // Validation des données
        $request->validate([
            'name' =>'required|string|max:255',
            'email' =>'required|email|max:255',
            'date_debut' =>'required|date',
            'date_fin' =>'required|date',
            'number'=>'required|numeric',
            'chambre_id' =>'required|exists:chambres,id',
            'prix_total' => 'required|numeric',
        ]);

         // Création de la réservation
        $reservation = Reservation::create([
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'chambre_id' => $request->chambre_id,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'prix_total' => $request->prix_total,
        ]);

        // Mise à jour du statut de la chambre
        $chambre = Chambres::find($request->chambre_id);
        $chambre->statut = 'Chambre Réservée';
        $chambre->save();

        // Envoyer la notification par email
        Auth::user()->notify(new ReservationConfirmed($reservation));


        return redirect()->route('reservation.form' , $request->chambre_id)->with('success','Votre réservation a été effectuée. Un email de confirmation vous a été envoyé.');
    }



    public function annuler(Request $request, $id)
    {
        $reservation = Reservation::findOrFail($id);
        $chambre = $reservation->chambre;

        if (!$reservation) {
            return redirect()->back()->with('error', 'Réservation non trouvée.');
        }

        $reservation->delete();

        // Mise à jour du statut de la chambre
        $chambre->statut = 'Disponible';
        $chambre->save();

        return redirect()->back()->with('success', 'Réservation annulée avec succès.');
    }

    public function annulerReservationLocataire($id){

        $reservation = Reservation::findOrFail($id);

        if (!$reservation) {
            return redirect()->back()->with('error', 'Réservation non trouvée.');
        }

        $reservation->delete();
        return redirect()->back()->with('success', 'Réservation annulée avec succès.');
    }

    public function show($id)
    {
        $reservation = Reservation::with(['user', 'chambre'])->findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        $chambres = Chambres::all();
        return view('reservations.edit', compact('reservation', 'chambres'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'email' =>'required|email|max:255',
            'date_debut' =>'required|date',
            'date_fin' =>'required|date',
            'number'=>'required|numeric',
            'chambre_id' =>'required|exists:chambres,id',
            'prix_total' => 'required|numeric',
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update($request->all());

        return redirect()->route('reservations.index')->with('success', 'Réservation mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservations.index')->with('success', 'Réservation supprimée avec succès.');
    }

}
