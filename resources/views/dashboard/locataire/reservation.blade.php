@extends('layouts.website-layout')

@section('content')

<div  class="row d-flex justify-content-center">
    <div class="col-lg-6 text-center">
      <h1 style="font-family:Arial, Helvetica, sans-serif; color:blue" class="fw-bold" >Mes Réservations</h1>
    </div>
  </div>

{{--
<div class="row">

    <h1>Mes Réservations</h1>
</div>
 --}}

<div class="container">

    <div class="card" style="border: none; background-color:white">

            @if($reservations->isEmpty())
                <p>Aucune réservation trouvée.</p>
            @else
                <table class="table  table-borderless">
                    <thead>
                        <tr>
                            <th>Chambre</th>
                            <th>Prix total</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Date de Réservation</th>
                            <th>Heure de Réservation</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservations as $reservation)
                            <tr>
                                <td>{{ $reservation->chambre->name }}</td>
                                <td>{{ $reservation->prix_total }}</td>
                                <td>{{ $reservation->date_debut }}</td>
                                <td>{{ $reservation->date_fin }}</td>
                                <td>{{ $reservation->created_at->format('d/m/Y') }}</td>
                                <td>{{ $reservation->created_at->format('H:i') }}</td>
                                <td>
                                    <form action="{{ route('reservation.annulerReservationLocataire', $reservation->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')">Annuler</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
    </div>


</div>
@endsection
