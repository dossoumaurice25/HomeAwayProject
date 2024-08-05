@extends('layouts.proprietaire-dashboard-layout')

@section('content')

<div class="container">
    <h4 class="fw-bold" style="color: rgb(81, 81, 146)">Tableau de bord / Paiements</h4>

    <!-- Résumé des Paiements -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif


    <!-- Default Card -->
    <div class="card" style="border-top: 3px solid blue">
        <div class="card-body">
          <h5 class="card-title">Gestion des Commisions</h5>
            <table class="table table-striped ">
                <thead>
                <tr>
                    <th scope="col">Chambres</th>
                    <th scope="col">Prix de reservation</th>
                    <th scope="col">Commission à payer</th>
                    <th scope="col">Statut commission</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->chambre->name }}</td>
                    <td>{{ $reservation->prix_total }}</td>
                    <td>{{ $reservation->prix_total*0.15 }}</td>
                    <td><span style="color: rgb(252, 252, 252)" class="badge bg-black">{{ $reservation->commission_paid ? 'Payée' : 'Impayée' }}</span></td>
                </tr>
                @endforeach
                </tbody>
            </table>

        </div>
      </div><!-- End Default Card -->

    <div class="row">

        <div  class="col-xxl-6 col-md-6">
                <div style="border-top: 3px solid blue" class="card info-card sales-card">

                <div class="card-body">
                    <h5 class="card-title">Revenus générés</h5>

                    <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-layout-text-window-reverse"></i>
                    </div>
                    <div class="ps-3">
                        <h6>{{ $revenuGeneres }} F</h6>
                    </div>
                    </div>
                </div>

                </div>
        </div>

        {{-- CHambres --}}
        <div class="col-xxl-6 col-md-6">
            <div style="border-top: 3px solid blue" class="card info-card sales-card">

            <div class="card-body">
                <h5 class="card-title">Commissions Totales</h5>

                <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-layout-text-window-reverse"></i>
                </div>
                <div class="ps-3">
                    <h6>{{ $totalCommission }} F</h6>
                </div>
                </div>
            </div>

            </div>
        </div>
    </div>

    <div class="col-12 mb-4" style="display: flex; justify-content:flex-end">
        {{-- <a href="#" style="margin-right: 15px;background-color: blue ; font-weight:bolder; color:white" class="btn btn-primary">Télécharger la facture PDF</a> --}}
        <a href="#" style=" background-color: blue ; " class="btn">
        {{-- <form action="{{ route('commission.pay') }}" method="POST">
            @csrf
            <button type="submit" style=" background-color: blue; border:none;font-weight:bolder; color:white " >Payer la Commission</button>
        </form>  --}}

        <form action="{{ route('commission.pay') }}" method="POST">
            @csrf
            <input type="hidden" name="montant" value="{{ $totalCommission }}">
            <script src="https://cdn.fedapay.com/checkout.js?v=1.1.7"
                data-public-key="pk_sandbox_JhBImrbPHgVY0PJgM0tHlGyn"
                data-button-text="Payer la commission"
                data-button-class="btn btn-sm app-btn-primary py-1 fw-bolder text-white"
                data-transaction-amount="{{ $totalCommission }}"
                data-transaction-description="Paiement de commission" data-currency-iso="XOF">
            </script>
        </form>


        </a>
    </div>



    {{-- <div class="summary">
        <p>Revenus générés : {{ $revenuGeneres }} F</p>
        <p>Commissions Totales : {{ $totalCommission }} F</p>
    </div> --}}

    {{-- {{ $totalAmountReceived }}  {{ $totalCancellationFees }} --}}
    <!-- Historique des Paiements -->
    <div class="card" style="border-top: 3px solid blue">
        <div class="card-body">
          <h5 class="card-title">Historiques des Paiements</h5>
          <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Montant</th>
                    <th>Date de paiement</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($paiements as $paiement)
                    <tr>
                        <td>{{ $paiement->id }}</td>
                        <td>{{ $paiement->montant }}</td>
                        {{-- {{ $payment->reservation->chambre->name }} --}}
                        <td>{{ $paiement->created_at }}</td>
                        <td><span class="badge bg-success">{{ $paiement->statut }}</span></td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div><!-- End Default Card -->

    <!-- Rapports et Téléchargements -->
    {{-- <div class="reports">
        <a href="#" class="btn btn-primary">Télécharger la facture PDF</a> --}}
        {{-- {{ route('reports.download', ['type' => 'csv']) }} --}}
        {{-- <a href="#" class="btn btn-primary">Télécharger Rapport PDF</a> --}}
        {{-- {{ route('reports.download', ['type' => 'pdf']) }} --}}
    {{-- </div> --}}


</div>
@endsection
