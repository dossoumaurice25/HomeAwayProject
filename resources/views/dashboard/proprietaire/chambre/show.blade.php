
@extends('layouts.proprietaire-dashboard-layout')

@section('content')
<div class="container">
    <h1>{{ $chambre->nom }}</h1>
    <p>{{ $chambre->description }}</p>
    <p>Prix: {{ $chambre->prix }}</p>

    <h2>Réservations</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Prix total</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach($chambre->reservations as $reservation)
            <tr>
                <td>{{ $reservation->user->name }}</td>
                <td>{{ $reservation->date_debut }}</td>
                <td>{{ $reservation->date_fin }}</td>
                <td>{{ $reservation->prix_total }}</td>
            </tr>
            @endforeach --}}
        </tbody>
    </table>
</div>
@endsection
