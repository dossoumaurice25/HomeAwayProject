@extends('admin.layout.home_admin_layout')

@section('content')


<div class="col-12">
    <div class="card recent-sales overflow-auto">
        <div class="card-body ">
            <h5 class="card-title" style="font-weight: bold">Paiements récus des propriétaires<span></span></h5>

            @if(Session::get('success'))
            <div class="alert alert-success py-3">{{Session::get('success')}}</div>
            @endif

           @if(Session::get('error'))
           <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
          @endif

          <table class="table table-hover">
            <thead>
                <tr>
                  <th scope="col">Propriétaire</th>
                  <th scope="col">Email</th>
                  <th scope="col">Montant</th>
                  <th scope="col">Date de paiement</th>
                  <th scope="col">Statut</th>
                </tr>
              </thead>
              <tbody>

                @foreach ($paiements as $paiement)
                    <tr>

                        <td>{{ $paiement->proprietaire->name }}</td>
                        <td>{{ $paiement->proprietaire->email }}</td>
                        <td>{{ $paiement->montant }}</td>
                        <td>{{ $paiement->created_at }}</td>
                        <td><span class="badge bg-success">{{ $paiement->statut }}</span></td>

                    </tr>
                @endforeach

              </tbody>
          </table>


        </div>
    </div>
</div>

@stop
