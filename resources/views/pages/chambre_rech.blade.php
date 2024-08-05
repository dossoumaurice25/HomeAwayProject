@extends('layouts.website-layout')

@section('content')


<div class="breadcrumbs">


    <div class="col-12">
        <div  class="page-header d-flex align-items-center" style="background-image: url('');">
            <div  class="container position-relative">
              <div  class="row d-flex justify-content-center">
                <div class="col-lg-6 text-center">
                  <h2>Réservation</h2>
                  <p>Récherchez les chambres selon vos critères et effectuez votre réservation en toute simplicité sur HomeAway</p>
                </div>
              </div>
            </div>
          </div>
    </div>

<nav>
  <div class="container">
    <ol>
      <li><a href="{{ route('acceuil') }}">Acceuil</a></li>
      <li>Réservation</li>
      <li></li>
    </ol>
  </div>
</nav>
</div>


    


<div class="container mb-4">

    <div>
        <h3 class="mb-4 mt-4 fw-bold">Résultats de la recherche</h3>
    </div>

        @foreach ($chambres as $chambre)
        <div class="property-card row no-gutters">
            <div class="col-md-3">
                @if ($chambre->image_path)
                <img src="{{ asset('storage/' .$chambre->image_path) }}" class="property-image" alt="Property Image">
               @else
               <img src="" style="background-image: url('https://ui-avatars.com/api/?backgroung=000&color=fff&name={{ $chambre->name }})') ;"  class="property-image" alt="Property Image">
               @endif
            </div>
            <div class="col-md-6 p-3">
                <h4 class="fw-bold" style="color: rgb(7, 7, 168)">{{ $chambre->name }}</h4>
                <p class="fw-bold"> <span style="color: blue"> <i style="margin-right: 10px," class="bi bi-geo-alt"></i> </span> {{$chambre->ville}}, {{ $chambre->adresse }}</p>
                <p>Doté d'un jardin, le Cubo's Hostal William's Sunny 4 with Breakfast est situé à Torre de Benagalbón, à 800 mètres de la plage de Los Rubios, à 1,7 km de la plage de Rincon de la Victoria et à 18 km du...</p>
                <a href="#">Voir plus</a>
            </div>
            <div class="col-md-3 p-3 d-flex flex-column justify-content-between">
                <div class="text-right">
                    <span class="badge badge-primary">Fabuleux</span>
                    <div class="rating-box mt-2" style="background-color: blue">{{$chambre->statut}}</div>
                    <small>3 expériences vécues</small>
                </div>
                <div class="text-right">
                    <p class="price"> {{$chambre->price}} F CFA</p>
                    <small>par nuit</small><br>
    
                    @guest
                    <button class="btn  btn-primary mt-3" style="background-color: blue">Voir les détails</button>
                    @endguest
                    @auth
                    <a href="{{ route('reservation.form' , $chambre->id) }}"><button class="btn  btn-primary mt-3">Réserver cette chambre</button></a>
                    @endauth
    
                </div>
            </div>
        </div>
        @endforeach





    {{-- <div class="row">
        <div class="col-md-12">
            <h3 class="mb-4">Résultats de la recherche</h3>
            <div class="row">
                @foreach ($chambres as $chambre)
                    <div class="col-md-4">
                        <div class="card">
                            <img src="{{ $chambre->image_path }}" class="card-img-top" alt="{{ $chambre->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $chambre->name }}</h5>
                                <p class="card-text">{{ $chambre->description }}</p>
                                <p class="card-text">Prix : {{ $chambre->price }} Franc CFA</p>
                                <a href="{{ route('reservation.form' , $chambre->id) }}" class="btn btn-primary">Réserver</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
</div> 



<style>
    .property-card {
        border: 1px solid #e0e0e0;
        border-radius: 10px;
        margin-bottom: 20px;
        overflow: hidden;
    }
    .property-image {
        width:100%;
        height: 250px;
        object-fit: cover;
        border-radius: 10px 0 0 10px;
    }
    .rating-box {
        background-color: #0071c2;
        color: white;
        font-weight: bold;
        padding: 10px;
        border-radius: 5px;
        text-align: center;
    }
    .price {
        color: #008009;
        font-weight: bold;
        font-size: 1.2em;
    }
    .btn-check {
        background-color: #0071c2;
        color: white;
    }
    .btn-check:hover {
        background-color: #005bb5;
    }






</style>


@endsection
