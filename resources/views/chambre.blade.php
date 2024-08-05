@extends('layouts.website-layout')

@section('titre', 'Nos Chambres')

@section('content')
 <!-- ======= Breadcrumbs ======= -->
 <div class="breadcrumbs">


        <div class="col-12">
            <div  class="page-header d-flex align-items-center" style="background-image: url('{{ asset('assets/img/img_fonf/img_reser/slidkkkke-1.jpg') }}');">
                <div  class="container position-relative">
                  <div  class="row d-flex justify-content-center">
                    <div class="col-lg-6 text-center">
                      <h2 style="font-family:Arial, Helvetica, sans-serif; color:blue" class="fw-bold" >Réservation</h2>
                      <p style="color: black">Récherchez les chambres selon vos critères et effectuez votre réservation en toute simplicité sur HomeAway</p>
                    </div>
                  </div>
                </div>
              </div>
        </div>


        <div class="container mt-5">
            <form id="filterForm" action="{{ route('chambre.search') }}" method="GET">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" style="height:60px ; border:1px solid blue" class="form-control" id="ville" name="ville" placeholder="Entrez le lieu">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="number" class="form-control" style="height:60px ; border:1px solid blue" id="price" name="price" placeholder="Entrez le prix">
                        </div>
                    </div>
                </div>
                <button type="submit" style="background-color: blue" class="btn btn-primary mt-3 mb-3">Rechercher</button>
            </form>
        </div>


    <nav>
      <div class="container">
        <ol>
          <li><a href="{{ route('acceuil') }}">Acceuil</a></li>
          <li>Réservation</li>
        </ol>
      </div>
    </nav>
 </div><!-- End Breadcrumbs -->
{{--
<section class="py-5">
    <div  class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

            @foreach ($mes_chambres as $chambre)
            <div class="col mb-5">
                <div class="card h-100">
                  @if ($chambre->image_path)
                   <div style="background-image: url('{{ asset('storage/' .$chambre->image_path) }}') ;" class="img-bg"></div>
                  @else
                  <div style="background-image: url('https://ui-avatars.com/api/?backgroung=000&color=fff&name={{ $chambre->name }})') ;" class="img-bg"></div>
                  @endif
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">{{ $chambre->name }}</h5>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                          {{$chambre->price}}
                        </div>
                    </div>
                    @guest
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Voir plus</a></div>
                    </div>
                    @endguest
                    @auth
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Réserver</a></div>
                    </div>
                    @endauth

                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>


<style>
    .img-bg{
        background-size: cover;
        background-repeat: no-repeat;
        width:100%;
        height:200px;
        background-position: center;
    }
</style> --}}


<div class="container mt-5">

    @foreach ($mes_chambres as $chambre)
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
                <a href="{{ route('reservation.form' , $chambre->id) }}"><button  style="background-color: blue" class="btn  btn-primary mt-3">Réserver cette chambre</button></a>
                @endauth

            </div>
        </div>
    </div>
    @endforeach


    <div class="property-card row no-gutters">
        <div class="col-md-3">
            <img src="{{ asset('assets/img/chambres/jason-briscoe-UV81E0oXXWQ-unsplash.jpg') }}" class="property-image" alt="Property Image">
        </div>
        <div class="col-md-6 p-3">
            <h5 class="fw-bold" style="color: rgb(7, 7, 168)">Chambre I4</h5>
            <p  class="fw-bold"><span style="color: blue"> <i style="margin-right: 10px," class="bi bi-geo-alt"></i> </span> Cotonou, Vêdokor</p>
            <p>Doté d'un jardin, la Chambres I4 est situé à Torre de Benagalbón, à 800 mètres de la plage de Los Rubios, à 1,7 km de la plage de Rincon de la Victoria et à 18 km du...</p>
            <a href="#">Voir plus</a>
        </div>
        <div class="col-md-3 p-3 d-flex flex-column justify-content-between">
            <div class="text-right">
                <span class="badge badge-primary">Fabuleux</span>
                <div class="rating-box mt-2" style="background-color: blue">Disponible</div>
                <small>8 expériences vécues</small>
            </div>
            <div class="text-right">
                <p class="price">15 000 F CFA</p>
                <small>par nuit</small><br>
                @auth
                <button class="btn  btn-primary mt-3" style="background-color: blue">Réserver cette chambre</button>
                @endauth
                @guest
                <button class="btn  btn-primary mt-3" style="background-color: blue">Voir les détails</button>
                @endguest            </div>
        </div>
    </div>

    <div class="property-card row no-gutters">
        <div class="col-md-3">
            <img src="{{ asset('assets/img/chambres/naomi-hebert-MP0bgaS_d1c-unsplash.jpg') }}" class="property-image" alt="Property Image">
        </div>
        <div class="col-md-6 p-3">
            <h5 class="fw-bold" style="color: rgb(7, 7, 168)">Chambre I2</h5>
            <p  class="fw-bold"><span style="color: blue"> <i style="margin-right: 10px," class="bi bi-geo-alt"></i> </span>Parakou, Arafat</p>
            <p>Doté d'un jardin, le Cubo's Hostal William's Sunny 4 with Breakfast est situé à Parakou, Arafat, à 800 mètres de la plage de Los Rubios, à 1,7 km de la plage de Rincon de la Victoria et à 18 km du...</p>
            <a href="#">Voir plus</a>
        </div>
        <div class="col-md-3 p-3 d-flex flex-column justify-content-between">
            <div class="text-right">
                <span class="badge badge-primary">Fabuleux</span>
                <div  class="rating-box mt-2" style="background-color: blue">Disponible</div>
                <small>3 expériences vécues</small>
            </div>
            <div class="text-right">
                <p class="price">17 500 F CFA</p>
                <small>par nuit</small><br>
                @auth
                <button class="btn  btn-primary mt-3" style="background-color: blue">Réserver cette chambre</button>
                @endauth
                @guest
                <button class="btn  btn-primary mt-3" style="background-color: blue">Voir les détails</button>
                @endguest            </div>
        </div>
    </div>

    <div class="property-card row no-gutters">
        <div class="col-md-3">
            <img src="{{ asset('assets/img/chambres/patrick-perkins-3wylDrjxH-E-unsplash.jpg') }}" class="property-image" alt="Property Image">
        </div>
        <div class="col-md-6 p-3">
            <h5 class="fw-bold" style="color: rgb(7, 7, 168)">Chambre M9</h5>
            <p  class="fw-bold"><span style="color: blue"> <i style="margin-right: 10px," class="bi bi-geo-alt"></i> </span> Parakou, Arafat</p>
            <p>Doté d'un jardin, la Chambre M9 est situé à Parakou, Arafat, à 800 mètres de la plage de Los Rubios, à 1,7 km de la plage de Rincon de la Victoria et à 18 km du...</p>
            <a href="#">Voir plus</a>
        </div>
        <div class="col-md-3 p-3 d-flex flex-column justify-content-between">
            <div class="text-right">
                <span class="badge badge-primary">Fabuleux</span>
                <div class="rating-box mt-2" style="background-color: blue">Disponible</div>
                <small>5 expériences vécues</small>
            </div>
            <div class="text-right">
                <p class="price">11 000 F CFA</p>
                <small>par nuit</small><br>
                @auth
                <button class="btn  btn-primary mt-3" style="background-color: blue">Réserver cette chambre</button>
                @endauth
                @guest
                <button class="btn  btn-primary mt-3" style="background-color: blue">Voir les détails</button>
                @endguest            </div>
        </div>
    </div>

    <div class="property-card row no-gutters">
        <div class="col-md-3">
            <img src="{{ asset('assets/img/chambres/kam-idris-_HqHX3LBN18-unsplash.jpg') }}" class="property-image" alt="Property Image">
        </div>
        <div class="col-md-6 p-3">
            <h5 class="fw-bold" style="color: rgb(7, 7, 168)">Chambre A5</h5>
            <p  class="fw-bold"><span style="color: blue"> <i style="margin-right: 10px," class="bi bi-geo-alt"></i> </span> Porto-Novo, Ouando</p>
            <p>Doté d'un jardin, la Chambre A5 est situé à Torre de Benagalbón, à 800 mètres de la plage de Los Rubios, à 1,7 km de la plage de Rincon de la Victoria et à 18 km du...</p>
            <a href="#">Voir plus</a>
        </div>
        <div class="col-md-3 p-3 d-flex flex-column justify-content-between">
            <div class="text-right">
                <span class="badge badge-primary">Fabuleux</span>
                <div  class="rating-box mt-2" style="background-color: blue">Disponible</div>
                <small>4 expériences vécues</small>
            </div>
            <div class="text-right">
                <p class="price">19 000 F CFA</p>
                <small>par nuit</small><br>
                @auth
                <button class="btn  btn-primary mt-3" style="background-color: blue">Réserver cette chambre</button>
                @endauth
                @guest
                <button class="btn  btn-primary mt-3" style="background-color: blue">Voir les détails</button>
                @endguest            </div>
        </div>
    </div>

    <div class="property-card row no-gutters">
        <div class="col-md-3">
            <img src="{{ asset('assets/img/chambres/télécharger (1).jfif') }}" class="property-image" alt="Property Image">
        </div>
        <div class="col-md-6 p-3">
            <h5 class="fw-bold" style="color: rgb(7, 7, 168)">Chambre M15 </h5>
            <p  class="fw-bold"><span style="color: blue"> <i style="margin-right: 10px," class="bi bi-geo-alt"></i> </span>Torre de Benagalbón</p>
            <p>Situé à Porto-Novo, à 1,2 km de la plage de Torre de Benagalbón et de celle de Los Rubios, la Chambre dispose d'une plage privée et de la climatisation.</p>
            <a href="#">Voir plus</a>
        </div>
        <div class="col-md-3 p-3 d-flex flex-column justify-content-between">
            <div class="text-right">
                <span class="badge badge-primary">Fabuleux</span>
                <div  style="background-color: blue" class="rating-box mt-2">Disponible dans 04:35:16</div>
                <small>17 expériences vécues</small>
            </div>
            <div class="text-right">
                <p class="price">18 000 F CFA</p>
                <small>par nuit <br></small>
                @auth
                <button class="btn  btn-primary mt-3" style="background-color: blue">Réserver cette chambre</button>
                @endauth
                @guest
                <button class="btn  btn-primary mt-3" style="background-color: blue">Voir les détails</button>
                @endguest            </div>
        </div>
    </div>

    <div class="property-card row no-gutters">
        <div class="col-md-3">
            <img src="{{ asset('assets/img/chambres/th (1).jfif') }}" class="property-image" alt="Property Image">
        </div>
        <div class="col-md-6 p-3">
            <h5 class="fw-bold" style="color: rgb(7, 7, 168)">Chambre I7</h5>
            <p  class="fw-bold"><span style="color: blue"> <i style="margin-right: 10px," class="bi bi-geo-alt"></i> </span>Parakou, Banikani</p>
            <p>Situé à Parakou, à 1,2 km de la plage de Torre de Benagalbón et de celle de Los Rubios, le Suite Añoreta Malaga Parking 101 dispose d'une plage privée et de la climatisation.</p>
            <a href="#">Voir plus</a>
        </div>
        <div class="col-md-3 p-3 d-flex flex-column justify-content-between">
            <div class="text-right">
                <span class="badge badge-primary">Fabuleux</span>
                <div  style="background-color: blue" class="rating-box mt-2">Occupée</div>
                <small>21 expériences vécues</small>
            </div>
            <div class="text-right">
                <p class="price">22 000 F CFA</p>
                <small>par nuit <br></small>
                @auth
                <button class="btn  btn-primary mt-3" style="background-color: blue">Réserver cette chambre</button>
                @endauth
                @guest
                <button class="btn  btn-primary mt-3" style="background-color: blue">Voir les détails</button>
                @endguest            </div>
        </div>
    </div>

    <div class="property-card row no-gutters">
        <div class="col-md-3">
            <img src="{{ asset('assets/img/chambres/télécharger.jfif') }}" class="property-image" alt="Property Image">
        </div>
        <div class="col-md-6 p-3">
            <h5 class="fw-bold" style="color: rgb(7, 7, 168)">Chambre M10</h5>
            <p  class="fw-bold"><span style="color: blue"> <i style="margin-right: 10px," class="bi bi-geo-alt"></i> </span> Cotonou, Cocotomè</p>
            <p>Doté d'un jardin, la Chambre M10 est situé à Cotonou, Cocotomè, à 800 mètres de la plage de Los Rubios, à 1,7 km de la plage de Rincon de la Victoria et à 18 km du...</p>
            <a href="#">Voir plus</a>
        </div>
        <div class="col-md-3 p-3 d-flex flex-column justify-content-between">
            <div class="text-right">
                <span class="badge badge-primary">Fabuleux</span>
                <div  class="rating-box mt-2" style="background-color: blue">Disponible</div>
                <small>7 expériences vécues</small>
            </div>
            <div class="text-right">
                <p class="price">16 000 F CFA</p>
                <small>par nuit</small><br>
                @auth
                <button class="btn  btn-primary mt-3" style="background-color: blue">Réserver cette chambre</button>
                @endauth
                @guest
                <button class="btn  btn-primary mt-3" style="background-color: blue">Voir les détails</button>
                @endguest            </div>
        </div>
    </div>
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
