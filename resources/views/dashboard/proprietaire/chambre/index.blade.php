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

 <div class="col-12">
    <div class="card recent-sales overflow-auto">

      <div class="card-body">
        <h5 class="card-title"> Liste des chambres<span></span></h5>

                        @if(Session::get('success'))
                        <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                        @endif

                       @if(Session::get('error'))
                       <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                       @endif

        <table class="table table-borderless datatable">
          <thead>
            <tr>
              <th scope="col">Image</th>
              <th scope="col">Libellé</th>
              <th scope="col">Prix</th>
              {{-- <th scope="col">Adresse</th> --}}
              <th scope="col">Ville</th>
              <th scope="col">Disponibilité</th>
              <th scope="col">Actions</th>
              <th>Statut</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($chambres as $chambre)
                <tr>
                    <th scope="row">
                        @if ($chambre->image_path)
                           <div style="background-image: url('{{ asset('storage/' . $chambre->image_path  ) }}'); width:50px;height:50px; background-position:center; background-size:cover ">

                            </div>
                        @endif
                    </th>
                    <td><a href="#" class="text-primary">{{ $chambre->name }}</a></td>
                   <td>{{ $chambre->price }}</td>
                   {{-- <td>{{ $chambre->adresse }}</td> --}}
                    <td>{{ $chambre->ville }}</td>
                    <td><span style="color: black" class="badge bg-success-light">{{ $chambre->statut}}</span></td>
                    <td>
                        <a href="{{route('chambre.edit',$chambre->id)}}" class="btn btn-primary btn-sm">Modifier</a>
                        <a href="{{route('chambre.delete',$chambre->id)}}" class="btn btn-danger btn-sm">Supprimer</a>
                    </td>
                    <td>
                        <a href="{{ route('chambre.up',$chambre->id) }}" class="btn btn-outline-dark">Changer Statut</a>
                    </td>
                </tr>
            @endforeach

          </tbody>
        </table>

      </div>

    </div>
  </div><!-- End Réservations Récentes  2be4a2-->
  <div class="col-12" style="display: flex; justify-content:flex-end">
    <a href="{{ route('chambre.create') }}" style=" background-color: #175157 ; font-weight:bolder; color:white" class="btn"> Ajouter une chambre</a>

    <div class="card recent-sales overflow-auto">
    </div>
 </div>


@endsection
