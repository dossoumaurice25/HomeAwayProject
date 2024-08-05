@extends('layouts.proprietaire-dashboard-layout')

@section('content')

    <div class="pagetitle">
        <h1>Gestion des Chambres</h1>
        <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Consulter la liste</li>
        </ol>
        </nav>
    </div><!-- End Page Title -->
 <!--  Réservations Récentes -->

    {{-- <div class="col-12">
        <div class="card recent-sales overflow-auto">

            <div class="card-body">
                <h5 class="card-title"> Liste des Réservations<span></span></h5>

                                @if(Session::get('success'))
                                <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                                @endif

                            @if(Session::get('error'))
                            <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                            @endif

                <table class="table table-borderless datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Locataire</th>
                            <th>Chambre</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Prix total</th>
                            <th>Numéro</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($reservations as $reservation)
                        <tr>
                            <td>{{ $reservation->id }}</td>
                            <td>{{ $reservation->user->name }}</td>
                            <td>{{ $reservation->chambre->name }}</td>
                            <td>{{ $reservation->date_debut }}</td>
                            <td>{{ $reservation->date_fin }}</td>
                            <td>{{ $reservation->prix_total }}</td>
                            <td>{{ $reservation->number }}</td>
                            <td>{{ $reservation->email }}</td>
                            <td>
                                <form action="{{ route('reservation.annuler', $reservation->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')">Annuler</button>
                                </form>
                            </td>




                        </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>

    </div><!-- End Réservations Récentes  2be4a2--> --}}


    <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Liste des Réservations</h5>
                    @if(Session::get('success'))
                    <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                    @endif

                    @if(Session::get('error'))
                    <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                    @endif
            <!-- Table with stripped rows -->
            <table class="table table-striped">
              <thead>
                <tr>
                    <th>ID</th>
                    <th scope="col">Locataire</th>
                    <th scope="col">Chambre</th>
                    <th scope="col">Date de début</th>
                    <th scope="col">Date de fin</th>
                    <th scope="col">Prix total</th>
                    {{-- <th scope="col">Numéro</th> --}}
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($reservations as $reservation)
                <tr>
                    <td  scope="row">{{ $reservation->id }}</tdb>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->chambre->name }}</td>
                    <td>{{ $reservation->date_debut }}</td>
                    <td>{{ $reservation->date_fin }}</td>
                    <td>{{ $reservation->prix_total }}</td>
                    {{-- <td>{{ $reservation->number }}</td> --}}
                    <td>{{ $reservation->email }}</td>
                    <td>
                        @php
                            $now = \Carbon\Carbon::now();
                            $reservationDate = \Carbon\Carbon::parse($reservation->created_at);
                            $hoursPassed = $now->diffInHours($reservationDate);
                            $secondsLeft = max(0, 259200 - $now->diffInSeconds($reservationDate))
                        @endphp
                        <div style="color: black" class="badge bg-success-light" id="countdown-{{ $reservation->id }}"></div>
                        @if ($hoursPassed >= 72)
                            <form action="{{ route('reservation.annuler', $reservation->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')" class="btn btn-danger">Annuler</button>
                            </form>
                        @else
                            <script>
                                function startCountdown(endTime, elementId, formId){
                                    const countdownElement = document.getElementById(elementId);
                                    const cancelButton = document.getElementById(formId);

                                    function updateCountdown() {
                                        const now = new Date().getTime();
                                        const distance = endTime - now ;

                                        if(distance < 0) {
                                            clearInterval(interval);
                                            countdownElement.style.display = 'none';
                                            cancelButton.style.display = 'block';
                                        } else {
                                            const hours = Math.floor((distance % (1000*60*60*24)) / (1000*60*60));
                                            const minutes = Math.floor((distance % (1000*60*60))/(1000*60));
                                            const seconds = Math.floor((distance % (1000*60)) / 1000 );

                                            countdownElement.innerHTML = hours + "h " + minutes + "m " + seconds + "s " ;
                                        }
                                    }

                                    const interval = setInterval(updateCountdown, 1000);
                                    updateCountdown();
                                }

                                document.addEventListener('DOMContentLoaded', function(){
                                    const reservationTime = new Date('{{  $reservation->created_at }}').getTime();
                                    const endTime = reservationTime + 72 * 60 * 60 * 1000 ;
                                    startCountdown(endTime, 'countdown-{{ $reservation->id }}', 'cancel-form-{{ $reservation->id }}');
                                })
                            </script>
                        {{-- <span style="color: black" class="badge bg-success-light">Dans 72 hrs</span> --}}
                        @endif

                    </td>




                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

 @endsection


