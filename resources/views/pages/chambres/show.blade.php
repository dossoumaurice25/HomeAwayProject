{{-- @extends('layouts.website-layout')

@section('titre', 'Détails')

@section('style')
<style>
        .property-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .property-header h1 {
            font-size: 1.75rem;
            font-weight: bold;
            color: #0071c2;
        }

        .property-header i {
            color: #fff;
        }

        .property-header .btn {
            background-color: #2c49bb;
            color: white;
            margin: 0 5px;
        }

        .property-header .btn:hover {
            background-color: #005bb5;
        }

        .badge-custom {
            background-color: #0071c2;
            color: white;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .rating-box {
            background-color: #0071c2;
            color: white;
            font-weight: bold;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            margin-top: 10px;
        }

        .property-images img {
            width: 100%;
            height: auto;
            padding: 5px;
        }

        .more-photos {
            font-weight: bold;
        }
</style>
@endsection

@section('content')

<section style="font-family: 'Roboto', sans-serif;" id="affiche" class="affiche">

    <div class="container mb-5">

                @if(Session::get('success'))
                    <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                @endif

                @if(Session::get('error'))
                    <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                @endif

        <div class="row">
            <div class="col-12 col-md-7 mb-4 mb-md-0 d-flex flex-column align-items-start">
                <img src="{{ Storage::url($chambre->image_path) }}" alt="{{ $chambre->name }}" class="img-fluid mb-3" style="max-width: 100%;border-radius:25px;  height:auto;">

                <h2 >{{ $chambre->name }}</h2>

                <div class="mb-3 w-100">
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center" style="font-size: 25px; line-height: 0; width: 44px; height: 44px; color: #2eca6a; background: #e0f8e9;">
                            <i class="bi bi-cash-coin"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="font-size: 20px; color: #212122; margin: 0; padding: 0;"> <u style=" font-weight: 700;">Prix :</u> {{ $chambre->price }} F CFA</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center" style="font-size: 25px; line-height: 0; width: 44px; height: 44px; color: #2eca6a; background: #e0f8e9;">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="ps-3">
                            <h6 style="font-size: 20px; color: #212122; margin: 0; padding: 0;"> <u style=" font-weight: 700;">Lieu :</u> {{ $chambre->ville }} , {{ $chambre->adresse }}</h6>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="ps-3">
                            <h6 style="font-size: 20px; color: #212122;  margin: 0; padding: 0;"> <u style="font-weight: 700;">Description de chambre :</u> {{ $chambre->description }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-5 align-items-center">
                <p class="text-center text-md-start">Bienvenue dans notre magnifique chambre standard, un havre de paix conçu pour offrir confort et tranquillité.
                    Cette chambre spacieuse et lumineuse est parfaitement adaptée aux voyageurs seuls, couples ou petits groupes
                    en quête d'un séjour agréable.</p>
                    <a href="{{ route('reservation.form' , $chambre->id) }}" class="btn btn-primary">Réserver cette chambre</a>
            </div>
        </div>
    </div>

</section>


@endsection --}}


@extends('layouts.website-layout')

@section('titre', 'Détails')

@section('style')
<style>
    .container {
        margin-top: 50px;
       font-family:Verdana, Geneva, Tahoma, sans-serif
    }
    .row {
        margin-bottom: 20px;
    }
    .col-md-4 {
        padding: 0;
    }
    .image-container {
        position: relative;
    }
    .image-container img {
        width: 100%;
        height: auto;
    }
    .image-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .image-container:hover .image-overlay {
        opacity: 1;
    }
    .image-overlay i {
        font-size: 24px;
    }
    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }
    .card-body {
        padding: 20px;
    }
    .card-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .card-text {
        margin-bottom: 20px;
    }
    .btn {
        background-color: blue;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.9s ease;
    }
    .btn:hover {
        background-color:rgb(255, 255, 255);
        color: blue;
        /* font-weight: bold; */
        border: 2px solid blue;
    }
    .rating {
        display: flex;
        align-items: center;
    }
    .rating i {
        color: #ffc107;
        margin-right: 5px;
    }
    .rating span {
        font-size: 14px;
    }
    .features {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .feature {
        display: flex;
        align-items: center;
    }
    .feature i {
        font-size: 20px;
        margin-right: 10px;
    }
    .feature span {
        font-size: 14px;
    }
    .price {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .price-details {
        margin-bottom: 20px;
    }
    .price-details label {
        display: block;
        margin-bottom: 5px;
    }
    .price-details input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    .price-details button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .price-details button:hover {
        background-color: #45a049;
    }







</style>
@endsection

@section('content')





<div class="container">
    <h3 class="text-center mb-4">Résidence de {{ $chambre->proprietaire->name }} x <span>{{ $chambre->name }}</span></h3>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-8">
                    <img src="{{ Storage::url($chambre->image_path) }}" alt="{{ $chambre->name }}" style="border-top-left-radius:10px;border-bottom-left-radius:10px" class="img-fluid h-100">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/img_fonf/bedroom-6778193_1280.jpg') }}" alt="" style="border-top-right-radius:10px;" class="img-fluid mb-2 ">
                    <img src="{{ asset('assets/img/chambres/douche.jpg') }}" style="border-bottom-right-radius:10px" class="img-fluid ">
                </div>
            </div>
            <h2 class="text-center mt-4">Chambre - {{ $chambre->adresse }}, {{ $chambre->ville }}</h2>
            <p class="text-center">1 lit · Salle de bain privée</p>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="rating mb-3">
                                <i class="bi bi-heart-fill"></i>
                                <span>Coup de cœur voyageurs</span>
                            </div>
                            <div class="rating mb-3">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <span>4,94</span>
                            </div>
                            <div class="card-text">
                                <p>Un des logements préférés des voyageurs</p>
                            </div>
                            <div class="rating mb-3">
                                <i class="bi bi-emoji-smile"></i>
                                <span>40 Commentaires</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Chambre dans maison de ville - Chez {{ $chambre->proprietaire->name }} </h5>
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <i class="bx bxs-bed" style="color: #ffc107;"></i>
                                    <span>1 lit queen size</span>
                                </div>
                                <div class="col-md-4">
                                    <i class="bx bx-shower" style="color: #ffc107; "></i>
                                    <span>Salle de bain privée</span>
                                </div>
                                <div class="col-md-4">
                                    <i class="bx bx-user" style="color: #ffc107;"></i>
                                    <span>Sur place: l'hôte et d'autres voyageurs</span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <i class="bx bxs-hotel mt-3" style="color: #ffc107; margin-right:5px;"></i>
                                <span>Votre chambre privée dans un logement, avec accès à des espaces partagés.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4"  >
            <div class="card" style="border: none; margin-left:30px">
                <div class="card-body">

                    @if(Session::get('success'))
                    <div class="alert alert-success py-3">{{Session::get('success')}}</div>
                    @endif

                    @if(Session::get('error'))
                    <div class="alert alert-danger py-3">{{Session::get('error')}}</div>
                    @endif

                    <h5 class="card-title"><span style="color: blue">{{ $chambre->price }} F CFA</span> par nuit</h5>

                     <p class="mt-3">Aucun montant ne vous sera débité pour la réservation pour le moment</p>
                    <div class="mt-3">
                        <div class="d-flex">
                            <div style="font-weight: 800 ; border-bottom:1px solid black;margin-right:15px"><span style="color: blue">{{ $chambre->price }} FCFA</span> x 5nuits</div>
                            <span>{{ $chambre->price * 5 }} FCFA</span>
                        </div>
                    </div>
                    <a href="{{ route('reservation.form' , $chambre->id) }}" class="btn btn-primary mt-5 mb-5">Réserver cette chambre</a>
                    <div class="alert alert-primary mt-3" role="alert">
                        <i style="color: orange;" class="bx bxs-diamond h-25"></i>
                        C'est une perle rare
                        <p>Le logement proposé par {{ $chambre->proprietaire->name }} affiche généralement complet.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
