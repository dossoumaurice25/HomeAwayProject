@extends('layouts.proprietaire-dashboard-layout')

@section('content')

<div class="pagetitle">
    <h1>Gestion des Chambres</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Tableau de bord</a></li>
        <li class="breadcrumb-item active">Changer la statut</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <div class="col-12">
    <div class="card recent-sales overflow-auto">

      <div class="card-body">
        <h5 class="card-title" style="font-weight: bold"> Formulaire de modification de statut<span></span></h5>


      
        <div class="chambre">
            <h3>{{ $chambre->name }}</h3>
            <p>Statut actuel: <span class="badge bg-success"> {{ $chambre->statut }} </span> </p>
            <form action="{{ route('chambres.updateStatus', $chambre->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <select name="statut" class="form-control mb-3">
                    <option value="Disponible" {{ $chambre->statut == 'Disponible' ? 'selected' : '' }}>Disponible</option>
                    <option value="Chambre Réservée" {{ $chambre->statut == 'Chambre Réservée' ? 'selected' : '' }}>Chambre Réservée</option>
                    <option value="Chambre Occupée" {{ $chambre->statut == 'Chambre Occupée' ? 'selected' : '' }}>Chambre Occupée</option>
                </select>
                <button type="submit" style="background-color: blue; color:white; border:none" class="btn btn-outline-success fw-semibold">Mettre à jour</button>
            </form>
        </div>
        
    
        
      </div>

    </div>
  </div><!--


@endsection